
@extends('frontend.master.master')
@section('content')
<div class="container ad">
    <div class="image-container">
        <div class="big-image">
            <img src="{{asset('uploads/product/'.$productDetails->image)}}" alt="" id="zoom">
        </div>
        <div class="small-image">
            <img src="{{asset('uploads/product/'.$productDetails->image1)}}" alt="" class="ima">
            <img src="{{asset('uploads/product/'.$productDetails->image2)}}" alt="">
            <img src="{{asset('uploads/product/'.$productDetails->image3)}}" alt="">
        </div>
    </div>
    <div class="content">
        <h1>{{$productDetails->title}}</h1>
       <p>{!! $productDetails->description !!}</p>
        <div class="price-outter">
        <div class="price">{{$productDetails->price}}</div>
        </div>
{{--        <a href="#"><button class="btn-product">Add to cart <i class="fa fa-shopping-cart"></i></button></a>--}}
{{--        <span class="label label-success"><i class="fa fa-eye"></i>   Page Visit:  {{$productDetails->page_visit}}</span>--}}

    </div>
</div>
@endsection
