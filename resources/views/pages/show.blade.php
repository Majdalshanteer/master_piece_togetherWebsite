@extends('pages.layout.master')


@section('content')
<!DOCTYPE html>


<div class="container">
    <div class="main-body">
<br>
<br>
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
          <!-- Breadcrumb -->
          {{-- <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav> --}}
          <!-- /Breadcrumb -->
{{-- @foreach($ratings as $rating)
             {{$rating->rate}}
@endforeach --}}
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="/images/{{$worker->image }}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{$worker->name }}</h4>
                      <p class="text-secondary mb-1">Worker Profile</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                      {{-- <button class="btn btn-primary">Rate me</button>
                      <button class="btn btn-outline-primary">Message</button> --}}
                    </div>
                  </div>
                </div>
              </div>


              {{-- rating section --}}

              <div class="card mt-3">
                <ul class="list-group list-group-flush">

                  @if (Auth::check())
                  @else
                  <div style=" text-align:left" class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Please Login!</strong> to rate a worker.

                      <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                          {{ __('Login') }}
                      </a>
                      {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                  @endif

                  <form class="" method="POST" action="{{ route('Rating', ['worker_id' => $worker['id']]) }}">
                 <input type="hidden" value="{{ $worker->id }}" name="worker_id">

                  @csrf
                  @if (Auth::check())
                  <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                  @endif
                  {{-- <input type="number" value="{{ 1 }}" name="rate"> --}}
                          <div class="card-body">
                            <div id="stars_rating">
                              <p class="heading">Please rate me</p>
                              <div class="stars" >
                                <div class="star" >★</div>
                                <div class="star" >★</div>
                                <div class="star">★</div>
                                <div class="star" >★</div>
                                <div class="star" >★</div>
                              </div>
                              <p class="rates">
                                <span class="avg" hidden> </span>
                                {{-- |  --}}
                                Your Rating:<span class="rate"> </span>

                              </p>
                              <br>
                              <div class="search-container">
                                <textarea
                                  type="text"
                                  placeholder="Type your comment ..."
                                  id="movie-name"
                                  cols="30"
                                  name="comment"
                                  required

                                ></textarea>

                              </div>

                              <input type="hidden" value="" name="rate" id="ratingNum">
                            </div>
                            {{-- <textarea type="text" placeholder="comment" name="comment" rows="2" cols="40" ></textarea> --}}
                          </div>
                          <div class="card-footer">
                            <p>
                                @if (Auth::check())
                                <button type="submit" class="btn btn-primary">Rate me</button>
                                @else
 <button type="submit" disabled class="btn btn-primary">Rate me</button>
 @endif
                              {{-- <div class="btn btn-sm btn-dark float-right" id="clear">Rate</div> --}}
                            </p>
                        </form>
                </ul>
              </div>
            </div>
            <div class="col-md-7">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$worker->name }}                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$worker->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$worker->phone }}
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Services</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      @foreach($worker->serviceSection as $service)
{{$service->service->name }}|
@endforeach
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      {{-- <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a> --}}
                    </div>
                  </div>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-12 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Rev</i> iews</h6>

                      @foreach($worker->ReviewData as $review)



                      <div class="verified_customer_section">
                          <div class="image_review">
                              <div class="customer_image">
                                  <img src="/images/{{$review->user->image}}" alt="customer image">
                             </div>

                              <div class="customer_name_review_status">
                                  <div class="customer_name">{{$review->user->name}}
  </div>
                                  <div class="customer_review">
                                      @for($i=1; $i<=$review->rate; $i++)
                                      <span><i class="fa fa-star text-warning"></i></span>
                                      @endfor
                                    </div>
                                  <div class="customer_status">
                                      <div class="customer_bage"> <img src="https://cdn.shopify.com/s/files/1/0566/8241/4246/t/11/assets/icon-verified-1662629893290.png?v=1662629894" alt=""> </div>
                                      <div class="customer_status_content">{{$review->user->updated_at}}</div>
                                  </div>

                              </div>
                          </div>

<hr>
                          <div class="customer_comment">{{$review->comment}}</div>

                      </div>
                      <br>
                      @endforeach
                    </div>
                  </div>
                </div>

              </div>



            </div>
          </div>

        </div>
    </div>
    {{-- @foreach($worker->ReviewData as $review)
    {{$review->rate}}
    {{$review->comment}}
@endforeach --}}
{{-- @foreach($rates as $rate)
@endforeach --}}
{{-- {{$rating->rate}} --}}





@endsection
