@extends('pages.layout.master')
@section('content')

{{------- warning messages for booking section --------}}
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger" style="text-align: left">
    <strong>Please Check your inputs!</strong> to complete a reservation.
</div>
@endif
<hr class="mt-3 mb-0">

    </body>



    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark py-4 ">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

                        <li class="mt-3 mb-3">
                            <form method="GET">
                        <div class="input-group mb-3">
                          <input
                            type="text"
                            name="search"
                            value="{{ request()->get('search') }}"
                            class="form-control input-res"
                            placeholder="Search..."
                            aria-label="Search"
                            aria-describedby="button-addon2">

                          <button class="btn btn-primary serachBtn" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                        </div>
                    </form></li>
                        <li class="nav-item">
                            <a href="/" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>

                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Services</span> </a>
                                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="http://127.0.0.1:8000/services/1" class="nav-link px-0"> <span class="d-none d-sm-inline">Beauty & Personal Care</span> <i class="bi bi-chevron-right"></i> </a>
                                </li>
                                <li>
                                    <a href="http://127.0.0.1:8000/services/2" class="nav-link px-0"> <span class="d-none d-sm-inline">Gardening</span> <i class="bi bi-chevron-right"></i></a>
                                </li>
                                <li>
                                    <a href="http://127.0.0.1:8000/services/3" class="nav-link px-0"> <span class="d-none d-sm-inline">Cleaning</span> <i class="bi bi-chevron-right"></i></a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="bi bi-shop"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                                <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">


                                <li class="w-100">
                                    <a href="http://127.0.0.1:8000/services/4" class="nav-link px-0"> <span class="d-none d-sm-inline">Home Decorations</span> <i class="bi bi-chevron-right"></i></a>
                                </li>
                                <li>
                                    <a href="http://127.0.0.1:8000/services/5" class="nav-link px-0"> <span class="d-none d-sm-inline">Decorative Pillows</span> <i class="bi bi-chevron-right"></i></a>
                                </li>
                                <li>
                                    <a href="http://127.0.0.1:8000/services/6" class="nav-link px-0"> <span class="d-none d-sm-inline">Garden Supplies</span> <i class="bi bi-chevron-right"></i></a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                    <hr>


                </div>
            </div>
            <div class="col py-3">
                <div class="container-xxl   ">



                   Categories /<span style="color: #b78d65"> {{$category->name}}</span>

                   <form method="GET" class="mt-4"  >
                    <div  class="input-group mb-3">
                      <input
                        type="text"
                        name="search"
                        value="{{ request()->get('search') }}"
                        class="form-control input-resMain"
                        placeholder="Search..."
                        aria-label="Search"
                        aria-describedby="button-addon2">

                      <button class="btn btn-primary serachBtnMain" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                    </div>
                </form>

                    <div class="container pt-5">

                        <div class="row g-4 ">
                            @foreach ($services as $service)
                            @if ($service->type =="cart")


                            <div class="card" style="width: 20rem; margin:10px" >
            <div class="image-box">
                                <img src="/servicesImages/{{ $service->image }}" style="height: 300px" class="images card-img-top mt-2" alt="...">
            </div>
                                <hr>
                                <div class="card-body">
                                  <a href="{{ route('product.show', $service->id) }}"><h5 class="card-title textHo">{{ $service->service_name }}</h5></a>
                                  <p class="card-text">Price: {{ $service->price }} JD</p>
                                  <form action="{{route('AddToCart')}}" method="post" class="m-2" >
                                    @csrf
                                    <div style="display: flex; justify-content:center" >
                                  <input type="number" name="quantity" id="" min="1"
                                  class="form-control col-3 input-quan  text-center"style="width:100px" value="1" required>
                                  <button style="width:50px" class="btn btn-primary quanBtn " role="button" type="submit">
                                      <i  class="bi bi-cart-plus"></i>
                                  </button></div>

                                    <input type="hidden" value="{{ $service->id }}" name="serviceId">
                                </form>
                                        {{-- <div class="col-auto">
                                            <div class="quantity">
                                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                <input type="number" class="qty-text text-center" id="qty" step="1" min="1" max="12" name="quantity" value="1">
                                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            </div>

                                        </div> --}}

                                    {{-- <div style="display:flex;justify-content:space-between"> <input type="number" name="quantity" id="" min="1"
                                        class="form-control col-3 mb-3 mt-4 text-center"style="width:50px" value="1" required>
                                        <button class="btn btn-primary" role="button" type="submit">
                                            <i class="bi bi-cart-plus"></i>
                                        </button>
                                    </div> --}}



                                </div>
                              </div>
                        @else
            {{------------------------------------------------------------- booking section ----------------------------------}}
                                <div class="mb-5 mt-5 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                   <br>
                                   <br>
                                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                                        <div class="fact-icon">
                                            <img class="rounded-circle" src="/servicesImages/{{ $service->image }}" width="180px"
                                                height="180px" alt="Icon">
                                        </div>

                                        <h3 class="mb-3">{{ $service->service_name }}</h3>
                                        @if ($service->type =="book_unit")
                                            <h3 class="mb-3">{{ $service->price }} JD</h3>
                                        @else
                                            <h3 class="mb-3"></h3>
                                        @endif
                                         @if ($service->type =="book_hr")

                                            <h3 class="mb-3">{{ $service->price }} JD/HR</h3>
                                        @else
                                            <h3 class="mb-3"></h3>
                                        @endif
                                        @if ($service->type =="book_m2")

                                            <h3 class="mb-3">{{ $service->price }} JD/m2</h3>
                                        @else
                                            <h3 class="mb-3"></h3>
                                        @endif



                                        {{-- <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet
                                            diam sed stet.</p>
                                        <br>
                                        <input type="hidden" value="{{ $service->id }}" name="serviceId"> --}}
                                        <h5>Available Workers :</h5><br>
                                        @foreach ($service->users as $user)


                                            <a href="{{ route('workers.show', $user->id) }}"><img class="rounded-circle"
                                                    src="/images/{{ $user->image }}" width="40px" height="40px"
                                                    style="margin-right:20px " title={{ $user->name }}></a>
                                        @endforeach


                                        <hr>
                                        <div><br>
                                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $service->id }}">Book A Service </button> --}}
                                        <a href="{{ route('product.show', $service->id) }}">    <button type="button" class="btn btn-primary">Book a service</button></a>





                </div>




                </div>
                </div>
                @endif



                <script>
            //     function Calculate() {
            //         arr=[];
            // const elements = document.querySelectorAll(".example");
            // const price = document.querySelectorAll(".pri");
            // // var total=document.querySelectorAll(".total").value;
            // for (let i = 0; i < elements.length; i++) {
            //   total=elements[i].value *price[i].value;
            // arr.push(total);

            //  }

            // console.log(arr);


            // }

                    function Calculate() {


                        var quantity = document.getElementById("quantity").value;
                        var price = document.getElementById("price").value;
                        var totalPrice = quantity * price;
                        console.log(price);
                        console.log(quantity);
                        console.log(totalPrice);
                        return document.getElementById("total_price").value = totalPrice;
                    }

                    function date() {
                        const current = new Date();
                        const date2 = `${current.getFullYear()}-${current.getMonth() + 1}-${current.getDate()}`;
                        return document.getElementById("booking_date").min = date2;

                    }
                </script>
                @endforeach
                @if(request()->get('search'))
                @else
    <div class="row"style="margin-top: 15%">
        <div  class="col-sm-12 d-md-flex mt-5  justify-content-md-center">

            {{ $services->links() }}        </div>
    </div>
    @endif
                </div>
                </div></div>
            </div>
        </div>
    </div>












@endsection


