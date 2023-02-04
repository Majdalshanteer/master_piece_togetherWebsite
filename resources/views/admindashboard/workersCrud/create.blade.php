@extends('admindashboard.layouts.master')
@section('content')



<div class="col-md-4 offset-md-2 col-8 mt-5 " style="margin-left: 370px;" >
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Worker</h4>
        </div>
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






        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" method="POST" action="{{ route('workersinfo.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Name</label>
                                    <div class="position-relative">
                                        <input type="text" name="name" value="" class="form-control" placeholder="First Name"
                                            id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="col-12">

                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Email</label>
                                    <div class="position-relative">
                                        <input type="text" name="email" value="" class="form-control" placeholder="Email"
                                            id="email-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Password</label>
                                    <div class="position-relative">
                                        <input type="password" name="password" value="" class="form-control" placeholder="Password"
                                            id="email-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="phone">Phone</label>
                                    <div class="position-relative">
                                        <input type="number" name="phone" value="" class="form-control" placeholder="phone"
                                            id="phone">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">

                                    <div class="form-group mb-4">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">User Type</label>
                                        <select name="type" class="custom-select mr-sm-2" id="inlineFormCustomSelect" >
                                            {{-- <option selected>Choose...</option> --}}

                                            <option value="Worker"selected>Worker</option>

                                        </select>
                                    </div>

                            </div>



                            <div class="col-12">

                                    <div class="form-group mb-4">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Select Service</label>
                                        <select name="service_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect" >
                                            {{-- <option selected>Choose...</option> --}}
                                               @foreach($services as $service)
                                               <option value="{{$service->id}}" >{{$service->service_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>

                            </div>

                            <div class="col-12">
                            <label>Upload image</label>
                            <h6 class="card-subtitle">Choose a photo
                            </h6>

                                <fieldset class="form-group">
                                    <input type="file" name="image" class="form-control-file" id="exampleInputFile">
                                </fieldset>

                            </div>


 </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
