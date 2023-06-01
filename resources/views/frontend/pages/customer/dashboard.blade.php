
@extends('frontend.master.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="title-c"><p><a href="{{route('index')}}">Home /</a>  Dashboard</p></div>
        </div>
    <div class="container">
        <div class="dashboard_wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 my-account1">
                    <h4 style="color: rgb(248, 98, 98)">My Account</h4>
                </div>
                <hr>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <aside class="dashboard_sidebar">
                        <ul class="active_menu">
                            <li><a href="{{route('customer_dashboard')}}" ><i class="fa fa-dashboard"></i>&ensp;Dashboard </a></li>
                        </ul>
                    </aside>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-9">
                    Hello  <br>
                    Welcome you are logged in as member <br>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
