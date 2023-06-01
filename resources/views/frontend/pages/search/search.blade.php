
@extends('frontend.master.master')
@section('content')
    <!-- ======================main====================== -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 header-cat">
                <div class="row">
                    <div class="col-md-4 title-cat">Searched Products</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 new-arraival">
                @foreach($products as $items)
                    <div class="box12">
                        <div class="sub-box12">
                            <a href="{{route('product-details').'/'.$items->slug}}"> <img src="{{asset('uploads/product/'.$items->image)}}" alt=""></a>
                            <a href="{{route('product-details').'/'.$items->slug}}"> <p>{{$items->title}}</p></a>
                            <h4>{{$items->price}}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
