@extends('pages.layout.master')


@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>

                    <li class="breadcrumb-item text-primary active" aria-current="page"><b>About Us</b></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="img/man.jpg" alt="">
                        <img class="img-fluid" src="img/woman.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h4 class="section-title">About Us</h4>
                    <h1 class="display-5 mb-4"> Whatever you want to achieve, establishing your presence on the web is a must</h1>
                    <p>The main purpose of this website <b> is to support persons with small businesses.</b>
                       </p>
                    <p class="mb-4">

                        ”Together” is supporting small business’s success. Small businesses are important to the economy, they create jobs through their innovation. Our website allows them to connect with more customers, establish and build their own stores, and create jobs in their communities.

                        </p>
                    <div class="d-flex align-items-center">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary" style="width: 120px; height: 120px;">
                            <h1 class="display-1 mb-n2" data-toggle="counter-up">2</h1>
                        </div>
                        <div class="ps-4">
                            <h3>Years</h3>
                            <h3>Working</h3>
                            <h3 class="mb-0">Experience</h3>
                        </div>
                    </div>
                    {{-- <a class="btn btn-primary py-3 px-5" href="">Read More</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->




    <!-- Project Start -->
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Our Services</h4>
                <h1 class="display-5 mb-4">Look at Our Services And Our Amazing Products</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <h3 class="m-0">01. Beauty & Personal Care</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <h3 class="m-0">02. Gardening</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                            <h3 class="m-0">03. Cleaning</h3>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                            <h3 class="m-0">04. Handmade Products</h3>
                        </button>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="img/service1.png"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">Experience In Beauty & Personal Care Services</h1>
                                    <p class="mb-4">”Together” is supporting small business’s success. Small businesses are important to the economy, they create jobs through their innovation. </p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Makeup</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Hair Cut</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Hair Dye</p>
                                    <a href="http://127.0.0.1:8000/services/1" class="btn btn-primary py-3 px-5 mt-3">Book A Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="img/gardening.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">Experience In Gardening Services</h1>
                                    <p class="mb-4">”Together” is supporting small business’s success. Small businesses are important to the economy, they create jobs through their innovation. </p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Removal of weeds</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Trimming of hedges</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Planting new trees and plants</p>
                                    <a href="http://127.0.0.1:8000/services/2" class="btn btn-primary py-3 px-5 mt-3">Book A Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="img/cleaning.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">Experience In Cleaning Services</h1>
                                    <p class="mb-4">”Together” is supporting small business’s success. Small businesses are important to the economy, they create jobs through their innovation. </p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Carpets cleaning</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Apartment Cleaning</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Kitchen Cleaning</p>
                                    <a href="http://127.0.0.1:8000/services/3" class="btn btn-primary py-3 px-5 mt-3">Book A Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="img/service4.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">Our Perfect Products</h1>
                                    <p class="mb-4">”Together” is supporting small business’s success. Small businesses are important to the economy, they create jobs through their innovation. We offer special and amazing products made by our small business owners in our website.</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Home Decorations </p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Decorative Pillows </p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Garden Supplies </p>
                                    <a href="http://127.0.0.1:8000/services/4" class="btn btn-primary py-3 px-5 mt-3">Shop</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->

@endsection
