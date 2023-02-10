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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ Auth::user()->id }}"
                                    data-bs-whatever="@getbootstrap">Edit Profile</button>

                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fa fa-star text-warning "></i> Your Ratings</h6>
                                {{-- <span class="text-secondary">-</span> --}}
                            </li>
                        </ul>
                    </div>
                    {{-- <h4 class="p-2">Your Ratings</h4> --}}
                    <div class="card mt-3">


                        <table class="table ">
                            @if ($commentCount == 0)
                                <tr>
                                    <td colspan="7">
                                        <h5 class="text-center"> Rate,
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                href="http://127.0.0.1:8000/workers">
                                                Our Workers . !
                                            </a>
                                        </h5>
                                    </td>
                                </tr>
                            @else
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>
                                            Worker Name
                                        </th>
                                        <th>
                                            Rate </th>
                                        <th>
                                            Delete </th>



                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <ul class="list-group list-group-flush"> --}}
                                    @foreach ($comments as $comment)
                                        <tr>


                                            <td> <img class="rounded-circle" src="/images/{{ $comment->worker->image }}"
                                                    width="50px" height="50px" alt="Icon"></td>
                                            <td>{{ $comment->worker->name }}</td>
                                            <td>
                                                @for ($i = 1; $i <= $comment->rate; $i++)
                                                    <span class="text-primary"><i
                                                            class="fa fa-star text-warning "></i></span>
                                                @endfor
                                            </td>

                                            <td>

                                                <form style="display: inline-block" method="POST"
                                                    action="{{ route('profile.destroy', $comment->id) }}">


                                                    <!-- Delete button -->
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button class="btn text-danger"></button> --}}
                                                    <button type="button" class="btn text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $comment->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>

                                                    <!-- Modal delete comment -->
                                                    <div class="modal fade" id="exampleModal{{ $comment->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Delete
                                                                        Comment</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>


                                        </tr>
                                    @endforeach
                            @endif
                        </table>

                        <div class="row px-2">
                            <div class="col-sm-12 d-md-flex   justify-content-md-end">

                                {{ $comments->links() }} </div>
                        </div>
                        {{-- </ul> --}}
                    </div>
                </div>
                <div class="col-md-8 ">
                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="row ">
                                <h5><i class="bi bi-list-ul"></i> Your Orders</h5>
                                <div class="col-sm-12 mb-3">
                                    <div class="card h-100">
                                        <table class="table text-center">



                                            @if ($orderscount == 0)
                                                <tr>

                                                    <td colspan="7">
                                                        <h5 class="text-center"> Make Your First Order ,
                                                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                                href="http://127.0.0.1:8000/services/4">
                                                                Go To Shop ..!
                                                            </a>
                                                        </h5>
                                                    </td>
                                                </tr>
                                            @else
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
                                                            Order Date
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


                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->id }}</td>

                                                            <td>
                                                                @if ($order->status == 'Pending')
                                                                    <span
                                                                        class="badge rounded-pill bg-danger">{{ $order->status }}</span>
                                                                @else
                                                                    <span
                                                                        class="badge rounded-pill bg-success">{{ $order->status }}</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $order->total }} JD</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->address }} </td>
                                                            <td>{{ $order->phone }} </td>
                                                            <td><a class=""
                                                                    href="{{ route('profile.show', $order->id) }}">
                                                                    <span class="badge rounded-pill bg-dark"><i class="bi bi-arrow-right"></i></span>



                                                                    </button></a></td>


                                                        </tr>
                                                    @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>



                            <br>

                            <div class="row">
                                <h5><i class="bi bi-list-ul"></i> Your Booking</h5>
                                <div class="col-sm-12 mb-3">
                                    <div class="card h-100">
                                        <table class="table text-center">
                                            @if ($bookCount == 0)
                                                <tr>
                                                    <td colspan="7">
                                                        <h5 class="text-center"> Make Your First Book,
                                                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                                href="http://127.0.0.1:8000/services/1">
                                                                Book A Service . !
                                                            </a>
                                                        </h5>
                                                    </td>
                                                </tr>
                                            @else
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
                                                            <td> <img src="/servicesImages/{{ $bookingdetail->image }}"
                                                                    alt="book image" srcset=""
                                                                    style="width:120px;height:100px;">
                                                            </td>
                                                            <td>
                                                                @if ($bookingdetail->status == 'completed')
                                                                    <span
                                                                        class="badge rounded-pill bg-success">{{ $bookingdetail->status }}</span>
                                                                @else
                                                                    <span
                                                                        class="badge rounded-pill bg-danger">{{ $bookingdetail->status }}</span>
                                                                @endif

                                                            </td>
                                                            <td>{{ $bookingdetail->booking_date }}</td>
                                                            <td>{{ $bookingdetail->total_price }} JD</td>
                                                            <td>{{ $bookingdetail->name }} </td>

                                                        </tr>
                                                    @endforeach
                                            @endif
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

    </div>





    {{-- model edit profile --}}

    <div class="modal fade" id="exampleModal{{ Auth::user()->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
                </form>
            </div>
        </div>
    </div>












@endsection
