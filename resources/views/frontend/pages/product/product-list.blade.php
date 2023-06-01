
@extends('frontend.master.master')
@section('content')
    <!-- ======================main====================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 main-page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 left-page">
                          <ul>Related Category
                                @foreach($categoryData as $category)
                                  <li><i class="fa fa-square-o"></i>&ensp;<a href="{{$category->slug}}">{{$category->title}}</a></li>
                              @endforeach
                          </ul>


                        </div>
                        <div class="col-md-9 right-page">
                            <div class="row">
                                <div class="col-md-12 right-page-header">
                                    <p>{{$categorySingleData->title}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 right-page-main ">
                                    @foreach($categorySingleData->getProductByCategoryModel as $product)
                                    <div class="col-md-4 a-box">

                                            <div class="a-sub-box1">
                                                <a href="{{route('product-details').'/'.$product->slug}}"><img src="{{asset('uploads/product/'.$product->image)}}" alt=""> </a>
                                                <a href="{{route('product-details').'/'.$product->slug}}"><p>{{$product->title}}</p> </a>
                                                <h4>  {{$product->price}}</h4>
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
    </div>
@endsection
