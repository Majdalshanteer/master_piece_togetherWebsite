@extends('admindashboard.layouts.master')
@section('content')


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Website Rating</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Website Rating</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Edit</li>
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
               
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('WebsiteRating.update',$review->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">User Name :{{ $review->user->name }}</li>

                        <li class="list-group-item">User Email :{{ $review->user->email }}</li>
                        <li class="list-group-item">User Email :{{ $review->email }}</li>
                        <li class="list-group-item">Rate :{{ $review->rate}}</li>
                        <li class="list-group-item">Comment :{{ $review->comment }}</li>

                      </ul>
                      <li class="list-group-item">
                        <label class="form-label" for="status">Change Review Status</label><br>
                        <select name="status" class="form-control">
@if($review->status==="ok")
                            <option name="status" selected value="ok">Confirm</option>
                            <option name="status" value="no">Ignore</option>
                            @else
                            <option name="status" selected value="no">Ignore</option>
                            <option name="status"  value="ok">Confirm</option>
                            @endif
                        </select>  <br> <button type="submit" class="btn btn-primary me-2 float-right">Update Status</button>
                        <br>
<br>
                      </li>

                </div>
                </div>
            </form>
                    </div><br>


            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection
