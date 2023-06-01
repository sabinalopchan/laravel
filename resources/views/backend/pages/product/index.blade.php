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
                            <h2><i class="fa fa-eye">&ensp;</i>Show Product</h2>
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
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Category_Id</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Image1</th>
                                            <th>Image2</th>
                                            <th>Image3</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($productData as $key=>$product)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$product->category_id}}</td>
                                                <td>{{$product->title}}</td>
                                                <td>{{$product->date}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>
                                                    <img src="{{url('public/uploads/product/'.$product->image)}}"
                                                         width="40" alt="">
                                                </td>
                                                <td>
                                                    <img src="{{url('public/uploads/product/'.$product->image1)}}"
                                                         width="40" alt="">
                                                </td>
                                                <td>
                                                    <img src="{{url('public/uploads/product/'.$product->image2)}}"
                                                         width="40" alt="">
                                                </td>
                                                <td>
                                                    <img src="{{url('public/uploads/product/'.$product->image3)}}"
                                                         width="40" alt="">
                                                </td>
                                                <td>
                                                    <form action="{{route('admin-product.destroy',$product->id)}}"method="post">
                                                        {{csrf_field()}}
                                                        @method('delete')
                                                        <a href="{{route('admin-product.edit',$product->id)}}" class="btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
                                                        <button class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$productData->links()}}
                                    <hr>

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




