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
                <a href="{{ route('backend.bloodpouch.index') }}" class="btn btn-info">List {{ $module }}</a>
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Create {{ $module }}</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => $base_route . 'store', 'method' => 'post']) !!}

                        @include('backend.bloodpouch.includes.form', ['button' => 'Save'])
                        {!! Form::close() !!}
                    </div>
                </div><!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
{{-- @section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#bd_id').change(function() {
        var bdid = $(this).val();
        $.ajax({
            method: "POST",
            url: "{{ route('backend.donor.getsubcategory') }}",
            data: {
                'id': bdid
            },
            success: function(resp) {
                $('#bg_id').html(resp);
            }
        });
    });
</script>
@endsection --}}
