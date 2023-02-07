
       @extends('admindashboard.layouts.master')
       @section('content')


        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Book Services</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Book Services</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-primary text-center">
                                                <h1 class="font-light text-white">{{\DB::table('users')->where('type', 'User')->count()}}</h1>
                                                <h6 class="text-white">Users</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-cyan text-center">
                                                <h1 class="font-light text-white">{{\DB::table('users')->where('type', 'Worker')->count()}}</h1>
                                                <h6 class="text-white">Workers</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-success text-center">
                                                <h1 class="font-light text-white">{{\DB::table('categories')->count()}}</h1>
                                                <h6 class="text-white">Categories</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-danger text-center">
                                                <h1 class="font-light text-white">{{\DB::table('services')->count()}}</h1>
                                                <h6 class="text-white">Services</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>
                                <a href="{{route('connectService.create')}}"><button class="btn btn-info">Add Service to Worker</button></a>
                                <br>
                                <div class="table-responsive mt-2">
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>


 <th>Worker Name</th>    <th>Service Name</th>
                                                <th>Action </th>






                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($userServices as $userService)
                                            <tr>
                                                <td><span class="badge badge-light-warning">{{ $userService->id }}</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">{{ $userService->name}}</a></td>

                                                <td><a href="javascript:void(0)" class="font-weight-medium link">{{ $userService->service_name }}</a></td>



                                                <td>
                                                    <!-- edit button -->
                                                    <a href="" class="ms-3 "></a>
                                                    <form style="display: inline-block" method="POST"
                                                        action="{{ route('connectService.destroy',$userService->id) }}">


                                                      <!-- Delete button -->
                                                      @csrf
                                                      @method('DELETE')


<!-- Button trigger modal -->
<button type="button" class="btn text-danger" data-toggle="modal" data-target="#exampleModal{{$userService->id}}">
    <i class="far fa-trash-alt"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$userService->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </div>
    </div>
  </div>




                                                    </form>
                                                </td>

                                            </tr>



                                    @endforeach
                                    </table>
                                    <ul class="pagination float-right">
                                        {{ $userServices->links() }}

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

@endsection
