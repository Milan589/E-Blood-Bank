@extends('layouts.backend')
@section('title', 'Order List')
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
                        <h5 class="card-title">Order Pending List</h5>
                        <br>
                        @include('backend.common.flash_message')
                        <table class="table-bordered table" id="ecommerce1">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Customer Name</th>
                                    <th>Order Date</th>
                                    <th>Phone</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($data['records'] as $record)
                                <tbody>
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            {{ $record->order->name }}
                                        </td>
                                        <td>{{ date('d-m-Y', strtotime($record->order_date)) }}</td>
                                        <td>{{ $record->phone }}</td>
                                        <td>{{ $record->total }}</td>
                                        <td>
                                            @if ($record->order_status == 'Placed')
                                                <span class="text">Pending</span>
                                            @else
                                                <span class="text-success">Completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('backend.order.edit', $record->id) }}"class="btn btn-success">Confirm</a>

                                            <form action="{{ route($base_route . 'destroy', $record->id) }}" method="post"
                                                style="display: inline-block">
                                                <input type="hidden" name="_method" value="DELETE">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
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
