
@extends('frontend.master.master')
@section('content')
    <!-- ======================main====================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="title-c"><p><a href="{{route('index')}}">Home /</a> About Us</p></div>
        </div>
        <div class="row">
         @foreach($aboutData as $about)
            <div class="col-md-12 main-page-a">
                <img src="{{asset('uploads/about/'.$about->image)}}" alt="">
                <div class="title">About Us</div>
                  <div class="us">
                      <p>{!!$about->description!!}</p>
            </div>
            @endforeach
        </div>
    </div>c
@endsection
