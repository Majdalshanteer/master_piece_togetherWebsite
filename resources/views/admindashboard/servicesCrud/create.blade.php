@extends('admindashboard.layouts.master')
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
                <form class="form form-vertical" method="POST" action="{{ route('servicesCrud.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Name</label>
                                    <div class="position-relative">
                                        <input type="text" name="service_name" value="" class="form-control" placeholder="Service Name"
                                            id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="form-group mb-4">
                                    <label class="mr-sm-2" for="service_type">Type</label>
                                    <select  name="type" class="custom-select mr-sm-2" id="service_type"  >
                                        <option value="book_unit" >Book Service/unit</option>
                                        <option value="book_hr">Book Service/hour</option>
                                        <option value="book_m2">Book Service/m2</option>
                                        <option value="cart">E-commerce</option>

                                    </select>
                                </div>

                        </div>



                        <div class="col-12 " >
                            <div class="form-group has-icon-left">
                                <label for="price_type">price</label>
                                <div class="position-relative">
                                    <input type="number" name="price" id="price_type" class="form-control" placeholder="price">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                            </div>
                        </div>



                            <div class="col-12">

                                    <div class="form-group mb-4">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Category Name</label>
                                        <select  name="category_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect" >

                                            <option value="1" selected>Beauty & Personal Care</option>
                                            <option value="2">Gardening</option>
                                            <option value="3">Cleaning</option>
                                            <option value="4">Home Decor</option>
                                            <option value="5">Decorative Pillows</option>
                                            <option value="6">Garden Supplies</option>
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

<div id="cartSection">

    <div class="col-12"  id="description">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Description</label>
                                    <div class="position-relative">
                                        <textarea type="text" name="description" value="" class="form-control" placeholder="description"
                                            id="first-name-icon"></textarea>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
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
<script>
    function show(){
        var service_type = document.getElementById("service_type");
    var cart_section = document.getElementById("cartSection");
    cart_section.style.display = service_type.value == "cart" ? "block" : "none";
console.log(service_type.value)
    }

    </script>
@endsection
