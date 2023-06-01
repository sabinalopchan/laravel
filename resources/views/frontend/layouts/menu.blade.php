@section('menu')

    <!-- =========================menu======================== -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-0 menu">
                <div class="col-lg-4 col-md-4 col-sm-1 cat-menu">
                    <ul>
                        <li class="cat-item"><a href=""><i class="fa fa-align-justify"></i>Categories</a>
                            <ul>
                                @foreach($categoryData as $category)
                                <li><a href="{{('category').'/'.$category->slug}}">{{$category->title}} <span class="pull-right"><i class="fa fa-angle-right"></i></span></a>
                                @endforeach
                                </li>

                            </ul>
                        </li>
                    </ul>

                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 main-menu">
                    <ul>
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                        <li><a href="{{route('customer_login')}}">Customer Login</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
