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

                        <img src="/images/{{Auth::user()->image}}" alt="Admin" class="rounded-circle" width="220" height="250">
                        <div class="mt-3">
                          <h4>{{Auth::user()->name}}</h4>
                          <p class="text-secondary mb-1">{{Auth::user()->email}}</p>
                          <p class="text-muted font-size-sm">{{Auth::user()->phone}}</p>
                          {{-- <button class="btn btn-primary">Follow</button>
                          <button class="btn btn-outline-primary">Message</button> --}}
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="card mb-3">
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text"  style=" border:1px dotted grey;" class="form-control" name="name" value="{{Auth::user()->name}}">
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" style=" border:1px dotted grey;" class="form-control" name="email" value="{{Auth::user()->email}}">

                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" style=" border:1px dotted grey;" name="phone" value="{{Auth::user()->phone}}">
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Profile Picture</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <fieldset class="form-group">
                                <input type="file" name="image" class="form-control-file" id="exampleInputFile">
                            </fieldset>
                      </div>
                      </div>
                      <hr>


                      <div class="row">
                        <div class="col-sm-12">
                          <button class="btn btn-info " type="submit">Update Profile</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gutters-sm">

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
                                </tr>
                            </thead>
                            <tbody>

                                @if (empty($orders))
                                    <tr>
                                        <td colspan="4">
                                            <h1 class="text-center">No Post Orders</h1>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>

                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->total }} JD</td>
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

@endsection
