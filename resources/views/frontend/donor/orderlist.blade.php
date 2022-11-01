@extends('layouts.frontend')
@section('title', 'Order List')
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
            <div class="col-lg-3" >
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
                        </ul>
                    </div>
                </div>
            </div>
            <div id="basket" class="col-lg-9">
                <div class="box">
                    <form action="{{ route('frontend.donor.update') }}" method="post">
                        @csrf
                        <h1 style="padding-left: 40px">Blood Order List</h1>
                        <p class="text-muted" style="padding-left: 40px">You currently have {{ $carts->count() }} pouch(es)
                            in your Order List.</p>
                        <div class="table-responsive">

                            <table class="table">

                                <thead>
                                    <tr>
                                        <th>Blood Bank Name</th>
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
                                                $total += $cart->qty * $cart->price;
                                            @endphp
                                            <input type="hidden" name="row_id[]" value="{{ $index }}">
                                            <tr>
                                                <td>{{ $cart->id }}</td>
                                                <td>
                                                    <input type="number" name="qty[]" min="1" max="2"
                                                        value="{{ $cart->qty }}" class="form-control">
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
                                            <td colspan="6">Blood Request is empty</td>
                                        </tr>
                                    @endif
                                </tbody>
                               
                            </table>

                        </div>
                        <!-- /.table-responsive-->
                        <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                            <div class="left"><a href="{{ route('frontend.donor.order') }}"
                                    class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Request Blood</a>
                            </div>
                            @if (count($carts) > 0)
                            <div class="right">
                                <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-refresh"></i>
                                    Update
                                    cart</button>
                                <a href="{{route('frontend.donor.checkout')}}" type="submit" class="btn btn-primary">Proceed to
                                    checkout <i class="fa fa-chevron-right"></i></a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
                <!-- /.box-->
            </div>
        </div>
    </div>

@endsection
