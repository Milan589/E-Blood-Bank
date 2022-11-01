@extends('layouts.frontend')
@section('title', 'Donor Home')
<script src="https://kit.fontawesome.com/04bcc179f7.js" crossorigin="anonymous"></script>
@section('main-content')
    <div class="container pt-4 pb-4">
        @include('backend.includes.flash')
        <section class="content-header">
            <div class="container-fluid ">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="row-mb-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Donor</li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-3">
                <div class="widget mercado-widget categories-widget">
                    <h4 class="widget-title p-4" style="background-color: #dc3545; color:#faebd7;">Donor Section</h4>
                    <div class="widget-content " style="background-color: #faebd7; color:#dc3545;">
                        <ul class="nav nav-pills flex-column">
                            <li> <a href="{{route('frontend.donor.orderlist')}}" class="nav-link" style="color: #dc3545;"><i class="fa fa-list"></i>
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
            <div class="col-lg-9">
                <div id="customer-order">
                    <div class="box">
                        <div class="table-responsive mb-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Blood Group</th>
                                        <th>Number of Blood Donated</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>{{ auth()->user()->name }}</td>
                                        <td>{{ auth()->user()->email }}</td>
                                        <td>{{ auth()->user()->phone }}</td>
                                        <td>{{ auth()->user()->bloodGroup->bg_name }}</td>
                                        <td>
                                            {{ $data['record'] }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
