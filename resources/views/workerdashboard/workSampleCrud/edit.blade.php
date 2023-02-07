@extends('workerdashboard.layouts.master')
@section('content')


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Form Input Grid</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                        <option selected>Aug 19</option>
                        <option value="1">July 19</option>
                        <option value="2">Jun 19</option>
                    </select>
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
                <h4 class="card-title">Edit photos</h4>
                <form action="{{ route('workSample.update', $workSample->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
    @method('PUT')
                    <div class="form-body">


                        <div class="row">
                            <div class="col-12">

                                <div class="form-group mb-4">
                                <div class="form-group">
                                    <label>worker Name</label>
                                    <input type="text" readonly class="form-control"   value="{{Auth::user()->name}}">
                                </div>
                            </div>
                        </div>
                        </div>




<hr>


                        <label>Upload image</label>
                        <h6 class="card-subtitle">Choose a photo
                        </h6>

                            <fieldset class="form-group">
                                <input type="file" name="image1" class="form-control-file" id="exampleInputFile">
                            </fieldset>

<img src="/sampleImages1/{{$workSample->image1 }}" width="100px">


                    </div><br>

<hr>
                        <label>Upload image</label>
                        {{-- <h6 class="card-subtitle">Choose a photo
                        </h6> --}}

                            <fieldset class="form-group">
                                <input type="file" name="image2" class="form-control-file" id="exampleInputFile">
                            </fieldset>

<img src="/sampleImages2/{{$workSample->image2 }}" width="100px">
<br>
<hr>
                        <label>Upload image</label>
                        {{-- <h6 class="card-subtitle">Choose a photo
                        </h6> --}}

                            <fieldset class="form-group">
                                <input type="file" name="image3" class="form-control-file" id="exampleInputFile">
                            </fieldset>

<img src="/sampleImages3/{{$workSample->image3 }}" width="100px">
<br>
<hr>
                        <label>Upload image</label>
                        {{-- <h6 class="card-subtitle">Choose a photo
                        </h6> --}}

                            <fieldset class="form-group">
                                <input type="file" name="image4" class="form-control-file" id="exampleInputFile">
                            </fieldset>

<img src="/sampleImages4/{{$workSample->image4 }}" width="100px">

{{-- @endif --}}
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
