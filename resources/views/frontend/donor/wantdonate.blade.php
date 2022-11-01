@extends('layouts.frontend')
@section('title', 'Donor Want to Donate')
{{-- <link href="{{ asset('assets/backend/css/login.css') }}" rel="stylesheet"> --}}
@section('main-content')
    <div class="container pt-4">
        <section class="content-header">
            <div class="container-fluid ">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="row-mb-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Donate Blood</li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <div class="container-fluid">
        <div id="login-overlay" class="modal-dialog">
            <div class="modal-content" style="background-color:#faebd7; outline:none; border:none;">
                <div class="row">
                    <div class=" col-md-7 col-lg-7 m-auto p-4">
                        <h3 class="modal-title text-danger" id="myModalLabel" style="align:center;font-weight:650;">Blood
                            Donation</h3>
                    </div>
                </div>
                <hr>
                {!! Form::open(['route' => 'frontend.donor.donate', 'method' => 'post', 'class' => 'p-4']) !!}
                <div class="row form-group">
                    <div class="col-sm-12">
                        <div class="well">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                    <label for="username">Name : </label>
                                    <input type="hidden" value="{{auth()->user()->user_id}}">
                                  <strong style="background-color: #fff ;border:1px solid #ced4da; border-radius:0.25rem ;padding:10px 60px 10px 40px">{{ auth()->user()->name }}</strong>  
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                    <label for="phone">Blood Group : </label>
                                  <strong style="background-color: #fff ;border:1px solid #ced4da; border-radius:0.25rem ;padding:10px">{{auth()->user()->bloodGroup->bg_name}}</strong> 
    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label for="username">Phone : </label>
                                   <strong style="background-color: #fff ;border:1px solid #ced4da; border-radius:0.25rem ;padding:10px 60px 10px 40px">{{ auth()->user()->phone }}</strong> 
                                    </div>
                            </div>
                        </div>
                            <div class="row mt-4">
                            <div class="col-12 col-sm-12">
                                <label for="username" class="control-label">Amount in ml</label>
                                <select name="amount" class="form-control">
                                    <option value="">Select Blood Amount</option>
                                    <option value="500">500</option>
                                </select>
                                @error('amount')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <h4 class="modal-title text-danger" id="myModalLabel" style="align:center;">
                                    Willing to Donate?&nbsp;&nbsp;Choose from your Nearby Bloodbanks</h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('b_id', 'Bank Bank Name') !!}
                                    {!! Form::select('b_id', $data['banknames'], null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Select Bank Name',
                                    ]) !!}
                                    @include('backend.common.validation_field', ['field' => 'b_id'])
                                </div>
                            </div>
                            <div class=" col-12 col-sm-6">
                                <label for="date" class="control-label">Tentative Date</label>
                                <input class="form-control" type="date" name="donated_date">
                                @error('donated_date')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row mt-2">
                            <div class="col-12 col-sm-3 m-auto">
                                <button type="submit" class="btn btn-primary btn-block btn-danger">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
