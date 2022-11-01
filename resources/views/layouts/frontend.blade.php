<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/tablet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/mobile.css') }}">
    <link href="{{ asset('assets/backend/css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/fontawesome-free-5.15.4-web/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}">
    @yield('css')

</head>

<body>
    <div id="navbar">
        <div class="container">
            <nav>
                <div class="heading-part">
                    <a href="{{route('frontend.home')}}" class="heading"> <span>E-BLOOD BANK</span></a>
                   
                </div>
                {{-- <div class="search">
                    <form class="d-none d-md-flex ms-4">
                        <input class="form-control border-0" type="search" placeholder="Search" width="100%">
                    </form>
                </div> --}}
                <div class="openMenu"> <i class="fas fa-bars"></i></div>
                <div class="nav-list">
                    <ul class="mainMenu">
                        <li> <a href="{{route('frontend.home')}}" class="nav-link">Home</a></li>
                        <li> <a href="{{route('frontend.donor.bloodbank')}}" class="nav-link">Blood Bank</a></li>
                        <li> <a href="{{route('frontend.donor.availability')}}" class="nav-link">Availability</a></li>
                        @if (auth()->user() != null && auth()->user()->role->name =='donor')
                        <li> <a href="{{route('frontend.donor.wantdonate')}}" class="nav-link">Want To Donate</a></li>
                        <li> <a href="{{route('frontend.donor.home')}}" class="nav-link">Profile</a></li>
                        @else
                        <li> <a href="{{route('frontend.donor.login')}}" class="nav-link">Login</a></li>
                        <li> <a href="{{route('frontend.donor.register')}}" class="nav-link">Register</a></li>
                        @endif
                        <div class="closeMenu"><i class="fas fa-times"></i></div>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    @yield('main-content')
    <!-- footer -->
    <footer class="foot-content">
        <div class="container">
            <hr class="hr">
            <div class="row">
                <div class="col-sm">
                    <span class="foot">Quick Links</span>
                    <a href="#"> <span class="content">Blood Available</span></a>
                    <a href="#"><span class="content">Blood Bank</span></a>
                </div>
                <div class="col-sm">
                    <span class="foot">Contact Us</span>
                    <div class="contact-content">
                        <i class="fas fa-map-marker-alt"></i><span> Gaushala, Kathmandu</span>
                    </div>
                    <div class="contact-content">
                        <i class="far fa-envelope"></i><span>info@bloodbank.com.np </span>
                    </div>
                    <div class="contact-content">
                        <i class="fas fa-phone-alt"></i><span>01-4479744</span>
                    </div>
                </div>
                <div class="col-sm">
                    <span class="foot">Want to Donate</span>
                    <a href="#"><span class="content">Donate Blood</span></a>
                    <a href="#"> <span class="content">Blood Available</span></a>
                    <a href="#"> <span class="content">Blood Groups</span></a>
                </div>
                <div class="col-sm">
                    <span class="foot">Developed By</span>
                    <span class="info-contact">OURTEAM</span>
                    <span class="copyright">Copyright &copy;2022 All rights reserved</span>
                </div>
            </div>
    </footer>
    <!-- end footer -->

    <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery3.3.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/index.js') }}"></script>
</body>

</html>
