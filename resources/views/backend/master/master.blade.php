@include('backend.layouts.header')
@include('backend.layouts.footer')
@include('backend.layouts.top-header')
@include('backend.layouts.aside')


@yield('header')
@yield('top-header')
@yield('aside')
@yield('content')
@yield('footer')

