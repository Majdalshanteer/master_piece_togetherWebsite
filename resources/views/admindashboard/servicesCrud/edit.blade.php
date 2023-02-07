@extends('admindashboard.layouts.master')
@section('content')


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Services</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Services</a></li>
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
                <form action="{{ route('servicesCrud.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
    @method('PUT')
                    <div class="form-body">


                        <div class="row">
                            <div class="col-12">

                                <div class="form-group mb-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="col-md-3" name="service_name" value="{{ $service->service_name }}">
                                </div>
                            </div>
                        </div>
                        </div>




<div class="row">

    <div class="col-12">

        <div class="form-group mb-4">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Category Name</label>
            <select  name="category_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect" >
              @if($service->category_id == "1") {
  <option value="1" selected>Beauty & Personal Care</option>
                <option value="2">Gardening</option>
                <option value="3">Cleaning</option>
                <option value="4">Home Decor</option>
                <option value="5">Decorative Pillows</option>
                <option value="6">Garden Supplies</option>
              } @elseIf($service->category_id == "2"){
                <option value="1" >Beauty & Personal Care</option>
                <option value="2" selected>Gardening</option>
                <option value="3">Cleaning</option>
                <option value="4">Home Decor</option>
                <option value="5">Decorative Pillows</option>
                <option value="6">Garden Supplies</option>
              }@elseIf($service->category_id == "3"){
                <option value="1" >Beauty & Personal Care</option>
                <option value="2" >Gardening</option>
                <option value="3" selected>Cleaning</option>
                <option value="4">Home Decor</option>
                <option value="5">Decorative Pillows</option>
                <option value="6">Garden Supplies</option>
              } @elseIf($service->category_id == "4"){
              <option value="1" >Beauty & Personal Care</option>
              <option value="2" >Gardening</option>
              <option value="3">Cleaning</option>
              <option value="4" selected>Home Decor</option>
              <option value="5">Decorative Pillows</option>
              <option value="6">Garden Supplies</option>
              }@elseIf($service->category_id == "5"){
                <option value="1" >Beauty & Personal Care</option>
                <option value="2" >Gardening</option>
                <option value="3">Cleaning</option>
                <option value="4" >Home Decor</option>
                <option value="5"selected>Decorative Pillows</option>
                <option value="6">Garden Supplies</option>
              }@else{
                <option value="1" >Beauty & Personal Care</option>
                <option value="2" >Gardening</option>
                <option value="3">Cleaning</option>
                <option value="4" >Home Decor</option>
                <option value="5">Decorative Pillows</option>
                <option value="6" selected>Garden Supplies</option>
              }

            @endif
            </select>
        </div>
</div>
</div>

                        <div class="row">
                        <div class="col-12">

                            <div class="form-group mb-4">
                                <label class="mr-sm-2" for="service_type">Type</label>
                                <select  name="type" class="custom-select mr-sm-2" id="service_type"  >
@if($service->type == "book_unit")
                                    <option value="book_unit" selected >Book Service/unit</option>
                                    <option value="book_hr">Book Service/hour</option>
                                    <option value="book_m2">Book Service/m2</option>
                                    <option value="cart">E-commerce</option>
@elseIf($service->type == "book_hr")
<option value="book_unit"  >Book Service/unit</option>
                                    <option value="book_hr" selected>Book Service/hour</option>
                                    <option value="book_m2">Book Service/m2</option>
                                    <option value="cart">E-commerce</option>
 @elseIf($service->type == "book_m2")
 <option value="book_unit"  >Book Service/unit</option>
 <option value="book_hr" >Book Service/hour</option>
 <option value="book_m2" selected>Book Service/m2</option>
 <option value="cart">E-commerce</option>
 @else{
    <option value="book_unit"  >Book Service/unit</option>
    <option value="book_hr" >Book Service/hour</option>
    <option value="book_m2" >Book Service/m2</option>
    <option value="cart" selected>E-commerce</option>
 }
 @endif
                                </select>
                            </div>

                    </div>
                        </div>

<div class="row">
                    <div class="col-12 " >
                        <div class="form-group has-icon-left">
                            <label for="price_type">price</label>
                            <div class="position-relative">
                                <input type="number" name="price"  value={{$service->price}} id="price_type" class="form-control" placeholder="price">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                    </div></div>


<hr>


                        <label>Upload Main Image</label>
                        <h6 class="card-subtitle">Choose a photo
                        </h6>

                            <fieldset class="form-group">
                                <input type="file" name="image" class="form-control-file" id="exampleInputFile">
                            </fieldset>

<img src="/servicesImages/{{ $service->image }}" width="250px" height="200px">


                    </div><br>





                    {{-- @if($service->type == "cart") --}}
<hr>
           <div class="row">
                            <div class="col-12">

                                <div class="form-group mb-4">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea type="text" class="form-control" placeholder="col-md-3" name="description" value="{{ $service->description }}">
                                        {{ $service->description }}</textarea></div>
                            </div>
                        </div>
                        </div>
<hr>
                        <label>Upload First Image</label>
                        {{-- <h6 class="card-subtitle">Choose a photo
                        </h6> --}}

                            <fieldset class="form-group">
                                <input type="file" name="image2" class="form-control-file" id="exampleInputFile">
                            </fieldset>

<img src="/servicesImages2/{{$service->image2 }}" width="150px" height="150px">
<br>
<hr>
                        <label>Upload Second Image</label>
                        {{-- <h6 class="card-subtitle">Choose a photo
                        </h6> --}}

                            <fieldset class="form-group">
                                <input type="file" name="image3" class="form-control-file" id="exampleInputFile">
                            </fieldset>

<img src="/servicesImages3/{{$service->image3 }}" width="150px"height="150px">
<br>
<hr>
                        <label>Upload Third Image</label>
                        {{-- <h6 class="card-subtitle">Choose a photo
                        </h6> --}}

                            <fieldset class="form-group">
                                <input type="file" name="image4" class="form-control-file" id="exampleInputFile">
                            </fieldset>

<img src="/servicesImages4/{{$service->image4 }}" width="150px"height="150px">

{{-- @endif --}}
                    </div><br>
                    <div class="form-actions p-2">
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
