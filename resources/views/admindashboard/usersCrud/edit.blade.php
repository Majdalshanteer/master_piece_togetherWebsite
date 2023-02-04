@extends('admindashboard.layouts.master')
@section('content')


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit User</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Users</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
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
<div   class="container-fluid">
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Edit User</h4> --}}
                <form action="{{ route('usersinfo.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
    @method('PUT')
                    <div class="form-body">


                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="col-md-3" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="col-md-3" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" placeholder="phone" name="phone" value="{{ $user->phone }}">
                                </div>
                            </div>
                        </div>




                        <h4 class="card-title">User Type</h4>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="User" name="type"
                                class="custom-control-input" value="User" checked>
                            <label class="custom-control-label" for="User">User</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="Worker" name="type"
                                class="custom-control-input" value="Worker">
                            <label class="custom-control-label" for="Worker">Worker</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="Admin" name="type"
                                class="custom-control-input" value="Admin">
                            <label class="custom-control-label" for="Admin">Admin</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="Driver" name="type"
                                class="custom-control-input" value="Driver">
                            <label class="custom-control-label" for="Driver">Driver</label>
                        </div>


{{--

                        <div class="card-body">
                            <h4 class="card-title">Custom Select</h4>
                            <h6 class="card-subtitle">To use add <code>.custom-select</code> class</h6>
                            <form>
                                <div class="form-group mb-4">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Select</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </form>
                        </div> --}}













                        {{-- <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="customRadio"
                                class="custom-control-input" disabled>
                            <label class="custom-control-label" for="customRadio3">Or toggle this other custom
                                radio</label>
                        </div> --}}









                        {{-- <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>User Type</label>
                                    <input type="text" class="form-control" placeholder="col-md-3">
                                </div>
                            </div>
                        </div> --}}
<br>
                        <label>Upload image</label>
                        <h6 class="card-subtitle">Choose a photo
                        </h6>

                            <fieldset class="form-group">
                                <input type="file" name="image" class="form-control-file" id="exampleInputFile">
                            </fieldset>


                        {{-- <strong>image:</strong>
                        <input type="file" name="image" class="form-control" placeholder="image">
                        <br> --}}
<img src="/images/{{ $user->image }}" width="100px">


                    </div><br>
                    <div class="form-actions">
                        <div class="text-right">
                            <button type="submit" class="btn btn-info">Update</button>
                            {{-- <button type="reset" class="btn btn-dark">Reset</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection
