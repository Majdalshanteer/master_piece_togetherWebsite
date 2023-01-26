@extends('admindashboard.layouts.master')
@section('content')



<div class="col-md-4 offset-md-2 col-8 mt-5 " style="margin-left: 370px;" >
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Worker</h4>
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






        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" method="POST" action="{{ route('connectService.update', $userService->id) }}"
                    >
                    @csrf
                    @method('PUT')

                    <div class="form-body">
                        <div class="row">


<p>ssssssssssssssssssssssssssssss {{ $userService->user_id }}</p>

                            <div class="col-12">

                                    <div class="form-group mb-4">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">User</label>
                                        <select name="user_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect" >
                                            {{-- <option selected>Choose...</option> --}}
@foreach($workers as $worker)

                                            <option value="{{$worker->id}}">{{$worker->name}}</option>
@endforeach
                                        </select>
                                    </div>

                            </div>


                            <div class="col-12">

                                    <div class="form-group mb-4">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Service</label>
                                        <select name="service_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect" >
                                            {{-- <option selected>Choose...</option> --}}

                                            @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->service_name}}</option>

@endforeach
                                        </select>
                                    </div>

                            </div>








 </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
