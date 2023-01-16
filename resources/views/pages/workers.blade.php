@extends('pages.layout.master')


@section('content')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-1 text-white animated slideInDown">Workers</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Testimonial</li>
            </ol>
        </nav>
    </div>
</div>

<br><br>
<div class="container-xxl py-5">
    <div class="container pt-5">
        <div class="row g-4">
            @foreach ($workers as $worker)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                    <div class="fact-icon">
                        <img class="rounded-circle" src="/images/{{$worker->image}}" width="200px" height="200px" alt="Icon">
                    </div>
                    <h3 class="mb-3">{{ $worker->name }}</h3>

                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                  <br>


    {{-- <img src="/images/{{$worker->image}}" width="20px" height="20px" title={{$worker->name}}> --}}



<br><br>
                   <a href="{{ route('workers.show', $worker->id) }}"><button class="btn btn-primary">  View profile</button></a>
                </div>
            </div>@endforeach

        </div>
    </div>
</div>
<!-- Facts End -->






@endsection
