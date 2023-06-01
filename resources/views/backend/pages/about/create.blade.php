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
                            <h2><i class="fa fa-plus">&ensp;</i>Add About Page</h2>
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
                                    <form action="{{route('admin-about.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="image">Image
                                                <a style="color: red;">{{$errors->first('image')}}</a>
                                            </label><br>
                                            <input type="file" name="image" id="image">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description
                                                <a style="color: red;">{{$errors->first('description')}}</a>
                                            </label>
                                            <textarea name="description" id="description" class="form-control" {{old('description')}}>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success">Add About Us</button>
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



