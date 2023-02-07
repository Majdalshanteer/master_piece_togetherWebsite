<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Arkitektur - Architecture HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="{{ asset('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap') }}"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status">
        </div>
        <img class="position-absolute top-50 start-50 translate-middle" src="{{ asset('img/icons/logo.png') }}"
            alt="Icon">
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-3">
                    <a class="text-body px-2" href="tel:+0123456789"><i
                            class="fa fa-phone-alt text-primary me-2"></i>+962 790152556</a>
                    <a class="text-body px-2" href="mailto:info@example.com"><i
                            class="fa fa-envelope-open text-primary me-2"></i>Together@gmail.com</a>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                {{-- <div class="h-100 d-inline-flex align-items-center py-3 me-2">
                    <a class="text-body px-2" href="">Terms</a>
                    <a class="text-body px-2" href="">Privacy</a>
                </div> --}}
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square btn-outline-body me-1" href=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square btn-outline-body me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square btn-outline-body me-1" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square btn-outline-body me-0" href=""><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn"
        data-wow-delay="0.1s">
        <a href="/" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0"><img class="me-3" src="{{ asset('img/icons/logo.png') }}" height="70px"
                    alt="Icon">TOGETHER</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link ">Home</a>
                <a href="/about" class="nav-item nav-link">About</a>
                <a href="/services" class="nav-item nav-link">Services</a>
                <a href="/workers" class="nav-item nav-link">Workers</a>
                {{--
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu border-0 m-0">
                        <a href="feature" class="dropdown-item">Our Features</a>
                        <a href="project" class="dropdown-item">Our Projects</a>
                        <a href="team" class="dropdown-item">Team Members</a>
                        <a href="appointment" class="dropdown-item">Appointment</a>
                        <a href="testimonial" class="dropdown-item">Testimonial</a>
                        <a href="404" class="dropdown-item">404 Page</a>
                    </div>

                </div> --}}
                <a href="/contact" class="nav-item nav-link">Contact</a>
            </div>



            <a style="margin-right: 30px" class="position-relative " href="{{ route('cart.index') }}">
                <span

                    class="
                            position-absolute
                            top-0
                            start-100
                            translate-middle
                            badge
                            rounded-pill
                            bg-danger
                          ">
                    @if (session()->has('order'))
                        {{ count(session()->get('order.services')) }}
                    @else
                        0
                    @endif

                </span>
                {{-- <i style="font-size: 25px" class="bi bi-bag-plus"></i> --}}
                <svg class="m-1" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                  </svg>
                  
                {{-- <i style="font-size: 22px" class="bi bi-cart3"></i> --}}


            </a>
            @if (Auth::check())

                <div class="dropdown">
                    <button style="width:160px" class="btn btn-primary py-2 px-4 d-none d-lg-block dropdown-toggle " type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Hello &nbsp;{{ Auth::user()->name }}
                    </button>

                    <ul class="dropdown-menu">
                        @if (Auth::user()->type == 'User')
                            <li><a class="dropdown-item" href="/profile"><i class="bi bi-person"></i> Profile</a>
                            </li>
                        @elseif (Auth::user()->type == 'Admin')
                            <li><a class="dropdown-item" href="/adminDashboard"><i
                                        class="bi bi-menu-button-wide"></i> Dashboard</a></li>
                        @else
                            <li><a class="dropdown-item" href="/workerDash"><i
                                        class="bi bi-menu-button-wide"></i> Dashboard</a></li>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <li><a class="dropdown-item" href="#"> <a class="nav-link"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                    <i class="bi bi-power"></i><b>
                                        {{ __('Logout') }}</b>

                                </a></a></li>

                    </ul>
                </div>





{{--
                @if (Auth::user()->type == 'User')
                    <a href="/profile" class="btn btn-primary py-2 px-4 d-none d-lg-block">Hello
                        &nbsp;{{ Auth::user()->name }}
                    </a>
                @elseif (Auth::user()->type == 'Admin')
                    <a href="/adminDashboard" class="btn btn-primary py-2 px-4 d-none d-lg-block">Admin Dashboard
                    </a>
                @else
                    <a href="/workerDash" class="btn btn-primary py-2 px-4 d-none d-lg-block">Worker Dashboard
                    </a>
                @endif
            @endif


            @if (Auth::check())
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
         document.getElementById('logout-form').submit();"><b>
                        {{ __('Logout') }}</b>

                </a>






                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> --}}


            @else
                <a href="/login" class="btn btn-primary py-2 mx-3 px-4 d-none d-lg-block">Login </a>
                <a href="/register" class="btn btn-primary py-2 px-4 d-none d-lg-block">Register</a>
            @endif




        </div>
    </nav>
    <!-- Navbar End -->
