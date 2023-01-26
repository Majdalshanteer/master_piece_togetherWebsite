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


{{------- End warning messages for booking section --------}}
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-1 text-white animated slideInDown">Services</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Services</li>
            </ol>
        </nav>
    </div>
</div>
    <div class="container-xxl py-5 mt-5">
        <div class="container pt-5">
            <div class="row g-4">
                @foreach ($services as $service)
                @if ($service->type =="cart")






                <div class="card" style="width: 18rem; margin:10px" >
<div class="image-box">
                    <img src="/servicesImages/{{ $service->image }}" height="210px" class="images card-img-top mt-2" alt="...">
</div>
                    <hr>
                    <div class="card-body">
                      <a href="{{ route('product.show', $service->id) }}"><h5 class="card-title textHo">{{ $service->service_name }}</h5></a>
                      <p class="card-text">Price: {{ $service->price }} JD</p>
                      <form action="{{route('AddToCart')}}" method="post" class="m-2" >
                        @csrf
                        <div style="display: flex; justify-content:center" >
                      <input type="number" name="quantity" id="" min="1"
                      class="form-control col-3  text-center"style="width:100px" value="1" required>
                      <button style="width:50px" class="btn btn-primary" role="button" type="submit">
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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                            <div class="fact-icon">
                                <img class="rounded-circle" src="/servicesImages/{{ $service->image }}" width="180px"
                                    height="180px" alt="Icon">
                            </div>
                            {{ $service->id }}
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


    </div>
    </div>
    </div>
@endsection


