@extends('admindashboard.layouts.master')
@section('content')



    <div class="card  w-25" style="width: 15rem; margin:auto;margin-top:200px ">
           <div class="card-body">
          {{-- <h5 class="card-title">movie name</h5> --}}
          <h4 class="card-text text-center">Show Complaints</h4>
        </div>


        <ul class="list-group list-group-flush">

          <li class="list-group-item"><b>name :{{$message->name }}</b></li>
          <li class="list-group-item"><b>email :{{$message->email }}</b></li>
          <li class="list-group-item">subject :{{$message->subject }}</li>
          <li class="list-group-item">message <br>{{$message->message }}</li>
          {{-- <li class="list-group-item">A third item</li> --}}
        </ul>

      </div>





@endsection
