
@extends('frontend.master.master')
@section('content')
    <div class="container ad">
        <div class="image-container">
            <div class="big-image">
                <img src="{{url('public/uploads/productOffer/'.$productOfferDetails->image)}}" alt="" id="zoom">
            </div>
            <div class="small-image">
                <img src="{{url('public/frontend-ui/assets/image/b.jpg')}}" alt="" class="ima">
                <img src="{{url('public/frontend-ui/assets/image/c.jpg')}}" alt="">
                <img src="{{url('public/frontend-ui/assets/image/d.jpg')}}" alt="">
            </div>
        </div>
        <div class="content">
            <h1 class="title-p">{{$productOfferDetails->title}}</h1>
            <p>{!! $productOfferDetails->description !!}</p>
            <div class="price">{{$productOfferDetails->price}}</div>

        </div>
    </div>
@endsection
