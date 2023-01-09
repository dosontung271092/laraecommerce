<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>OLYMPUS</title>

    <link href="{{ asset('img/logos/logo-removebg.png') }}" rel="icon" >
    <link href="{{ asset('/assets/css/swiper-bundle.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('/assets/css/reset.css') }}" rel="stylesheet" >
    <link href="{{ asset('/assets/css/base.css') }}" rel="stylesheet" >
    <link href="{{ asset('/assets/css/header.css') }}" rel="stylesheet" >
    <link href="{{ asset('/assets/css/home/slider-section.css') }}" rel="stylesheet" >
    <link href="{{ asset('/assets/css/home/banner-section.css') }}" rel="stylesheet" >
    <link href="{{ asset('/assets/css/product-section.css') }}" rel="stylesheet" >
    <link href="{{ asset('/assets/css/home/brand-section.css') }}" rel="stylesheet" >
    <link href="{{ asset('/assets/css/home/post-section.css') }}" rel="stylesheet" >
    <link href="{{ asset('/assets/css/footer.css') }}" rel="stylesheet" >
    <link href="{{ asset('/assets/css/modal.css') }}" rel="stylesheet" >
    <link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet" >
    <link href="{{ asset('/assets/css/auth.css') }}" rel="stylesheet" >
    @yield('style')
</head>
<body>
    <div class="wrapper">        
        @include('public._partials.header')
        @yield('content')
        @include('public._partials.footer')
        @include('public._partials.modal')
        @yield('modal')
    </div>
    <script src="{{ asset('/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/swiper-config.js') }}"></script>
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    @yield('script')
</body>
</html>
        
