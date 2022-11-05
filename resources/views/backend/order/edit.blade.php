@extends('layouts.backend')
@section('title', 'Edit List')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('main-content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">Order List</h5>
                        <br>
                        @include('backend.common.flash_message')

                        {!! Form::model($data['record'], [
                            'route' => [$base_route . 'update', $data['record']->id],
                            'method' => 'put',
                            'files' => true,
                        ]) !!}
                        <div class="form-group">
                            {!! Form::text('order_status', 'success', ['class' => 'form-control']) !!}
                            @include('backend.common.validation_field', ['field' => 'address'])

                        </div>
                        <div class="form-group">
                            {!! Form::submit('Save ' . $module, ['class' => 'btn btn-info']) !!}
                            {!! Form::reset('Clear', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div><!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#ecommerce1').DataTable({
                "paging": true,
                "ordering": true,
                "info": true
            });
        });
    </script>
@endsection
