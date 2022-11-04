@extends('layouts.frontend')
@section('title','E-Blood-Bank')
@section('main-content')
   <!--main content -->
    <!-- Intro part start-->
    <div class="main">
        <div class="container d-none d-sm-block " style="max-width:1550px !important;">
            <div class="row flex-column-reverse flex-md-row">
                <div class="col-lg-6 col-12 mobile-fixing home-cover-part">
                    <h1 class="home-text">
                        It is not <span style="color:#cf3d3c">possible</span> to buy someone's <span
                            style="color:#cf3d3c">life </span> <span>with <span style="color:#cf3d3c">money,</span>
                        </span>
                    </h1>
                    <p class="by-part">but you can save <span style="color:#cf3d3c">someone's life </span> by donating
                        <span style="color:#cf3d3c">blood to him</span> to save lives or your <span
                            style="color:#cf3d3c">money</span> to create a holistic blood management cycle.
                    </p><br />
                    <a style="color:#cf3d3c;font-weight:500;font-size:18px ; text-decoration: none;"
                        class="donate-blood">Donate
                        Now >></a>&nbsp;&nbsp;&nbsp;
                    <div style="margin-top:3%;display:inline-flex">
                        <a href="{{route('frontend.donor.bloodbank')}}" class="btn-event-click-button"><i class="fas fa-tint"></i>
                            Blood</a>&nbsp;&nbsp;&nbsp;
                        @if (auth()->user() != null && auth()->user()->role->name =='donor')
                        <a href="{{route('frontend.donor.order')}}" class="btn-event-click-button"
                            style="background-color:#cf3d3c;color:#fff;padding:12px;border-radius:25px;font-weight:600;"><i
                                class="far fa-clock"></i>
                            &nbsp;&nbsp;Request Blood &nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;
                            @else
                            <a href="{{route('frontend.donor.login')}}" class="btn-event-click-button"
                            style="background-color:#cf3d3c;color:#fff;padding:12px;border-radius:25px;font-weight:600;"><i
                                class="far fa-clock"></i>
                            &nbsp;&nbsp;Login to Request Blood &nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;
                            @endif
                    </div>
                    <div class="signup">
                        <a href="{{route('frontend.donor.register')}}" class="btn-event-click-button">
                            Register Now</a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 image-banner">
                    <img src="{{asset('assets/frontend/images/banner.png')}}" height="100%" width="100%">
                </div>
            </div>
        </div>
        <!-- Intro part end-->
        <!-- mobile part -->
        <div id="container">
            <div class="row flex-column-reverse flex-md-row">
                <div class="mobile-fixing home-cover-part">
                    <h1 class="home-text">
                        It is not <span style="color:#cf3d3c">possible</span> to buy someone's <span
                            style="color:#cf3d3c">life </span> <span>with <span style="color:#cf3d3c">money,</span>
                        </span>
                    </h1>
                    <p class="by-part">but you can save <span style="color:#cf3d3c">someone's life </span> by donating
                        <span style="color:#cf3d3c">blood to him</span> to save lives or your <span
                            style="color:#cf3d3c">money</span> to create a holistic blood management cycle.
                    </p><br />
                    <a style="color:#cf3d3c;font-weight:500;font-size:18px ; text-decoration: none;"
                        class="donate-blood">Donate
                        Now >></a>&nbsp;&nbsp;&nbsp;
                    <div style="margin-top:3%;display:inline-flex">
                        <a href="{{route('frontend.donor.bloodbank')}}" class="btn-event-click-button"><i class="fas fa-tint"></i>
                            Blood</a>&nbsp;&nbsp;&nbsp;
                            @if (auth()->user() != null && auth()->user()->role->name =='donor')
                        <a href="{{route('frontend.donor.order')}}" class="btn-event-click-button"
                            style="background-color:#cf3d3c;color:#fff;padding:12px;border-radius:25px;font-weight:600;"><i
                                class="far fa-clock"></i>
                            &nbsp;&nbsp;Blood Request&nbsp;&nbsp;</a>
                            @else
                            <a href="{{route('frontend.donor.order')}}" class="btn-event-click-button"
                            style="background-color:#cf3d3c;color:#fff;padding:12px;border-radius:25px;font-weight:600;"><i
                                class="far fa-clock"></i>
                            &nbsp;&nbsp;Login to Request Blood&nbsp;&nbsp;</a>
                            @endif
                    </div>
                    <div class="signup">
                        <a href="{{route('frontend.donor.register')}}" class="btn-signup">
                            Register Now</a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 image-banner">
                    <img src="{{asset('assets/frontend/images/mobile-banner.jpg')}}" height="100%" width="100%">
                </div>
            </div>
        </div>
        <!-- mobile part end-->

        <!-- Availibility blood -->
        <div class="section-content">
            <div class="blood-section">
                <div class="blood">
                    <a href="{{route('frontend.donor.availability')}}" class="btn-signup">
                        <h4 class="topic">Blood Availibility</h4>
                    </a>
                </div>
                <div class="blood1">
                    <a href="{{route('frontend.donor.bloodbank')}}" class="btn-signup">
                        <h4 class="topic">Blood Bank</h4>
                    </a>
                </div>
                @if (auth()->user() != null && auth()->user()->role->name =='donor')
                <div class="blood2">
                    <a href="{{route('frontend.donor.wantdonate')}}" class="btn-signup">
                        <h4 class="topic">Blood Donation</h4>
                    </a>
                </div>
                @endif
                <div class="blood3">
                    <a href="{{route('frontend.donor.login')}}" class="btn-signup">
                        <h4 class="topic">Donor login</h4>
                    </a>
                </div>
            </div>
        </div>
        <!-- end Availibility blood -->
    </div>
    <!-- end main -->
@endsection