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
                            <h2><i class="fa fa-eye">&ensp;</i>Show Contact</h2>
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
                                            <th>Location</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Mobile No.</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contactData as $key=>$contact)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$contact->name}}</td>
                                                <td>{{$contact->location}}</td>
                                                <td>{{$contact->email}}</td>
                                                <td>{{$contact->telephone}}</td>
                                                <td>{{$contact->mobile}}</td>


                                                <td>
                                                <form action="{{route('admin-contact.destroy',$contact->id)}}"method="post">
                                                    {{csrf_field()}}
                                                    @method('delete')
                                                        <a href="{{route('admin-contact.edit',$contact->id)}}" class="btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
                                                    <button class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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




