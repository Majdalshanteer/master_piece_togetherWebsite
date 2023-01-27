@extends('pages.layout.master')


@section('content')



    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Profile</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="main-body">



            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">

                                <img src="/images/{{ Auth::user()->image }}" alt="Admin" class="rounded-circle"
                                    width="180" height="180">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-secondary mb-1">{{ Auth::user()->email }}</p>
                                    <p class="text-muted font-size-sm">{{ Auth::user()->phone }}</p>
                                    {{-- <button class="btn btn-primary">Follow</button>
                          <button class="btn btn-outline-primary">Message</button> --}}
                                </div>
                                {{-- <button class="btn btn-primary p-2" type="submit">Update Profile</button> --}}
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Edit Profile</button>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 card p-4">
                    {{-- <div class="card mb-3">
                        <div class="card-body">
                            <form id="formAccountSettings" method="POST" action="{{ route('profile.update', $user->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" style=" border:1px dotted grey;" class="form-control"
                                            name="name" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" style=" border:1px dotted grey;" class="form-control"
                                            name="email" value="{{ Auth::user()->email }}">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" style=" border:1px dotted grey;"
                                            name="phone" value="{{ Auth::user()->phone }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Profile Picture</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <fieldset class="form-group">
                                            <input type="file" name="image" class="form-control-file"
                                                id="exampleInputFile">
                                        </fieldset>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-sm-12 d-md-flex  justify-content-md-end">

                                        <button class="btn btn-primary p-2" type="submit">Update Profile</button>
                                    </div>
                                </div>
                        </div>
                    </div> --}}

                    <div class="row gutters-sm">
<h1>Your Orders</h1>
                        <div class="col-sm-12 mb-3">
                            <div class="card h-100">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>

                                            <th>
                                                Order Status
                                            </th>
                                            <th>
                                                Total Price
                                            </th>
                                            <th>
                                                Address
                                            </th>
                                            <th>
                                               Phone
                                            </th>
                                            <th>
                                               Order Details
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (empty($orders))
                                            <tr>
                                                <td colspan="4">
                                                    <h1 class="text-center">No Past Orders</h1>
                                                </td>
                                            </tr>
                                        @else
                                            {{-- @foreach ($orderdetails as $orderdetail)
                                {{ $orderdetail->service_name }}
                                {{ $orderdetail->amount }}
                                @endforeach --}}
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>

                                                    <td>{{ $order->status }}</td>
                                                    <td>{{ $order->total }} JD</td>
                                                    <td>{{ $order->address }} </td>
                                                    <td>{{ $order->phone }} </td>
                                                    <td><a href="{{ route('profile.show', $order->id ) }}">
                                                            <i class="bi bi-arrow-right-square"></i>
                                                            show

                                                        </button></a></td>


                                                        {{-- {{$orderdetail->order_details_id}} --}}

                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



<br>

                    <div class="row gutters-sm">
<h1>Your Booking</h1>
                        <div class="col-sm-12 mb-3">
                            <div class="card h-100">
                                <table class="table" >
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                               Image
                                            </th>

                                            <th>
                                                Booking Status
                                            </th>
                                            <th>
                                                Booking Date
                                            </th>
                                            <th>
                                                Total Price
                                            </th>
                                            <th>
                                               Worker Name
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
@foreach ($bookingdetails as $bookingdetail)



                                                <tr>
                                                    <td>{{ $bookingdetail->id }}</td>
                                                    <td> <img src="/servicesImages/{{ $bookingdetail->image }}" alt="book image"
                                                        srcset="" style="width:120px;height:100px;"> </td>
                                                    <td>{{ $bookingdetail->status }}</td>
                                                    <td>{{ $bookingdetail->booking_date }}</td>
                                                    <td>{{ $bookingdetail->total_price }} JD</td>
                                                    <td>{{ $bookingdetail->name }} </td>
                                                    {{-- <td><button type="button" class="btn primary-outline"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{$bookingdetail->id}}">
                                                            <i class="bi bi-arrow-right-square"></i>
                                                        </button></td> --}}
                                                </tr>
                                            @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>

    </div>




    <!-- Modal order section-->
    {{-- <input type="hidden" name="orderId" value="{{$order->id}}"> --}}
    {{-- <div class="modal fade" id="exampleModal{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Order Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>

                                <th>
                                    Image
                                </th>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Price
                                </th>

                            </tr>
                        </thead>
                        <tbody> --}}
                            {{-- @foreach ($orderdetails as $orderdetail)
                                <tr>
                                    <td>{{ ++$i }}
                                    </td>
                                    <td> <img src="/servicesImages/{{ $orderdetail->image }}" alt="book image"
                                            srcset="" style="width:80px;height:90px;"> </td>
                                    <td>{{ $orderdetail->service_name }} </td>
                                    <td>{{ $orderdetail->amount }} </td>
                                    <td>{{ $orderdetail->price }}JD </td>

                                </tr>


                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>




    <!-- Modal booking section -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Booking Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>

                                <th>
                                    Image
                                </th>
                                <th>
                                    Service
                                </th>
                                <th>
                                    Worker Name
                                </th>
                                <th>
                                    Hours
                                </th>
                                <th>
                                    Price
                                </th>

                            </tr>
                        </thead>
                        <tbody> --}}
                            {{-- @foreach ($bookingdetails as $bookingdetail)
                                <tr>
                                    <td>{{ ++$i }}
                                    </td>
                                    <td> <img src="/servicesImages/{{ $bookingdetail->image }}" alt="book image"
                                            srcset="" style="width:80px;height:90px;"> </td>
                                    <td>{{ $bookingdetail->service_name }} </td>
                                    <td>{{ $bookingdetail->name }} </td>
                                    <td>{{ $bookingdetail->quantity }} </td>
                                    <td>{{ $bookingdetail->total_price }}JD </td>


                                </tr>


                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>







   {{-- model edit profile --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">


            <form id="formAccountSettings" method="POST" action="{{ route('profile.update', $user->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" style=" border:1px dotted grey;" class="form-control"
                            name="name" value="{{ Auth::user()->name }}">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" style=" border:1px dotted grey;" class="form-control"
                            name="email" value="{{ Auth::user()->email }}">

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" style=" border:1px dotted grey;"
                            name="phone" value="{{ Auth::user()->phone }}">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Profile Picture</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <fieldset class="form-group">
                            <input type="file" name="image" class="form-control-file"
                                id="exampleInputFile">
                        </fieldset>
                    </div>
                </div>
                <br>
{{--
                <div class="row">
                    <div class="col-sm-12 d-md-flex  justify-content-md-end">

                        <button class="btn btn-primary p-2" type="submit">Update Profile</button>
                    </div></div> --}}

            {{-- <form>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form> --}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Profile</button>
          </div>    </form>
        </div>
      </div>
    </div>



@endsection
