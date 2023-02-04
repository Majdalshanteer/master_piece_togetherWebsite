
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
                                                        action="{{ route('connectService.destroy',$userService->id) }}"onsubmit="return confirm('Are you sure?');" >


                                                      <!-- Delete button -->
                                                      @csrf
                                                      @method('DELETE')
                                                        <button class="btn text-danger"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                                {{-- <td>
                                                    <!-- show button -->
                                                    <a href="" class="ms-3 "></a>
                                                    <form style="display: inline-block" method="POST" >
                                                        <a   href="{{ route('connectService.edit', $userService->id) }}">Edit
                                                         </a>


                                                    </form>
                                                </td> --}}
                                            </tr>



                                    @endforeach
                                    </table>
                                    <ul class="pagination float-right">
                                        {{ $userServices->links() }}

                                    </ul>
                                    {{-- <ul class="pagination float-right">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul> --}}
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
