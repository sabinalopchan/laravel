
@extends('frontend.master.master')
@section('content')
    <div class="container ad">
        <div class="image-container">
            <div class="big-image">
                <img src="{{url('public/uploads/productDiscount/'.$productDiscountDetails->image)}}" alt="" id="zoom">
            </div>
            <div class="small-image">
                <img src="{{url('public/uploads/productDiscount/'.$productDiscountDetails->image1)}}" alt="" class="ima">
                <img src="{{url('public/uploads/productDiscount/'.$productDiscountDetails->image2)}}" alt="">
                <img src="{{url('public/uploads/productDiscount/'.$productDiscountDetails->image3)}}" alt="">
            </div>
        </div>
        <div class="content">
            <h1>{{$productDiscountDetails->title}}</h1>
            <p>{!! $productDiscountDetails->description !!}</p>
            <div class="price">{{$productDiscountDetails->price}}</div>
        </div>
    </div>
@endsection
