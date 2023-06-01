@extends('frontend.master.master')
@section('content')
{{--    <img src="{{url('uploads/slider/'.$slider->image)}}">--}}

<!-- Start slider -->

<section id="aa-slider">
    <div class="aa-slider-area">
        <div id="sequence" class="seq">
            <div class="seq-screen">
                <ul class="seq-canvas">
                    <!-- single slide item -->
                    @foreach($sliderData as $slider)
                        <li>
                            <div class="seq-model">
                                <img data-seq src="{{asset('uploads/slider/'.$slider->image)}}"  alt="" />
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- slider navigation btn -->
            <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
            </fieldset>
        </div>
    </div>
</section>
{{--    <!-- / slider -->--}}
    <!-- ====================Catagories====================== -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 header-cat">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-1 title-cat">Categories</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 abc">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 catagories">
                            @foreach($categoryData as $category)
                            <div class="box">
                                    <div class="sub-box">
                                        <a href="{{('category').'/'.$category->slug}}"><img src="{{asset('uploads/category/'.$category->image)}}" alt=> </a>
                                        <a href="{{('category').'/'.$category->slug}}"><p>{{$category->title}}</p></a>
                                    </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =====================new-arraival============================ -->
    <div class="container product">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 header-cat">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 title-cat">New Arrival</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 new-arrival">
                @foreach($latestProduct as $product)
                <div class="box12">
                        <div class="sub-box12">
                            <a href="{{route('product-details').'/'.$product->slug}}"> <img src="{{asset('uploads/product/'.$product->image)}}" alt=""></a>
                                <a href="{{route('product-details').'/'.$product->slug}}"> <p>{{$product->title}}</p></a>
                            <h4>{{$product->price}}</h4>
                        </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
    <!-- =====================Fashion Brands on Discounts=========================== -->
    <div class="container">
        <div class="row">
            @foreach($discount as $discountData)
            <div class="col-lg-12 col-md-12 col-sm-12 header-cat">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 title-cat">{{$discountData->title}}</div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 new-arraival">
                @foreach($productDiscountData as $product)
                <div class="box12">
                        <div class="sub-box12">
                            <a href="{{route('product-discount-details').'/'.$product->slug}}"><img src="{{url('public/uploads/productDiscount/'.$product->image)}}" alt=""></a>
                            <a href="{{route('product-discount-details').'/'.$product->slug}}"> <p>{{$product->title}}</p></a>
                            <h4>{{$product->price}}</h4>
                        </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    <!-- ===========================about======================= -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 as">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 add">
                            <div class="row ">
                                @foreach($productOnOffer as $offer)
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="col-lg-12 col-md-12 col-sm-12 add1">

                                            <div class="col-lg-12 col-md-12 col-sm-12 add2">
                                                <a href="{{route('product-offer-details').'/'.$offer->slug}}"> <p>{{$offer->title}}</a><br>{{$offer->price}}</p>
                                                    <a href="{{route('product-offer-details').'/'.$offer->slug}}"><img src="{{url('public/uploads/productOffer/'.$offer->image)}}" alt=""></a>
                                            </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ========================Trending======================= -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 header-cat">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 title-cat">Trending</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 new-arraival">
                @foreach($trendingProduct as $product)
                <div class="box12">
                        <div class="sub-box12">
                            <a href="{{route('product-details').'/'.$product->slug}}"> <img src="{{asset('uploads/product/'.$product->image)}}" alt=""></a>
                            <a href="{{route('product-details').'/'.$product->slug}}"><p>{{$product->title}}</p></a>
                            <h4>{{$product->price}}</h4>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- ================Banner================ -->
    <div class="container">
        <div class="row">
            @foreach($bannerData as $banner)
            <div class="col-lg-12 col-md-12 col-sm-12 banner3">
                <img src="{{url('public/uploads/banner/'.$banner->image)}}" alt="" class="banner-last">
            </div>
            @endforeach
        </div>
    </div>
<div class="container-fluid shipping-a">
    <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 shipping-title">
            <p>Shipping</p>
        </div>
            <div class="col-lg-12 col-md-12 col-sm-12 shipping">
                <img src="public/uploads/shipping.jpg" alt="">
            </div>
    </div>
    </div>
</div>

@endsection
