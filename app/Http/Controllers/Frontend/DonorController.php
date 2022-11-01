<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BankType;
use App\Models\Backend\BloodBank;
use App\Models\Backend\BloodDonation;
use App\Models\Backend\BloodGroup;
use App\Models\Backend\BloodPouch;
use App\Models\Backend\Location;
use App\Models\Backend\Order;
use App\Models\Backend\OrderBloodPouchDetail;
use App\Models\Donor;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;

class DonorController extends FrontendBaseController
{
    private $gateway;

    public function __construct()
    {
        Cart::setGlobalTax(0);
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }

    function registerForm()
    {
        $data['bloodGroups'] = BloodGroup::pluck('bg_name', 'id');
        return view($this->__LoadDataToView('frontend.donor.register'), compact('data'));
    }

    function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'bg_id' => 'required',
            ]
        );
        DB::beginTransaction();
        try {
            $user = User::create([
                'role_id' => 2,
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'bg_id' => $request->input('bg_id'),
            ]);
            if ($user) {
                $request->request->add(['user_id' => $user->id]);
                $donor = Donor::create($request->all());
                if ($donor) {
                    DB::commit();
                    $request->session()->flash('success', 'Your account register successfully!!');
                    return redirect()->route('frontend.donor.login');
                } else {
                    DB::rollBack();
                }
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            $request->session()->flash('error', 'Error: ' . $exception->getMessage());
            return redirect()->route('frontend.donor.register');
        }
        return redirect()->route('frontend.donor.register');
    }

    function login()
    {
        return view('frontend.donor.login');
    }
    function home()
    {
        $data['record'] = BloodDonation::pluck('user_id', 'id')->count();
        return view($this->__LoadDataToView('frontend.donor.home'), compact('data'));
    }

    function donate()
    {
        $data['bloodGroups'] = BloodGroup::pluck('bg_name', 'id');
        $data['banknames'] = BloodBank::pluck('bank_name', 'id');
        return view($this->__LoadDataToView('frontend.donor.wantdonate'), compact('data'));
    }

    function dodonate(Request $request)
    {
        $request->validate(
            [
                'amount' => 'required',
                'b_id' => 'required',
                'donated_date' => 'required',
            ]
        );
        try {
            $request->request->add(['user_id' => Auth::user()->id]);
            //    dd($request);
            $donor = BloodDonation::create($request->all());
            if ($donor) {
                DB::commit();
                $request->session()->flash('success', 'Your donation successfully!!');
                return redirect()->route('frontend.donor.home');
            } else {
                DB::rollBack();
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            $request->session()->flash('error', 'Error: ' . $exception->getMessage());
            return redirect()->route('frontend.donor.register');
        }
        return redirect()->route('frontend.donor.register');
    }

    function bloodbank()
    {
        $data['records'] = BloodBank::orderby('created_at', 'desc')->get();
        return view($this->__LoadDataToView('frontend.donor.bloodbank'), compact('data'));
    }

    function bloodAvailable()
    {
        $data['records'] = BloodPouch::orderby('created_at', 'desc')->get();
        return view($this->__LoadDataToView('frontend.donor.availability'), compact('data'));
    }

    function orderBlood()
    {
        $data['bloodGroups'] = BloodGroup::pluck('bg_name', 'id');
        $data['bloodBank'] = BloodBank::pluck('bank_name', 'id');
        return view($this->__LoadDataToView('frontend.donor.order'), compact('data'));
    }

    function addToCart(Request $request)
    {
        $request->validate(
            [
                'bg_id' => 'required',
                'qty' => 'required',
                'bank_name' => 'required',
            ]
        );
        Cart::add(
            [
                'id' => $request->input('bank_name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'name' => $request->input('bg_id'),
                'price' => $request->input('price'),
                'qty' => $request->input('qty'),
                'weight' => $request->input('weight'),
            ]
        );
        return view($this->__LoadDataToView('frontend.donor.orderlist'));
    }

    function orderList()
    {
        return view($this->__LoadDataToView('frontend.donor.orderlist'));
    }

    function updateOrder(Request $request)
    {
        $row_ids = $request->input('row_id');
        $qtys = $request->input('qty');
        for ($i = 0; $i < count($row_ids); $i++) {
            Cart::update($row_ids[$i], $qtys[$i]);
        }
        request()->session()->flash('success', 'Blood Request Upadate successfully');
        return redirect()->route('frontend.donor.orderlist');
    }

    function checkout()
    {
        return view($this->__LoadDataToView('frontend.donor.checkout'));
    }
    function doCheckout(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'phone' => 'required',
            'shipping_address' => 'required',
            'email' => 'required',
            'payment_mode' => 'required',
        ]);
        try {
            $order_data = [
                'b_id' => $request->b_id,
                'user_id' => auth()->user()->id,
                'order_code' => uniqid(),
                'order_date' => Carbon::now(),
                'shipping_address' => $request->shipping_address,
                'email' => $request->email,
                'phone' => $request->phone,
                'order_status' => 'Placed',
                'total' => Cart::total(),
                'payment_mode' => $request->payment_mode,
            ];

            $order = Order::create($order_data);
            if ($order) {
                $to = 0;
                $order_detail_data['bo_id'] = $order->id;
                foreach (Cart::content() as $rowid => $cart_item) {
                    $order_detail_data['b_id'] = $cart_item->id;
                    $order_detail_data['quantity'] = $cart_item->qty;
                    $order_detail_data['price'] = $cart_item->price;

                    OrderBloodPouchDetail::create($order_detail_data);
                    $to = $to + ($cart_item->qty * $cart_item->price);
                    // Cart::remove($rowid);
                    $request->session()->flash('success', ' Order  successfully!!');
                }
                if ($request->payment_mode == 'online') {
                    Session::put('order_id', $order->id);
                    $response = $this->gateway->purchase(array(
                        'amount' => round($to/128),
                        'currency' => env('PAYPAL_CURRENCY'),
                        'returnUrl' => url('success'),
                        'cancelUrl' => url('error'),
                    ))->send();

                    if ($response->isRedirect()) {
                        $response->redirect(); // this will automatically forward the customer
                    } else {
                        // not successful
                        return $response->getMessage();
                    }
                }
            } else {
                $request->session()->flash('error', ' order failed!!');
            }
        } catch (\Exception $exception) {
            $request->session()->flash('error', 'Error: ' . $exception->getMessage());
        }
        return redirect()->route('frontend.donor.checkout');
    }
    public function success(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful()) {
                // The customer has successfully paid.
                $arr_body = $response->getData();

                // Insert transaction data into the database
                $payment = new Payment();
                $payment->order_id = Session::get('order_id');
                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr_body['state'];
                $payment->save();

                Session::flash('success', 'Payment is successful. Your transaction id is: ' . $arr_body['id']);
            } else {
                return $response->getMessage();
            }
        } else {
            Session::flash('error', 'Transaction is declined');
        }
        return redirect()->route('frontend.donor.checkout');
    }

    /**
     * Error Handling.
     */
    public function error()
    {
        Session::flash('User cancelled the payment.');
    }

                
}
