
@extends('frontend.master.master')
@section('content')
    <!-- ======================main====================== -->
    <div class="container-fluid">
        <div class="row">
         @foreach($footerData as $footer)
            <div class="col-md-12 main-page-a">
                <img src="{{url('public/uploads/footer/'.$footer->image)}}" alt="">
                <div class="title">Terms & Conditions</div>
                  <div class="us">
                      <p>{!!$footer->description!!}</p>
            </div>
            @endforeach
        </div>
    </div>
@endsection
