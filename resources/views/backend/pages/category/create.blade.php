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
                            <h2><i class="fa fa-plus">&ensp;</i>Add Category</h2>
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
                                    <form action="{{route('admin-category.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title">Title
                                                <a style="color: red;">{{$errors->first('title')}}</a>
                                            </label>
                                            <input type="text" name="title" id="title"  class="form-control" {{old('title')}}>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug
                                                <a style="color: red;">{{$errors->first('slug')}}</a>
                                            </label>
                                            <input type="text" name="slug" id="slug" class="form-control" {{old('slug')}}>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="myDatepicker">Date
                                                        <a style="color: red;">{{$errors->first('date')}}</a>
                                                    </label>
                                                    <input type="date" name="date" id="myDatepicker" class="form-control" {{old('date')}} >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status
                                                        <a style="color: red;">{{$errors->first('status')}}</a>
                                                    </label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="" readonly="">--Select Status</option>
                                                        <option value="1"{{old('status')=='1' ? 'selected' : ''}}>Public</option>
                                                        <option value="0"{{old('status')=='0' ? 'selected' : ''}}>Draft</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keywords">Meta keywords
                                                <a style="color: red;">{{$errors->first('meta_keywords')}}</a>
                                            </label><br>
                                            <input type="text" name="meta_keywords" value="{{old('meta_keywords','education,sports,technology')}}"
                                                   id="meta_keywords" data-role="tagsinput" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="education,sports,technology">Meta Description
                                                <a style="color: red;">{{$errors->first('meta_description')}}</a>
                                            </label>
                                            <textarea name="meta_description" id="meta_description" class="form-control" {{old('education,sports,technology')}}>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="summary">Summary
                                                <a style="color: red;">{{$errors->first('summary')}}</a>
                                            </label>
                                            <textarea name="summary" id="summary" class="form-control" {{old('summary')}}>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description
                                                <a style="color: red;">{{$errors->first('description')}}</a>
                                            </label>
                                            <textarea name="description" id="description" class="form-control" {{old('description')}}>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image
                                                <a style="color: red;">{{$errors->first('image')}}</a>
                                            </label><br>
                                            <input type="file" name="image" id="image">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success">Add Category</button>
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



