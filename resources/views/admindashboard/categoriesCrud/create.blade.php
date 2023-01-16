@extends('admindashboard.layouts.master')
@section('content')



<div class="col-md-4 offset-md-2 col-8 mt-5 " style="margin-left: 370px;" >
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Category</h4>
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
                <form class="form form-vertical" method="POST" action="{{ route('categories.store') }}"
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
                            <label>Upload image</label>
                            <h6 class="card-subtitle">Choose a photo
                            </h6>

                                <fieldset class="form-group">
                                    <input type="file" name="image" class="form-control-file" id="exampleInputFile">
                                </fieldset>

                            </div>
                            <div class="col-12">
                            <label>Upload logo</label>
                            <h6 class="card-subtitle">Choose a logo
                            </h6>

                                <fieldset class="form-group">
                                    <input type="file" name="logo" class="form-control-file" id="exampleInputFile">
                                </fieldset>

                            </div>

                            <div class="col-12">
    <div class="form-group has-icon-left">
        <label for="description">Description</label>
        <div class="position-relative">
            <textarea type="text" name="description" value="" class="form-control" placeholder="Description"
                id="first-name-icon"></textarea>
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
    </div>
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
