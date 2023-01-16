
@extends('pages.layout.master')


@section('content')


    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Cart</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    <main class="page">
        <section class="shopping-cart dark pt-0 ">

            <div class="container ">

                <div class="content ">
                    <div class="row ">
                        <div class="col-md-12 col-lg-8 ">
                            <div class="items">
                                <div class="product">

                                    <table
                                        class=" table
                                    cart align-middle mx-2">
                                        <thead class="bg-white">
                                            <tr>
                                                <th colspan="2"></th>
                                                <th>Products</th>
                                                <th>Price</th>
                                                <th>Quantity</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                            @if (session()->has('order'))
                                                @foreach ($services as $service)
                                                    <tr>
                                                        <td class="product-remove">

                                                            <button value="" class="btn" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal{{ $service->id }}">
                                                                <i class="bi bi-x-circle text-danger"></i>
                                                            </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal{{ $service->id }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                data-bs-backdrop="static" aria-hidden="true">
                                                                <form action="{{ route('DeleteFromCart') }}" method="post">
                                                                    @csrf
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title fs-2"
                                                                                    id="exampleModalLabel">Delete Product</h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <input type="hidden" name="service_id"
                                                                                value="{{ $service->id }}">
                                                                            <div class="modal-body">
                                                                                are you sure ?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary bg-black"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Save
                                                                                    changes</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="/servicesImages/{{ $service->image }}" alt="book image"
                                                                srcset="" style="width:150px;height:150px;">
                                                        </td>
                                                        <td>
                                                            <a style="color: black"
                                                                {{-- href="{{ route('restaurants.show', $restaurant->id) }}" --}}
                                                                class="text-decoration-none">
                                                                {{ $service->name }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <bdi>
                                                                {{ $service->price }}JD
                                                            </bdi>
                                                        </td>
                                                        <td>
                                                            {{-- {{ $service->id }} --}}
                                                            {{ session('order.services')[$service->id] }}

                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Summary</h3>
                                <form action="{{ route('checkout') }}" method="POST">
                                    @csrf
                                    <div class="summary-item"><span class="text">Subtotal</span><span class="price">
                                            @if ($price !== 0)
                                                {{ $price }} JD
                                            @else
                                                0
                                            @endif
                                        </span></div>

                                    <div class="summary-item"><span class="text">Total</span><span class="price">
                                            @if ($price !== 0)
                                                {{ $price}} JD
                                            @else
                                                0
                                            @endif
                                        </span></div>

                                    <div class="summary-item"><br><span class="text">Note :
                                            <textarea class="form-control" placeholder="" id="floatingTextarea3" name="address" required></textarea>
                                        </span><span class="price">
                                        </span><br></div>
                                    <div class="summary-item"><br><span class="text">Address :
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2" name="note"></textarea>
                                        </span><span class="price"> </span>
                                        <br>
                                    </div>
                                    <tr>
                                        <td colspan="2" class="pt-2">
                                            <label for=""><b>Delivery</b></label><br>
                                            <input type="radio" name="delivery" id="delivery" checked>
                                            <label for="delivery">Cash on delivery</label>
                                        </td>
                                    </tr>


                                    @if (session()->has('order.services'))
                                        <tr>
                                            <td colspan="2">
                                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                <input type="hidden" name="total"
                                                    value="{{ $price}}">
                                                <div class="d-grid gap-2">
                                                    <button class="btn btn-lg " style="background-color:#fec45b"
                                                        type="submit" role="button">
                                                        Checkout
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="2">
                                                <div class="alert alert-warning" role="alert">
                                                    You must have meals in cart and logged in in order to checkout !
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="d-grid gap-2">
                                                    <button class="btn btn-lg " style="background-color:#fec45b"
                                                        type="submit" role="button" disabled>
                                                        checkout
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                </form>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </body>
    <script>
    let sum= 0
function sumArray(array){

    for (let i=0; i < array.length; i++) {

      sum += array[i];

    }
    console.log(sum);
}
sumArray( [1,2,3,8,9])
        </script>





@endsection








