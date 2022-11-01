@extends('layouts.frontend')
@section('title', 'Blood Request')
@section('main-content')
    <div class="container">
        <section class="content-header">
            <div class="container-fluid ">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="row-mb-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Request Blood</li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        @include('backend.includes.flash')
    </div>

    <div class="container2">

        <h4>Request Blood</h4>

        <form action="{{route('frontend.donor.add')}}" method='post' name="form" id="form">
            @csrf
            <input type="hidden" name="bank_name" value="{{ $data['bloodBank']}}">
            <input type="hidden" name="address" value="{{ Auth()->user()->donor->address }}">
            <input type="hidden" name="phone" value="{{ Auth()->user()->phone }} ">
            <input type="hidden" name="email" value="{{ Auth()->user()->email }} ">
            <input type="hidden" name="price" value="500">
            <input type="hidden" name="weight" value="1">
          
            <div class="form-handler pt-4">
                <label for="">Name : </label>
                <span style="font-weight: 700"> {{ Auth()->user()->name }} </span>
            </div>
            <div class="form-handler pt-4"> 
                <label for="">Address : </label>
                <span style="font-weight: 700"> {{ Auth()->user()->donor->address }} </span>
            </div>
            <div class="form-handler  pt-4">
                <label for="">Phone : </label>
                <span style="font-weight: 700"> {{ Auth()->user()->phone }} </span>
            </div>
            <div class="form-handler  pt-4">
                <label for="">Email : </label>
                <span style="font-weight: 700"> {{ Auth()->user()->email }} </span>
            </div>
            <div class="form-handler pt-4">
                <label for="">Blood Group: </label>
                <select name="bg_id" id="bg_id">
                    <option value="">Select Blood Group</option>
                    @foreach ($data['bloodGroups'] as $blood )
                    <option value="{{$blood}}">{{$blood}}</option>
                    @endforeach 
                </select>
                @error('bg_id')
                <span class="text-danger" style="display: block">
                    <strong>{{$message}}</strong>
                </span>
                @enderror 
            </div>
            <div class="form-handler pt-4">
                <label for="">No of Pouches :</label>
                <select name="qty" id="qty">
                    <option value="">No of Pouches</option>
                    <option value="1">1 </option>   
                    <option value="2">2 </option>
                </select>
                @error('qty')
                <span class="text-danger" style="display: block">
                    <strong>{{$message}}</strong>
                </span>
                @enderror 
            </div>
            <div class="form-handler pt-4">
                <label for="">Blood Bank: </label>
                <select name="bank_name" id="bank_name">
                    <option value="">Select Blood Bank</option>
                    @foreach ($data['bloodBank'] as $bank )
                    <option value="{{$bank}}">{{$bank}}</option>
                    @endforeach 
                </select>
                @error('bank_name')
                <span class="text-danger" style="display: block">
                    <strong>{{$message}}</strong>
                </span>
                @enderror 
            </div>
            <div class="form-handler">
                <button type="submit" class="btn-register">Process</button>
                <button type="reset" class="btn-register">Reset</button>
            </div>
        </form>
    </div>

@endsection
