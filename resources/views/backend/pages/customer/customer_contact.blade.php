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
                            <h2> <i CLASS="fa fa-users"></i>  Customer Contact List</h2>
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
                                            <th>Name</th>
                                            <th>Company Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Details</th>
{{--                                            <th>Action</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customerContact as $key=>$customerInfo)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$customerInfo->name}}</td>
                                                <td>{{$customerInfo->company}}</td>
                                                <td>{{$customerInfo->email}}</td>
                                                <td>{{$customerInfo->phone}}</td>
                                                <td>{{$customerInfo->details}}</td>
{{--                                                <td>--}}
{{--                                                    <a href="{{route('edit_users').'/'.$user->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>--}}
{{--                                                    <a href="{{route('delete_users').'/'.$user->id}}" class="btn btn-danger" ><i class="fa fa-trash"></i></a>--}}
{{--                                                </td>--}}

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

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

