@include('frontend.layouts.header')
@if(Request::segment(1) != 'login' && Request::segment(1) != 'register')
@include('frontend.layouts.nav')
@endif
@include('frontend.layouts.message')
@yield('content')
@include('frontend.layouts.footer')