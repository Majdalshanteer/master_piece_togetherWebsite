
       @extends('admindashboard.layouts.master')
       @section('content')
    <!-- Content wrapper -->

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
                    <h4 class="card-title">Edit Order Status</h4>
                    <br>
                    <div class="col-6">
                        <table class="table table-borderd  ">
                            <thead>
                                <tr>
                                    <th >Product </th>
                                    <th >Image </th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td >{{ $product->service_name }}</td>
                                        <td><a href="javascript:void(0)" class="font-bold link"><img src="/servicesImages/{{ $product->image }}"  width="80px" height="80px"></a></td>

                                        <td>{{ $product->amount }}</td>

                                        <td>{{ $product->price}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <form action="{{ route('orders.update',$order->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Order Num {{ $order->id }}</li>
                        <li class="list-group-item">Name : {{ $name }}</li>
                        <li class="list-group-item">Location :{{ $order->address }}</li>
                        <li class="list-group-item">Phone :{{ $order->phone }}</li>
                        <li class="list-group-item">Price :{{ $order->total }} JD</li>
                        <li class="list-group-item">Note :{{ $order->note }}</li>
                        <li class="list-group-item">Order Status :{{ $order->status }}</li>
                      </ul>
<br>
                      <li class="list-group-item">
                        <label class="form-label" for="status">Change Order Status</label><br>
                        <select name="status" class="form-control">
@if($order->status==="Pending")
                            <option name="status" selected value="Pending">Pending</option>
                            <option name="status" value="delivered">delivered</option>
                            @else
                            <option name="status"  value="Pending">Pending</option>
                            <option name="status" selected value="delivered">delivered</option>
                            @endif
                        </select>  <br> <button type="submit" class="btn btn-primary me-2 float-right">Update Status</button>
                        <br>
<br>
                      </li>

                    </form>

                </div>
            </div>
        </div>
    </div>

    </div>




















                    @endsection
