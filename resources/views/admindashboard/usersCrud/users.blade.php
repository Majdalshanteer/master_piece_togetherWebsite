
       @extends('admindashboard.layouts.master')
       @section('content')


        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Users</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Apps</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Users</li>
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
                                <a href="{{route('usersinfo.create')}}"><button class="btn btn-info">Add User</button></a>
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
                                                <th>User Name</th>
                                                <th>image</th>
                                                <th>User Email</th>
                                                <th>User Phone</th>
                                                <th>User Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td><span class="badge badge-light-warning">{{ $user->id }}</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">{{ $user->name }}</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link"><img src="/images/{{ $user->image }}"  width="80px" height="80px"></a></td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->type }}</td>
                                                <td>
                                                    <!-- edit button -->
                                                    <a href="" class="ms-3 "></a>
                                                    <form style="display: inline-block" method="POST"
                                                        action="{{ route('usersinfo.destroy',$user->id) }}"onsubmit="return confirm('Are you sure?');" >
                                                        <a   href="{{ route('usersinfo.edit', $user->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                          </svg></a>

                                                      <!-- Delete button -->
                                                      @csrf
                                                      @method('DELETE')
                                                        <button class="btn text-danger"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            {{-- <tr>
                                                <td><span class="badge badge-light-danger">Closed</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">AdminX
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1234251</a></td>
                                                <td>AdminX Admin</td>
                                                <td>Nirav Joshi</td>
                                                <td>2018/05/11</td>
                                                <td>Steve</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-success">Opened</span></td>
                                                <td><a href="javascript:void(0)"
                                                        class="font-weight-medium link">Admin-Pro
                                                        Theme Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1020345</a></td>
                                                <td>Admin-Pro</td>
                                                <td>Vishal Bhatt</td>
                                                <td>2018/04/01</td>
                                                <td>John</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-warning">In Progress</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">Elegant
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">7810203</a></td>
                                                <td>Elegant Admin</td>
                                                <td>Eric Pratt</td>
                                                <td>2018/01/01</td>
                                                <td>Fazz</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-warning">In Progress</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">AdminX
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">2103450</a></td>
                                                <td>AdminX Admin</td>
                                                <td>Nirav Joshi</td>
                                                <td>2018/05/01</td>
                                                <td>John</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-warning">In Progress</span></td>
                                                <td><a href="javascript:void(0)"
                                                        class="font-weight-medium link">Admin-Pro
                                                        Theme Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">2140530</a></td>
                                                <td>Admin-Pro</td>
                                                <td>Vishal Bhatt</td>
                                                <td>2018/07/01</td>
                                                <td>Steve</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-success">Opened</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">Elegant
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">4500123</a></td>
                                                <td>Elegant Admin</td>
                                                <td>Eric Pratt</td>
                                                <td>2018/05/10</td>
                                                <td>Fazz</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-danger">Closed</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">Elegant
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1230450</a></td>
                                                <td>Elegant Admin</td>
                                                <td>Eric Pratt</td>
                                                <td>2018/05/14</td>
                                                <td>John</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-danger">Closed</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">AdminX
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1240503</a></td>
                                                <td>AdminX Admin</td>
                                                <td>Nirav Joshi</td>
                                                <td>2018/02/01</td>
                                                <td>Steve</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-success">Opened</span></td>
                                                <td><a href="javascript:void(0)"
                                                        class="font-weight-medium link">Admin-Pro
                                                        Theme Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1250304</a></td>
                                                <td>Admin-Pro</td>
                                                <td>Vishal Bhatt</td>
                                                <td>2018/05/21</td>
                                                <td>Fazz</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-success">Opened</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">Elegant
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1470250</a></td>
                                                <td>Elegant Admin</td>
                                                <td>Eric Pratt</td>
                                                <td>2018/05/11</td>
                                                <td>John</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-danger">Closed</span></td>
                                                <td><a href="javascript:void(0)"
                                                        class="font-weight-medium link">Admin-Pro
                                                        Theme Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1450023</a></td>
                                                <td>Admin-Pro</td>
                                                <td>Vishal Bhatt</td>
                                                <td>2018/05/13</td>
                                                <td>Steve</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-light-warning">In Progress</span></td>
                                                <td><a href="javascript:void(0)" class="font-weight-medium link">AdminX
                                                        Theme
                                                        Side Menu Open OnClick</a></td>
                                                <td><a href="javascript:void(0)" class="font-bold link">1420530</a></td>
                                                <td>AdminX Admin</td>
                                                <td>Nirav Joshi</td>
                                                <td>2018/10/01</td>
                                                <td>Fazz</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Status</th>
                                                <th>Title</th>
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>Created by</th>
                                                <th>Date</th>
                                                <th>Agent</th>
                                            </tr>
                                        </tfoot>--}}


                                    @endforeach
                                    </table>

                                    <ul class="pagination float-right">
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
