@extends('pages.layout.master')


@section('content')


<div class="page-wrapper">
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Order Details</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Profile</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Order Details</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="row">
<div class="col-3"></div>
    <div class="col-md-6 card p-3">


        <div class="row gutters-sm">
<h1>Order Details</h1>
            <div class="col-sm-12 mb-3">
                <div class="card h-100">
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
                        <tbody>
                            @foreach($products as $product)
                             <tr>
<td>{{ ++$i }} </td>
                        <td> <img src="/servicesImages/{{ $product->image }}" alt="book image"
                                srcset="" style="width:80px;height:90px;"> </td>
                        <td>{{ $product->service_name }} </td>
                        <td>{{ $product->amount }} </td>
                        <td>{{ $product->price }}JD </td>
@endforeach
                    </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12 d-md-flex  justify-content-md-end">

                <a href="/profile"><button class="btn btn-primary p-2" type="button">Back to your profile</button></a>
            </div>
        </div>


</div>

</div>
</div>
@endsection
