@extends('workerdashboard.layouts.master')
@section('content')



<div class="col-md-4 offset-md-2 col-8 mt-5 " style="margin-left: 370px;" >
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add User</h4>
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
                <form class="form form-vertical" method="POST" action="{{ route('workSample.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Worker Name</label>

                                    <input type="hidden"  name="worker_id" value="{{Auth::user()->id}}" >
                                    <div class="position-relative">
                                        <input type="text" name="" value="{{Auth::user()->name}}" readonly class="form-control" placeholder="Service Name"
                                            id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                            <label>Upload image</label>
                            <h6 class="card-subtitle">Choose a photo
                            </h6>

                                <fieldset class="form-group">
                                    <input type="file" name="image1" class="form-control-file" id="exampleInputFile">
                                </fieldset>

                            </div>



                            <div class="col-12"  id="image2">
                            <label>Upload image two</label>
                            <h6 class="card-subtitle">Choose a photo
                            </h6>

                                <fieldset class="form-group">
                                    <input type="file" name="image2" class="form-control-file" id="exampleInputFile">
                                </fieldset>

                            </div>

                            <div class="col-12"  id="image3">
                            <label>Upload image three</label>
                            <h6 class="card-subtitle">Choose a photo
                            </h6>

                                <fieldset class="form-group">
                                    <input type="file" name="image3" class="form-control-file" id="exampleInputFile">
                                </fieldset>

                            </div>

                            <div class="col-12"  id="image4">
                            <label>Upload image four</label>
                            <h6 class="card-subtitle">Choose a photo
                            </h6>

                                <fieldset class="form-group">
                                    <input type="file" name="image4" class="form-control-file" id="exampleInputFile">
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
