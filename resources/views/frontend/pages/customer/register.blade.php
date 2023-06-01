@extends('frontend.master.master')
@section('content')
    <div class="container-fluid register">
        <div class="row">
            <div class="col-md-6 register-content">
                @include('backend.layouts.message')
                <h3><i class="fa fa-registered"></i>&ensp;  Register Now </h3>
                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                            <div class="form-group">
                                <label for="firstname">First Name <span>*</span>
                                    <a style="color: red;"> {{$errors->first('firstname')}}</a>
                                </label>
                                <input type="text" name="firstname" id="firstname" value="{{old('firstname')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name <span>*</span>
                                    <a style="color: red;"> {{$errors->first('lastname')}}</a>
                                </label>
                                <input type="text" name="lastname" id="lastname" value="{{old('lastname')}}" class="form-control">
                            </div>
                    <div class="form-group">
                        <label for="email">Email <span>*</span>
                            <a style="color: red;"> {{$errors->first('email')}}</a>
                        </label>
                        <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span>*</span>
                            <a style="color: red;"> {{$errors->first('password')}}</a>
                        </label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm password<span>*</span>
                            <a style="color: red;"> {{$errors->first('password_confirmation')}}</a>
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Register</button>
                    </div>
                    <p>Already have an account? <a href="{{route('customer_login')}}">Login</a></p>


                </form>
            </div>
        </div>
    </div>
@endsection
