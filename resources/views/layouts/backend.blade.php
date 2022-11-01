<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('title') E-Blood-Bank</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/backend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}"
        rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div class="container-xxl position-relative bg-primary d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar">
            <nav class="navbar bg-primary">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-light"></i>E-Blood Bank</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="{{ url('/home') }}" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="bi bi-bag-heart-fill me-2"></i>Blood Bank</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <li class="nav-item">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/bloodbank/create') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/bloodbank') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>List</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="bi bi-bag-heart-fill me-2"></i>Location</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <li class="nav-item">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/location/create') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/location') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>List</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="bi bi-bag-heart-fill me-2"></i>Blood Bank Types</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <li class="nav-item">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/banktype/create') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/banktype') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>List</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="bi bi-hearts me-2"></i>Blood Group</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <li class="nav-item">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/bloodgroup/create') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/bloodgroup') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>List</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="bi bi-box2-heart-fill me-2"></i>Blood Donation</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <li class="nav-item">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/blooddonation/create') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/blooddonation') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>List</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="bi bi-clipboard-heart-fill me-2"></i>Blood Pouch</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <li class="nav-item">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/bloodpouch/create') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/bloodpouch') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>List</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-th me-2"></i>Orders</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <li class="nav-item">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/order') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="bi bi-credit-card-2-front-fill me-2"></i>Payment</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <li class="nav-item">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('../payment') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>List</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="bi bi-person-circle me-2"></i>Role</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <li class="nav-item">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/role/create') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/role') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>List</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </div>
                    </div>
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-th me-2"></i>Setting </a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <li class="nav-item">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/setting/create') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/setting') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>List</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </div>
                    </div> --}}
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="bi bi-people-fill me-2"></i>Users</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <li class="nav-item">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/user/create') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('../backend/user') }}" class="nav-link">
                                            <i class="far fa-square nav-icon"></i>
                                            <p>List</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ asset('assets/backend/img/user.jpg') }}"
                                alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex text-primary">
                                @if (Auth::check())
                                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                                @endif
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a class="dropdown-item text-primary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <div class="content-wrapper">
                @yield('main-content')
            </div>
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">E-Blood-Bank</a>, All Right Reserved.
                        </div>

                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/backend/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/backend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/backend/js/main.js') }}">
    </script>
    @yield('js')
</body>

</html>
