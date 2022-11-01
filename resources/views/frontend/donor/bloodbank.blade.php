@extends('layouts.frontend')
@section('title', 'Blood Bank')
@section('main-content')
    <div class="container pt-4">
        <section class="content-header">
            <div class="container-fluid ">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="row-mb-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Blood Bank</li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <div class="container">
        <div class="row">
            <table id="example-table" class="table table-bordered table-hover table-striped dt-responsive "
                style='width:100% ;  color:#dc3545 ;'>
                <thead class="" style="background-color: #faebd7; color:#dc3545;">
                    <th class="all">S.No.</th>
                    <th class="all">Name</th>
                    <th class="desktop">Address</th>
                    <th class="desktop">Type</th>

                <tbody>
                    @foreach ($data['records'] as $record )
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $record->bank_name }}</td>
                            <td>{{ $record->bankLocation->address }}</td>
                            <td>{{ $record->bankType->bank_name }}</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    @endforeach
                        
            

                </tbody>

            </table>
        </div>
    </div>
@endsection
