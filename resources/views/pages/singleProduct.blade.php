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
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Product</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Product</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="row">

                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-12 carousel slide carousel-multi-item"
                            data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!-- Carousel Start -->
                                <div class="owl-carousel header-carousel position-relative ">
                                    <div class="owl-carousel-item position-relative"
                                        data-dot="<img src='/servicesImages2/{{ $service->image2 }}' >">
                                        <img class="img-fluid " src="/servicesImages2/{{ $service->image2 }}"
                                            style="height: 500px" alt="">
                                        <div class="owl-carousel-inner">
                                            <div class="container">
                                                <div class="row justify-content-start">
                                                    <div class="col-10 col-lg-8">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-carousel-item position-relative"
                                        data-dot="<img src='/servicesImages3/{{ $service->image3 }}'>">
                                        <img class="img-fluid" src="/servicesImages3/{{ $service->image3 }}"
                                            style="height: 500px" alt="">
                                        <div class="owl-carousel-inner">
                                            <div class="container">
                                                <div class="row justify-content-start">
                                                    <div class="col-10 col-lg-8">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-carousel-item position-relative"
                                        data-dot="<img src='/servicesImages4/{{ $service->image4 }}'>">
                                        <img class="img-fluid" src="/servicesImages4/{{ $service->image4 }}"
                                            style="height: 500px" alt="">
                                        <div class="owl-carousel-inner">
                                            <div class="container">
                                                <div class="row justify-content-start">
                                                    <div class="col-10 col-lg-8">


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <!-- Carousel End -->

                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body" style="height:420px ">
                            <h1 class="h2"> {{ $service->service_name }}</h1>
                            <p class="h3 py-2"> {{ $service->price }} JD</p>
                            <h6>Description:</h6>
                            <p>{{ $service->description }}</p>


                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-auto">

                                </div>
                                <form action="{{ route('AddToCart') }}" method="post" class="m-2">
                                    @csrf
                                    <div class="col-auto">
                                        <div class="quantity">
                                            <span class="qty-minus"
                                                onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                                    class="fa fa-minus" aria-hidden="true"></i></span>
                                            <input type="number" class="qty-text text-center" id="qty" step="1"
                                                min="1" max="12" name="quantity" value="1">
                                            <span class="qty-plus"
                                                onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                                    class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>

                                    </div>
                            </div>
                            <br>
                            <div class="row pb-3">
                                <div>


                                    @if ($service->type == 'cart')
                                        <button class="btn btn-primary" type="submit" class="btn btn-success btn-lg"
                                            name="submit" value="addtocard">Add To Cart</button>
                                    @else
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $service->id }}">Book A Service </button>
                                    @endif
                                </div>
                                <input type="hidden" value="{{ $service->id }}" name="serviceId">
                                <div class="col d-grid">
                                </div>

                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Close Content -->














    {{-- ------------------------booking section ------------------------- --}}



    <div class="modal fade" id="exampleModal{{ $service->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h1 style="margin-right:20px"class="modal-title fs-5" id="exampleModalLabel">Step 1</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">

                    @if (Auth::check())
                    @else
                        <div style=" text-align:left" class="alert alert-danger alert-dismissible fade show"
                            role="alert">
                            <strong>Please Login!</strong> to make a reservation.

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
                    <form class=""
                        method="POST"style="display: grid ; grid-template-columns: 40% 50%;row-gap: 10px; text-align:left ;"
                        action="{{ route('Booking', ['service_id' => $service['id']]) }}">
                        <input type="hidden" value="{{ $service->id }}" name="service_id">

                        @csrf
                        @if ($service->type == 'book_unit')
                            <label for="total_price" class="col-form-label">Price:</label>
                            <input readonly name="total_price" class="pri" id="price" value="{{ $service->price }}" >
                       <input type="text" hidden name="quantity" value="1" id="quantity">
                        @endif

                        @if ($service->type == 'book_hr')
                            <label for="quantity" class="col-form-label">Hours:</label>
                            <input type="text" name="quantity" id="quantity" class="example" onkeyup="Calculate()">
                        @endif
                             <label for="message-text" class="col-form-label">Select a worker:</label>
                        <select name="worker_id" class="col-form-label">

                            @foreach ($service->users as $user)
                                <option value={{ $user->id }}>{{ $user->name }}</option>

                        </select>
                        @endforeach


                        <label for="message-text" class="col-form-label">Date:</label>
                        <input type="date" name="booking_date"
                        id="datepicker" >
                        <small></small>
                    <small style="color: brown">off-days are Fri & Sat</small>


                        <label for="appt">Time :</label>
                        <input type="time" id="appt" name="appt"
                               min="09:00" max="18:00" required>
                        <small></small>
                        <small style="color: brown">Work hours are 9am to 6pm</small>



                            <input type="hidden"  class="pri" id="price"
                            value="{{ $service->price }}">

                        @if ($service->type == 'book_hr')
                            <label for="total_price" class="col-form-label">Total Price:</label>
                            <input type="text" name="total_price"  value="{{ $service->price }}" id="total_price" class="total"  readonly>
                        @endif

                        <hr>
                        <hr>
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Step 2</h1>
                        <h1></h1>
                        @if (Auth::check())
                            <input type="text" name="user_id" hidden value="{{ Auth::user()->id }}">
                            <label for="name" class="col-form-label">Name :</label>
                            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                            <label for="email" class="col-form-label">Email :</label>
                            <input type="text" name="email" id="email" value="{{ Auth::user()->email }}">
                            <label for="phone" class="col-form-label">Phone :</label>
                            <input type="text" name="phone" id="phone" value="{{ Auth::user()->phone }}">
                            <label for="location" class="col-form-label">Location :</label>
                            <input type="text" name="location" id="location">
                        @else
                            <label for="name" class="col-form-label">Name :</label>
                            <input type="text" name="name" id="name">
                            <label for="email" class="col-form-label">Email :</label>
                            <input type="text" name="email" id="email">
                            <label for="phone" class="col-form-label">Phone :</label>
                            <input type="text" name="phone" id="phone">
                            <label for="location" class="col-form-label">Location :</label>
                            <input type="text" name="location" id="location">
                        @endif

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @if (Auth::check())
                        <button id="book" type="submit" class="btn btn-primary">book</button>
                    @else
                        <button id="book" type="submit" class="btn btn-primary" disabled>book</button>
                    @endif
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function Calculate() {


            var quantity = document.getElementById("quantity").value;
            var price = document.getElementById("price").value;
            var totalPrice = quantity * price;
            console.log(price);
            console.log(quantity);
            console.log(totalPrice);
            return document.getElementById("total_price").value = totalPrice;
        }

// function date(){


//         var today = new Date();
// var dd = String(today.getDate()).padStart(2, '0');
// var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
// var yyyy = today.getFullYear();

// today = yyyy + '-' + mm + '-' + dd;
// return document.getElementById("datepicker").min = today;
// }




const datepicker = document.getElementById("datepicker");
const today = new Date();
const dd = String(today.getDate()).padStart(2, '0');
const mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
const yyyy = today.getFullYear();
const minDate = yyyy + '-' + mm + '-' + dd;

datepicker.min = minDate;

datepicker.addEventListener("change", function() {
    const selectedDate = new Date(this.value);
    const dayOfWeek = selectedDate.getUTCDay();

    if (dayOfWeek === 5 || dayOfWeek === 6) {
        this.setCustomValidity("You cannot select weekends.");
    } else if(selectedDate < today){
        this.setCustomValidity("You cannot select today's date.");
    } else {
        this.setCustomValidity("");
    }
});


    </script>
@endsection