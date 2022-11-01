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
                <a href="{{ route('backend.bloodbank.index') }}" class="btn btn-info">List {{ $module }}</a>
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Create {{ $module }}</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => $base_route . 'store', 'method' => 'post']) !!}

                        @include('backend.bloodbank.includes.form', ['button' => 'Save'])
                        {!! Form::close() !!}
                    </div>
                </div><!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
