<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use Illuminate\Http\Request;

class OrderController extends BackendBaseController
{
    protected $module = 'Order';
    protected  $base_view = 'backend.order.';
    protected  $base_route = 'backend.order.';
    function __construct()
    {
        $this->model = new Order();
    }
    public function index()
    {
        $data['records'] =Order::where('order_status','Placed')->get();
        return view($this->__loadDataToView('backend.order.index'), compact('data'));
    }
    public function success()
    {
        $data['records'] =Order::where('order_status','success')->get();
        return view($this->__loadDataToView('backend.order.success'), compact('data'));
    }
    public function edit($id)
    {
        $data['record'] = $this->model->find($id);
        if ($data['record']) {
            return view($this->__loadDataToView($this->base_view . 'edit'), compact('data'));
        } else {
            request()->session()->flash('error', 'Invalid Request');
            return redirect()->route($this->base_route . 'index');
        }
    }
    public function update(Request $request, $id)
    {
        $data['record'] = $this->model->find($id);
        if (!$data['record']) {
            request()->session()->flash('error', 'Error: Invalid Request');
            return redirect()->route($this->base_route . 'index');
        }
        try {
            $request->request->add(['updated_by' => auth()->user()->id]);
            $record = $data['record']->update($request->all());
            if ($record) {
                $request->session()->flash('success', $this->module . ' update success');
            } else {
                $request->session()->flash('error', $this->module . ' update failed');
            }
        } catch (\Exception $exception) {
            $request->session()->flash('error', 'Error: ' . $exception->getMessage());
        }
        return redirect()->route($this->base_route . 'index');
    }
    public function destroy(Request  $requestt, $id)
    {
        $data['record'] =  $this->model->find($id);
        if (!$data['record']) {
            request()->session()->flash('error', 'Error: Invalid Request');
            return redirect()->route($this->base_route . 'index');
        }
        if ($data['record']->delete()) {
            request()->session()->flash('success', $this->module . " delete success");
            return redirect()->route($this->base_route . 'index');
        } else {
            request()->session()->flash('error', $this->module . " deletion failed");
            return redirect()->route($this->base_route . 'index');
        }
    }
}
