@extends('admindashboard.layouts.master')
@section('content')


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Booking Details</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Booking</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Show</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

<div   class="container-fluid">
<div class="row">
    <div class="col-3"></div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Booking Details</h4>
                <div class="row">
                    <div class="col-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Service Name :{{ $bookService->service->service_name }}</li>
                        <li class="list-group-item">Worker Name :{{ $bookService->worker->name }}</li>
                        <li class="list-group-item">Booking Date :{{ $bookService->booking_date }}</li>
                        <li class="list-group-item">User Name :{{ $bookService->user->name }}</li>
                        <li class="list-group-item">User Phone :{{ $bookService->phone }}</li>
                        <li class="list-group-item">User Email :{{ $bookService->email }}</li>
                        <li class="list-group-item">Total Price :{{ $bookService->total_price }}</li>
                        <li class="list-group-item">Notes :{{ $bookService->note }}</li>
                      </ul>
                </div>
                </div>

                    </div><br>


            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection
