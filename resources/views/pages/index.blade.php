
@extends('pages.layout.master')


@section('content')
@if ($errors->any())
<div class="alert alert-danger" style="text-align: left">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative ">
            <div class="owl-carousel-item position-relative" data-dot="<img src='img/1.jpg' >">
                <img class="img-fluid " src="img/1.jpg"  alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-1 text-white animated slideInDown">A small business is an amazing way to serve</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3">And it leave an impact on the world you live in.</p>
                                {{-- <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative" data-dot="<img src='img/2.jpg'>">
                <img class="img-fluid" src="img/2.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-1 text-white animated slideInDown">A big business starts small</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3">Great ventures start from small beginnings, and that includes your small business.</p>
                                {{-- <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative" data-dot="<img src='img/3.jpg'>">
                <img class="img-fluid" src="img/3.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-1 text-white animated slideInDown">Your business plan is the foundation of your business</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3">It’s a roadmap for how to structure, run, and grow your new business. </p>
                                {{-- <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container pt-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/icon-2.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Booking Services</h3>
                        <p class="mb-0">Simply define your services, display their availability, and you will have clients making bookings.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/icon-3.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Buying Products</h3>
                        <p class="mb-0">We offer special and amazing products made by our small business owners in our website.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/icon-4.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Contact Us</h3>
                        <p class="mb-0">We are here to help and answer any question you might have,We'd love to here you.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


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





    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Top 5 Workers</h4>
                <h1 class="display-5 mb-4">Your Opinion means a lot to us please rate them </h1>
            </div>
            <div class="row g-0 team-items">
                <div class="col-lg-1 wow fadeInUp" data-wow-delay="0.1s">
                </div>
 @foreach($topFiveWorkers as $worker)
                <div class="col-lg-2 wow fadeInUp" data-wow-delay="0.1s">


                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid imageRes" src="/images/{{$worker->image}}" style="width: 300px ; height:200px"  alt="">

                            <div class="team-social text-center">
                                {{-- <i class="fab fa-facebook-f"></i> --}}
                                <a class="btn btn-square" href="{{ route('workers.show', $worker->id) }}"><i class="bi bi-star"></i></a>
                                <a class="btn btn-square" href="{{ route('workers.show', $worker->id) }}"><i class="bi bi-eye"></i></a>
                                <a class="btn btn-square" href="{{ route('workers.show', $worker->id) }}"><i class="bi bi-pencil-square"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h3 class="mt-2"> {{$worker->name}}</h3>
                            @for($i=1; $i<=$worker->avg_rating; $i++)

                            <span class="text-primary"><i class="fa fa-star text-warning " ></i></span>
                            @endfor
                            {{-- <span class="text-primary">Designation</span> --}}
                            <br>
                           ( {{round($worker->avg_rating,2)}} )
                        </div>
                    </div>



                </div> @endforeach

            </div>
        </div>
    </div>
    <!-- Team End -->



    <!-- Testimonial Start -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Testimonial</h4>
                <h1 class="display-5 mb-4">Thousands Of Customers Who Trust Us And Our Services</h1>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Rate Us</button>
        </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($reviews as $review)
                 <div class="testimonial-item text-center" data-dot="<img  class='img-fluid' src='images/{{$review->user->image}}'  alt=''>">
                    <p class="fs-5">{{$review->comment}}</p>

                    <span class="text-primary">
                        @for($i=1; $i<=$review->rate; $i++)

                        <span><i class="fa fa-star text-warning"></i></span>
                        @endfor

                    </span>

                    <h3>{{$review->user->name}}</h3>
                </div>
                 @endforeach

            </div>
        </div>
    </div>
<!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Your Rate</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            @if (Auth::check())
            @else
            <div style=" text-align:left" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Login!</strong> to make a rating.

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
              </div>
            @endif
            @if ($errors->any())
<div class="alert alert-danger" style="text-align: left">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
              <div class="mb-3">
                <form class="form form-vertical" method="POST" action="{{ route('store') }}">
               @csrf
                    @if (Auth::check())
                  <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                  @endif
                  {{-- <input type="number" value="{{ 1 }}" name="rate"> --}}
                          <div class="card-body">
                            <div id="stars_rating">
                              <p class="heading">Please rate me</p>
                              <div class="stars" >
                                <div class="star" >★</div>
                                <div class="star" >★</div>
                                <div class="star">★</div>
                                <div class="star" >★</div>
                                <div class="star" >★</div>
                              </div>
                              <p class="rates">
                                <span class="avg" hidden> </span>
                                {{-- |  --}}
                                Your Rating:<span class="rate"> </span>

                              </p>
                              <br>
                              <div class="search-container">
                                <textarea
                                  type="text"
                                  placeholder="Type your comment ..."
                                  id="movie-name"
                                  cols="40"
                                  name="comment"


                                ></textarea>

                              </div>

                              <input type="hidden" value="" name="rate" id="ratingNum">
                            </div>
                {{-- <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name"> --}}
              </div>


          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            @if (Auth::check())
            <button type="submit" class="btn btn-primary">Rate</button>
            @else
            <button type="submit" disabled class="btn btn-primary">Rate</button>
            @endif
          </div>
            </form>
        </div>
      </div>
    </div>

    </div>


    <!-- Testimonial End -->

@endsection
