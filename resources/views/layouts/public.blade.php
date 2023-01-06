<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLYMPUS</title>
    <link rel="icon" href="{{ asset('img/logos/logo-removebg.png') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/home/slider-section.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/home/banner-section.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/product-section.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/home/brand-section.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/home/post-section.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/auth.css') }}">
    @yield('style')
    @livewireStyles
</head>
<body>
    <div class="wrapper">        
        @include('public._partials.header')
        @yield('content')
        @include('public._partials.footer')
        @include('public._partials.modal')
    </div>
    <script src="{{ asset('/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/swiper-config.js') }}"></script>
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    @livewireScripts
</body>
</html>
        
