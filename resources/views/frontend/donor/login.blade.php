@extends('layouts.frontend')
@section('title','Donor Login')
<link href="{{ asset('assets/backend/css/login.css') }}" rel="stylesheet">
@section('main-content')
<div class="container">
    <section class="content-header">
        <div class="container-fluid ">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="row-mb-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Donor Login</li>
                        </ol>
                    </div>
                </div>
                
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @include('backend.includes.flash') 
</div>

<div class="container2">
  
    <h4>Login Donor</h4>

    <form action="{{ route('login') }}" method='post' name="form" id="form">
        @csrf
        <div class="form-handler">
            <input type="text" name="email" id="email" placeholder="Email">
            @error('email')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-handler">
            <input type="password" name="password" id="password" placeholder="Password">
            @error('password')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-handler">
            <button type="submit" class="btn-register">Login</button>
        </div>
    </form>
</div>
@endsection