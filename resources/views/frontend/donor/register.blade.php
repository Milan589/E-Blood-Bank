@extends('layouts.frontend')
@section('title','Donor Register')
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
                            <li class="breadcrumb-item active">Donor Register</li>
                        </ol>
                    </div>
                </div>
                
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @include('backend.includes.flash') 
</div>

<div class="container2">
  
    <h4>Register Donor</h4>

    <form action="{{ route('frontend.donor.doregister')}}" method='post' name="form" id="form">
        @csrf
        <div class="form-handler">
            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder=" Enter Full Name">
            @error('name')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-handler">
            <input id="address" name="address" type="text" value="{{ old('address') }}" placeholder="Enter Address">
            @error('address')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-handler">
            <input id="phone" name="phone" type="number" value="{{ old('phone') }}" placeholder="Enter Phone">
            @error('phone')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-handler">
            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Email">
            @error('email')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-handler">
            <input id="password" type="password"  @error('password') is-invalid @enderror name="password" placeholder="Enter Password">
            @error('password')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-handler">
            {!! Form::select('bg_id', $data['bloodGroups'], null, [
                'class' => 'form-control',
                'placeholder' => 'Select Blood Groups',
            ]) !!}
            @include('backend.common.validation_field', ['field' => 'bg_id'])
        </div>
        <div class="form-handler">
            <button type="submit" class="btn-register">Register</button>
            <button type="reset" class="btn-register">Reset</button>
        </div>
    </form>
</div>
@endsection