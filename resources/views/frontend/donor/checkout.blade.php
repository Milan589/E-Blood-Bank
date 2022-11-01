@extends('layouts.frontend')
@section('title', 'Checkout')
<script src="https://kit.fontawesome.com/04bcc179f7.js" crossorigin="anonymous"></script>
@section('main-content')
    <div class="container">
        <section class="content-header">
            <div class="container-fluid ">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="row-mb-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Order List</li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        @include('backend.includes.flash')
        <div class="row">
            <div class="col-lg-3">
                <div class="widget mercado-widget categories-widget">
                    <h4 class="widget-title p-4" style="background-color: #dc3545; color:#faebd7;">Donor Section</h4>
                    <div class="widget-content " style="background-color: #faebd7; color:#dc3545;">
                        <ul class="nav nav-pills flex-column">
                            <li> <a href="{{ route('frontend.donor.orderlist') }}" class="nav-link"
                                    style="color: #dc3545;"><i class="fa fa-list"></i>
                                    My
                                    orders</a></li>
                            <li> <a href="{{ route('frontend.donor.home') }}" class="nav-link" style="color:#dc3545;"><i
                                        class="fa fa-user"></i>
                                    {{ auth()->user()->name }} </a></li>
                            <li> <a href="" class="nav-link" style="color: #dc3545;" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    {{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-danger " style="color:#fff;"
                                    href="{{ route('frontend.donor.orderlist') }}">Back to Blood Order List</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="basket" class="col-lg-9">
                <div class="box">
                    <h1 style="padding-left: 40px">Blood Order List</h1>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Blood Group</th>
                                    <th>Unit price</th>
                                    <th colspan="2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($carts) > 0)
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($carts as $index => $cart)
                                        @php
                                            $bloodGroup = \App\Models\Backend\BloodGroup::find($cart->id);
                                            $total += $cart->qty * $cart->price;
                                        @endphp
                                        <input type="hidden" name="row_id[]" value="{{ $index }}">
                                        <tr>
                                            <td>{{ $cart->id }}</td>
                                            <td>
                                                {{ $cart->qty }}
                                            </td>
                                            <td>{{ $cart->name }}</td>
                                            <td>{{ $cart->price }}</td>

                                            <td>{{ $cart->qty * $cart->price }}</td>
                                        </tr>
                                    @endforeach
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th colspan="2">Rs. {{ $total }}</th>
                                </tr>
                            </tfoot>
                        @else
                            <tr>
                                <td colspan="6">Request is empty</td>
                            </tr>
                            @endif
                            </tbody>

                        </table>
                    </div>
                    <!-- /.table-responsive-->

                    <form action="{{ route('frontend.donor.docheckout') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-handler pt-4">
                                    <label for="">Name : </label>
                                    <input style="background-color: #f5f5f5 ;border:1px solid #f5f5f5; border-radius:0.25rem" type="text" name="name" value="{{ Auth()->user()->name }}">
                                    @error('name')
                                        <span class="text-danger" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-handler pt-4" style="display: inline-block">
                                    <label for="shipping_address">Address : </label>
                                    <input type="text" name="shipping_address"
                                        value="{{ Auth()->user()->donor->address }}" style="background-color: #f5f5f5 ;border:1px solid #f5f5f5; border-radius:0.25rem">
                                    @error('shipping_address')
                                        <span class="text-danger" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-handler  pt-4">
                                    <label for="">Phone : </label>
                                    <input type="text" name="phone" value="{{ Auth()->user()->phone }}" style="background-color: #f5f5f5 ;border:1px solid #f5f5f5; border-radius:0.25rem">
                                    @error('phone')
                                        <span class="text-danger" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-handler  pt-4">
                                    <label for="">Email : </label>
                                    <input type="text" name="email" value="{{ Auth()->user()->email }} " style="background-color: #f5f5f5 ;border:1px solid #f5f5f5; border-radius:0.25rem">
                                    @error('email')
                                        <span class="text-danger" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-handler pt-4">
                                    <label for="payment_mode">Payment Mode</label>
                                    <select name="payment_mode" id="payment_mode" class="form-control">
                                        <option value="">Select Payment Mode</option>
                                        <option value="cod">COD</option>
                                        <option value="online">Online</option>
                                    </select>
                                    @error('payment_mode')
                                        <span class="text-danger" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <input id="payment_mode" name="payment_mode" type="radio" value="cod" checked>COD
                                    <input id="payment_mode" name="payment_mode" type="radio" value="online">Online --}}
                                </div>
                            </div>
                        </div>


                        @if (count($carts) > 0)
                            <div class="right">
                                <button type="submit" class="btn btn-primary">Proceed to
                                    checkout <i class="fa fa-chevron-right"></i></button>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            <!-- /.box-->
        </div>
    </div>
    </div>

@endsection
