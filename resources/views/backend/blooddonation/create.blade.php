@extends('layouts.backend')
@section('title', $module . ' Create')
@section('main-content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $module }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('backend.blooddonation.index') }}" class="btn btn-info">List {{ $module }}</a>
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Create {{ $module }}</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => $base_route . 'store', 'method' => 'post']) !!}
                        <div class="form-group">
                            {!! Form::label('donated_date', 'Donated Date'); !!}
                            {!! Form::date('donated_date', null,['class' => 'form-control']); !!}
                            @include('backend.common.validation_field',['field' => 'donated_date'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('amount', 'Amount in ml'); !!}
                            {!! Form::text('amount', null,['class' => 'form-control']); !!}
                            @include('backend.common.validation_field',['field' => 'amount'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('b_id', 'Blood Bank Name'); !!}
                            {!! Form::select('b_id',$data['bankNames'], null,['class' => 'form-control','placeholder' => 'Select Bank name']); !!}
                            @include('backend.common.validation_field',['field' => 'b_id'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('user_id', 'Blood Donor Name'); !!}
                            {!! Form::select('user_id',$data['donorNames'], null,['class' => 'form-control','placeholder' => 'Select Donor Name']); !!}
                            @include('backend.common.validation_field',['field' => 'user_id'])
                        </div>
                        <div class="form-group">
                            <label for="">Status:</label>
                            <input type="radio" name="status" id="active" value="1">Active
                            <input type="radio" name="status" id="deactive" value="0" checked>Deactive
                        </div>
                        <div class="form-group">
                            {!! Form::submit( 'Save ' . $module, ['class' => 'btn btn-info']); !!}
                            {!! Form::reset('Clear', ['class' => 'btn btn-danger']); !!}
                        </div>
                
                        {!! Form::close() !!}
                    </div>
                </div><!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
