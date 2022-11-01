@extends('layouts.backend')
@section('title', $module . ' List')
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
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        @include('backend.common.flash_message')
                        <table class="table-bordered table">
                            <tr>
                                <th>Donor Name</th>
                                <td>{{ $data['record']->donorName->name }}</td>
                            </tr>
                            <tr>
                                <th>Blood Bank Name</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Available</th>
                                <td>
                                    @if ($data['record']->status == 1)
                                        <span class="text-success">Yes</span>
                                    @else
                                        <span class="text-danger">No</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created at</th>
                                <td>{{ $data['record']->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Updated at</th>
                                <td>{{ $data['record']->updated_at }}</td>
                            </tr>
                            <tr>
                                <th>Created_By</th>
                                <td>
                                    {{ $data['record']->createdBy->name }}
                                </td>
                            <tr>
                                <th>Updated_By</th>
                                <td>
                                    @if (!empty($data['record']->updated_by))
                                        {{ $data['record']->updatedBy->name }}
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div><!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
