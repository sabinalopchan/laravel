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
                            <h2><i class="fa fa-edit">&ensp;</i>Update Contact</h2>
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
                                    <form action="{{route('admin-contact.update',$contactData->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="name">Name
                                                <a style="color: red;">{{$errors->first('name')}}</a>
                                            </label><br>
                                            <input type="text" value="{{$contactData->name}}" name="name" id="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="location">Location
                                                <a style="color: red;">{{$errors->first('location')}}</a>
                                            </label><br>
                                            <input type="text" value="{{$contactData->location}}" name="location" id="location" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email
                                                <a style="color: red;">{{$errors->first('email')}}</a>
                                            </label><br>
                                            <input type="text" value="{{$contactData->email}}"  name="email" id="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="telephone">Phone No.
                                                <a style="color: red;">{{$errors->first('telephone')}}</a>
                                            </label><br>
                                            <input type="text" value="{{$contactData->telephone}}"  name="telephone" id="telephone" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile">Mobile No.
                                                <a style="color: red;">{{$errors->first('mobile')}}</a>
                                            </label><br>
                                            <input type="text" value="{{$contactData->mobile}}"  name="mobile" id="mobile" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success">Update Contact</button>
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



