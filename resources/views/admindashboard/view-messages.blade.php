

@extends('admindashboard.layouts.master')
@section('content')


 <div class="page-wrapper">
     <!-- ============================================================== -->
     <!-- Bread crumb and right sidebar toggle -->
     <!-- ============================================================== -->
     <div class="page-breadcrumb">
         <div class="row">
             <div class="col-7 align-self-center">
                 <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Complaints</h4>
                 <div class="d-flex align-items-center">
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb m-0 p-0">
                             <li class="breadcrumb-item"><a href="index.html" class="text-muted">Dashboard</a></li>
                             <li class="breadcrumb-item text-muted active" aria-current="page">Complaints</li>
                         </ol>
                     </nav>
                 </div>
             </div>
             <div class="col-5 align-self-center">

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
                         {{-- <a href="{{route('servicesCrud.create')}}"><button class="btn btn-info">Add Service</button></a> --}}
                         <br>
                         <div class="table-responsive">
                             @if ($message = Session::get('success'))
                             <div class="alert alert-success">
                                 <p>{{ $message }}</p>
                             </div>
                         @endif

        <section class="section">
            <div class="card">

                {{-- <div class="card-header" style="display: flex; justify-content:space-between; align-items:center">
                    <div>Complaints Table</div>

                </div> --}}
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                {{-- <th>User Last Name</th> --}}
                                <th>User Email</th>

                                <th>Subject</th>

                                <th >Action</th>
                                {{-- <th>??</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                           {{-- @foreach ($users as $user) --}}
                           @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->id }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>

                                    <td>{{ $message->subject }}</td>


                                    <td>
                                        <!-- edit button -->
                                        <a href="" class="ms-3 "><i class="fas fa-user-edit"></i></a>
                                        <form style="display: inline-block" method="POST"
                                            action="{{ route('view-messages.destroy',$message->id) }}">

                                            <a  href="{{ route('view-messages.show', $message->id) }}">
                                              Show<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                                              </svg>
                                            </a>


                                          <!-- Delete button -->
                                          @csrf
                                          @method('DELETE')
  <!-- Button trigger modal -->
<button type="button" class="btn text-danger" data-toggle="modal" data-target="#exampleModal{{$message->id}}">
    <i class="far fa-trash-alt"></i>
  </button>

                                            <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$message->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Message</h5>
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
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
</div>
@endsection
