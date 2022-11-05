@extends('layouts.backend')
@section('title', 'Dashboard')
@section('css')
<script src="https://kit.fontawesome.com/02ca497e30.js" crossorigin="anonymous"></script>
@section('main-content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row-mb-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-droplet fa-3x text-danger"></i>
                    <div class="ms-3">
                        <p class="mb-2 text-primary">A+</p>
                        <h6 class="mb-0">{{$totalApos}} ml</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-droplet fa-3x text-danger"></i>
                    <div class="ms-3">
                        <p class="mb-2 text-primary">A-</p>
                        <h6 class="mb-0">{{$totalAmins}} ml</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-droplet fa-3x text-danger"></i>
                    <div class="ms-3">
                        <p class="mb-2 text-primary">B+</p>
                        <h6 class="mb-0">{{$totalBpos}} ml</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-droplet fa-3x text-danger"></i>
                    <div class="ms-3">
                        <p class="mb-2 text-primary">B-</p>
                        <h6 class="mb-0">{{$totalBmins}} ml</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4 pt-2">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-droplet fa-3x text-danger"></i>
                    <div class="ms-3">
                        <p class="mb-2 text-primary">AB+</p>
                        <h6 class="mb-0">{{$totalABpos}} ml</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-droplet fa-3x text-danger"></i>
                    <div class="ms-3">
                        <p class="mb-2 text-primary">AB-</p>
                        <h6 class="mb-0">{{$totalABmins}} ml</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-droplet fa-3x text-danger"></i>
                    <div class="ms-3">
                        <p class="mb-2 text-primary">O-</p>
                        <h6 class="mb-0">{{$totalOmins}} ml</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-droplet fa-3x text-danger"></i>
                    <div class="ms-3">
                        <p class="mb-2 text-primary">O+</p>
                        <h6 class="mb-0">{{$totalOpos}} ml</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row ">
            <div class="col-sm-4 col-xl-3">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Total Order</h6>
                        <p class="mb-0 text-primary">{{$orders}}</p>
                        <div class="ms-3">
                            <p class="mb-2 text-primary"> <a href="{{url('/order')}}">View Orders</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sales Chart End -->

    <!-- Recent Sales End -->
@endsection
