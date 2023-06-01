@extends('frontend.master.master')
@section('content')
    <div class="container-fluid login">
        <div class="row">
            <div class="title-c"><p><a href="{{route('index')}}">Home /</a> Customer Login</p></div>
        </div>
        <div class="row">
            <div class="col-md-4 login_content">
                @include('backend.layouts.message')
                <h3><i class="fa fa-sign-in"></i>&ensp;&ensp;Customer Login</h3>
                <form action="{{route('customer_login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email <span>*</span>
                            <a style="color: red">{{$errors->first('email')}}</a>
                        </label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span>*</span>
                            <a style="color: red">{{$errors->first('password')}}</a>
                        </label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary" >Login</button>
                    </div>
                    <a href="{{route('customer_password_reset')}}"><p>Forgot Password</p></a>
                    <p>Don't have account?<a href="{{route('customer_register')}}">&ensp;Register</a></p>
                </form>
            </div>
        </div>
    </div>
@endsection
