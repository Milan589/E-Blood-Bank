@extends('layouts.frontend')
@section('title', 'Blood Available')
@section('main-content')
    <div class="container pt-4">
        <section class="content-header">
            <div class="container-fluid ">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="row-mb-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Blood Availability</li>
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
                style='width:100% ; color:#dc3545 ;'>
                <thead class=" " style="background-color: #faebd7; color:#dc3545;">
                    <th class="all">S.No.</th>
                    {{-- <th class="all">Blood Bank</th> --}}
                    <th class="all">Blood Group</th>
                    <th class="desktop">Availability</th>
                    <th class="desktop">Last Updated</th>
                <tbody>
                    @foreach ($data['records'] as $record )
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            {{-- <td>{{ $record->bloodDonor->bankName->bank_name}}</td> --}}
                           <td>{{ $record->bloodGroup->bg_name}}</td>
                            <td>
                                @if ($record->status == 1)
                                <span class="text-success">Yes</span>
                            @else
                                <span class="text-danger">No</span>
                            @endif
                            </td>
                            <td>{{ $record->updated_at }}</td>
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
