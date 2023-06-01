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
                            <h2><i class="fa fa-edit">&ensp;</i>Update Product On Discount</h2>
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
                                <div class="col-md-9">
                                    <form action="{{route('admin-product-discount.update',$productData->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="title">Title
                                                <a style="color: red;">{{$errors->first('title')}}</a>
                                            </label>
                                            <input type="text" value="{{$productData->title}}" name="title" id="title"  class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug
                                                <a style="color: red;">{{$errors->first('slug')}}</a>
                                            </label>
                                            <input type="text" name="slug" id="slug" class="form-control" value="{{$productData->slug}}">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="myDatepicker">Date
                                                        <a style="color: red;">{{$errors->first('date')}}</a>
                                                    </label>
                                                    <input type="date" name="date" id="myDatepicker" class="form-control" value="{{$productData->date}}" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price">Price
                                                        <a style="color: red;">{{$errors->first('price')}}</a>
                                                    </label>
                                                    <input type="text" id="price" name="price" class="form-control" value="{{$productData->price}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keywords">Meta keywords
                                                <a style="color: red;">{{$errors->first('meta_keywords')}}</a>
                                            </label><br>
                                            <input type="text" name="meta_keywords" value="{{$productData->meta_keywords}}"
                                                   id="meta_keywords" data-role="tagsinput" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="summary">Summary
                                                <a style="color: red;">{{$errors->first('summary')}}</a>
                                            </label>
                                            <textarea name="summary" id="summary" class="form-control" >
                                                {{$productData->summary}}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description
                                                <a style="color: red;">{{$errors->first('description')}}</a>
                                            </label>
                                            <textarea name="description" id="description" class="form-control" >
                                                {{$productData->description}}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image
                                                <a style="color: red;">{{$errors->first('image')}}</a>
                                            </label><br>
                                            <input type="file" name="image" id="image">
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="image1">Image1
                                                    <a style="color: red;">{{$errors->first('image1')}}</a>
                                                </label><br>
                                                <input type="file" name="image1" id="image1">
                                            </div>
                                            <div class="form-group">
                                                <label for="image2">Image2
                                                    <a style="color: red;">{{$errors->first('image2')}}</a>
                                                </label><br>
                                                <input type="file" name="image2" id="image2">
                                            </div>
                                            <div class="form-group">
                                                <label for="image3">Image3
                                                    <a style="color: red;">{{$errors->first('image3')}}</a>
                                                </label><br>
                                                <input type="file" name="image3" id="image3">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success">Edit Product</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <img src="{{url('public/uploads/productDiscount/'.$productData->image)}}" class="img-fluid img-thumbnail" alt=" >
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





