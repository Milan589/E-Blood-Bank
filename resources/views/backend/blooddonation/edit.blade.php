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
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Edit {{ $module }}</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::model($data['record'], [
                            'route' => [$base_route . 'update', $data['record']->id],
                            'method' => 'put',
                            'files' => true,
                        ]) !!}
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
                        <label for="">Status:</label>
                        <input type="radio" name="status" id="Yes" value="1">Yes
                        <input type="radio" name="status" id="No" value="0" checked>No
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info" value="Update {{ $module }}">
                        <input type="reset" class="btn btn-danger" value="Reset">
                    </div>
                        {!! Form::close() !!}
                    </div>
                </div><!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
