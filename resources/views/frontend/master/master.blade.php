
@include('frontend.layouts.header')
@include('frontend.layouts.footer')
@include ('frontend.layouts.top-header')
@include('frontend.layouts.logo-section')
@include('frontend.layouts.menu')

@yield('header')
@yield('top-header')
@yield('logo-section')
@yield('menu')
@yield('content')
@yield('footer')

