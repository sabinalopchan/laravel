
@section('logo-section')
    <!--======================logo-section==================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 logo-section">
                <div class="container">
                    <div class="row">
                        @foreach($logoData as $logo)
                            <div class="col-lg-2 col-md-2 col-sm-2 logo">
                                <img src="{{url('public/uploads/logo/'.$logo->image)}}" alt="">
                            </div>
                        @endforeach
                        <div class="col-lg-2 col-md-2 col-sm-2"></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 search_item">
                            <form action="/search">
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9" style="padding-right: 0;">
                                        <input type="search" name="query" id="search_str" class="search" placeholder="Search products" >
                                    </div>
                                    <div class="search-icon">
                                        <button class="btn btn-primary search-icon"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
