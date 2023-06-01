@section('aside')
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Unique Clothing Store</span></a>
            </div>

            <div class="clearfix"> </div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="{{url('public/uploads/users/'.Auth::user()->image)}}" class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>{{Auth::user()->username}}</h2>
                </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">

                    <ul class="nav side-menu">
                        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li><a><i class="fa fa-users"></i> Users</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('create_users')}}">Add Users</a></li>
                                <li><a href="{{route('users')}}">Show Users</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-lemon-o"></i> Logo</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-logo.create')}}">Add Logo</a></li>
                                <li><a href="{{route('admin-logo.index')}}">Show Logo</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-list-alt "></i> About Page</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-about.create')}}">Add About Page</a></li>
                                <li><a href="{{route('admin-about.index')}}">Show About Page</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-phone-square"></i> Contact</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-contact.create')}}">Add Contact Page</a></li>
                                <li><a href="{{route('admin-contact.index')}}">Show Contact Page</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-sliders"></i> Slider</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-slider.create')}}">Add Slider</a></li>
                                <li><a href="{{route('admin-slider.index')}}">Show Slider</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-file-picture-o"></i> Banner</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-banner.create')}}">Add Banner</a></li>
                                <li><a href="{{route('admin-banner.index')}}">Show Banner</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-book"></i> Category</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-category.create')}}">Add Category</a></li>
                                <li><a href="{{route('admin-category.index')}}">Show Category</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-product-hunt"></i> Product</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-product.create')}}">Add Product</a></li>
                                <li><a href="{{route('admin-product.index')}}">Show Product</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-product-hunt"></i> Discount Header</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-discount.create')}}">Add Discount Header</a></li>
                                <li><a href="{{route('admin-discount.index')}}">Show Discount Header</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-product-hunt"></i> Product On Discount</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-product-discount.create')}}">Add Product On Discount</a></li>
                                <li><a href="{{route('admin-product-discount.index')}}">Show Product On Discount</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-product-hunt"></i> Product On Offer</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-product-offer.create')}}">Add Product On Offer</a></li>
                                <li><a href="{{route('admin-product-offer.index')}}">Show Product On Offer</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-paw"></i> Footer(terms & condition)</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-footer.create')}}">Add Footer</a></li>
                                <li><a href="{{route('admin-footer.index')}}">Show Footer</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-registered"></i> Customer</a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('customer')}}">Customer Register</a></li>
                                <li><a href="{{route('customer_contact')}}">Customer Contact</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
            <!-- /menu footer buttons -->
        </div>
    </div>
@endsection
