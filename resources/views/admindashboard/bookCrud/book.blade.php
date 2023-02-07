
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
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Apps</a></li>
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

                                <br>
                                <div class="table-responsive">
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Service Name</th>
                                                <th>Worker Name</th>
                                                <th>Booking Date</th>
                                                <th>User Name</th>
                                                <th> Location</th>
                                                <th> Price</th>
                                                <th> Status</th>
                                                <th>Action </th>






                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bookServices as $bookService)
                                            <tr>
                                                <td><span class="badge badge-light-warning">{{ $bookService->id }}</span></td>

                                                <td><a href="javascript:void(0)" class="font-weight-medium link">{{ $bookService->service->service_name }}</a></td>

                                                <td><a href="javascript:void(0)" class="font-weight-medium link">{{ $bookService->worker->name }}</a></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">{{ $bookService->booking_date }}</a></td>

                                                <td><a href="javascript:void(0)" class="font-weight-medium link">{{ $bookService->name }}</a></td>

                                                <td><a href="javascript:void(0)" class="font-weight-medium link">{{ $bookService->location }}</a></td>

                                                <td><a href="javascript:void(0)" class="font-weight-medium link">{{ $bookService->total_price }}</a></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">
                                                    @if( $bookService->status == 'Pending')
                                                    <span class="badge bg-warning font-12 text-white
                                                    font-weight-medium badge-pill ml-2 d-md-none d-lg-block">{{ $bookService->status}}
                                               </span>
                                               @elseif($bookService->status == 'confirm')
                                               <span class="badge bg-info font-12 text-white
                                               font-weight-medium badge-pill ml-2 d-md-none d-lg-block">{{ $bookService->status}}
                                          </span>
                                               @elseif($bookService->status == 'completed')
                                               <span class="badge bg-success font-12 text-white
                                               font-weight-medium badge-pill ml-2 d-md-none d-lg-block">{{ $bookService->status}}
                                          </span>
                                          @else
                                          <span class="badge bg-danger font-12 text-white
                                          font-weight-medium badge-pill ml-2 d-md-none d-lg-block">{{ $bookService->status}}
                                     </span>
                                     @endif</a></td>







                                                <td>
                                                    <!-- show button -->
                                                    <a href="" class="ms-3 "></a>
                                                    <form style="display: inline-block" method="POST" >
                                                        <a   href="{{ route('bookCrud.show', $bookService->id) }}">
                                                            Show<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                                                              </svg>
                                                         </a>


                                                    </form>
                                                </td>
                                            </tr>



                                    @endforeach
                                    </table>

                                    <ul class="pagination float-right">
                                        {{ $bookServices->links() }}
                                 
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
