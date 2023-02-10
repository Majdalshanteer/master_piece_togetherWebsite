@extends('pages.layout.master')


@section('content')
    <!DOCTYPE html>
    <div class="container">
        <div class="main-body">
            <br>
            <br>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif



            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="/images/{{ $worker->image }}" alt="Admin" class="rounded-circle"
                                    style="height: 200px" width="200">
                                <div class="mt-3">
                                    <h4>{{ $worker->name }}</h4>
                                    @for ($i = 1; $i <= $average; $i++)
                                        <span class="text-primary"><i class="fa fa-star text-warning "></i></span>
                                    @endfor
                                    <br>

                                    | {{ round($average, 2) }} |




                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- rating section --}}

                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">

                            @if (Auth::check())
                            @else
                                <div style=" text-align:left" class="alert alert-danger alert-dismissible fade show"
                                    role="alert">
                                    <strong>Please Login!</strong> to rate a worker.

                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                        href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                                </div>
                            @endif

                            <form class="" method="POST"
                                action="{{ route('Rating', ['worker_id' => $worker['id']]) }}">
                                <input type="hidden" value="{{ $worker->id }}" name="worker_id">

                                @csrf
                                @if (Auth::check())
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                @endif
                                {{-- <input type="number" value="{{ 1 }}" name="rate"> --}}
                                <div class="card-body">
                                    <div id="stars_rating">
                                        {{-- <p class="heading">Please rate me</p> --}}
                                        <br>
                                        <p class="rates">
                                            <span class="avg" hidden> </span>
                                            Please rate me|
                                            Your Rating:<span class="rate"> </span>

                                        </p>
                                        <div class="stars">
                                            <div class="star">★</div>
                                            <div class="star">★</div>
                                            <div class="star">★</div>
                                            <div class="star">★</div>
                                            <div class="star">★</div>
                                        </div>

                                        <br>
                                        <div class="search-container">
                                            <textarea type="text" placeholder="Type your comment ..." id="movie-name" name="comment" required></textarea>

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


                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $worker->name }} </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $worker->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $worker->phone }}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Services</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @foreach ($worker->serviceSection as $service)
                                        {{ $service->service->service_name }},
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
                                    <h6 class="d-flex align-items-center mb-3"><i
                                            class="material-icons text-info mr-2">Som</i>e of my works</h6>





                                    <section id="gallery">
                                        <div class="container">
                                            <div id="image-gallery">
                                                <div class="row">

                                                    @foreach ($workSamples as $workSample)
                                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                                            <div class="img-wrapper">
                                                                <a href="/sampleImages1/{{ $workSample->image1 }}"><img
                                                                        src="/sampleImages1/{{ $workSample->image1 }}"
                                                                        class="img-responsive"style="height:200px"></a>
                                                                <div class="img-overlay">
                                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                                            <div class="img-wrapper">
                                                                <a href="/sampleImages2/{{ $workSample->image2 }}"><img
                                                                        src="/sampleImages2/{{ $workSample->image2 }}"
                                                                        class="img-responsive"style="height:200px"></a>
                                                                <div class="img-overlay">
                                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                                            <div class="img-wrapper">
                                                                <a href="/sampleImages3/{{ $workSample->image3 }}"><img
                                                                        src="/sampleImages3/{{ $workSample->image3 }}"
                                                                        class="img-responsive"style="height:200px"></a>
                                                                <div class="img-overlay">
                                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                                            <div class="img-wrapper">
                                                                <a href="/sampleImages4/{{ $workSample->image4 }}"><img
                                                                        src="/sampleImages4/{{ $workSample->image4 }}"
                                                                        class="img-responsive"style="height:200px"></a>
                                                                <div class="img-overlay">
                                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach


                                                </div><!-- End row -->
                                            </div><!-- End image gallery -->
                                        </div><!-- End container -->
                                    </section>








                                </div>
                            </div>
                        </div>





                    </div>





                    <div class="col-sm-12 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i
                                        class="material-icons text-info mr-2">Rev</i> iews</h6>


                                @foreach ($comments as $comment)
                                    <div class="verified_customer_section">
                                        <div class="image_review">
                                            <div class="customer_image">
                                                <img src="/images/{{ $comment->user->image }}" alt="customer image">
                                            </div>

                                            <div class="customer_name_review_status">
                                                <div class="customer_name">{{ $comment->user->name }}
                                                </div>
                                                <div class="customer_review">
                                                    @for ($i = 1; $i <= $comment->rate; $i++)
                                                        <span><i class="fa fa-star text-warning"></i></span>
                                                    @endfor
                                                </div>
                                                <div class="customer_status">
                                                    <div class="customer_bage"> <img
                                                            src="https://cdn.shopify.com/s/files/1/0566/8241/4246/t/11/assets/icon-verified-1662629893290.png?v=1662629894"
                                                            alt=""> </div>
                                                    <div class="customer_status_content">{{ $comment->user->updated_at }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <hr>
                                        <div class="customer_comment">{{ $comment->comment }}</div>
                                        @if (Auth::check())
                                            @if (Auth::user()->id == $comment->user->id)
                                                <form style="display: inline-block" method="POST"
                                                    action="{{ route('workers.destroy', $comment->id) }}">
                                                    <button type="button" class="btn text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $comment->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>

                                                    <!-- Delete button -->
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- Button trigger modal -->


                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $comment->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Delete Comment</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                    <br>
                                    {{-- @endforeach   --}}
                                @endforeach
                            </div>
                            <div class="row mx-2">
                                <div class="col-sm-12 d-md-flex   justify-content-md-end">

                                    {{ $comments->links() }} </div>
                            </div>

                        </div>
                    </div>





                </div>
            </div>

        </div>
    </div>
@endsection
