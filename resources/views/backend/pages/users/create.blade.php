@extends('backend.master.master')
@section('content')





    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">



            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> <i class="fa fa-plus">&ensp;</i>Add Users</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('backend.layouts.message')
                                </div>
                                <div class="col-md-12">
                                    <form action="{{route('create_users')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name:
                                                        <a style="color: red;"> {{$errors->first('name')}}</a>
                                                    </label>
                                                    <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Username:
                                                        <a style="color: red;"> {{$errors->first('username')}}</a>
                                                    </label>
                                                    <input type="text" name="username" id="username" value="{{old('username')}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:
                                                <a style="color: red;"> {{$errors->first('email')}}</a>
                                            </label>
                                            <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password:
                                                <a style="color: red;"> {{$errors->first('password')}}</a>
                                            </label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm password:
                                                <a style="color: red;"> {{$errors->first('password_confirmation')}}</a>
                                            </label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image:
                                                <a style="color: red;"> {{$errors->first('image')}}</a>
                                            </label><br>
                                            <input type="file" name="image" id="image" class="btn btn-default">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender:
                                                <a style="color: red;"> {{$errors->first('gender')}}</a>
                                            </label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="" readonly>--Select Gender--</option>
                                                <option value="male" {{old('gender')=='male'?'selected':''}}>Male</option>
                                                <option value="female" {{old('gender')=='female'?'selected':''}}>Female</option>
                                                <option value="others" {{old('gender')=='others'?'selected':''}}>others</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="usertype">User Type:
                                                <a style="color: red;"> {{$errors->first('usertype')}}</a>
                                            </label>
                                            <select name="usertype" id="usertype" class="form-control">
                                                <option value="" readonly>--Select User--</option>
                                                <option value="admin" {{old('usertype')=='admin'?'selected':''}}>Admin</option>
                                                <option value="user" {{old('usertype')=='user'?'selected':''}}>User</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary">Add New User</button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


@endsection



