<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olympus</title>
    <link rel="stylesheet" href="/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/css/reset.css">
    <link rel="stylesheet" href="/assets/css/base.css">
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/home/slider-section.css">
    <link rel="stylesheet" href="/assets/css/home/banner-section.css">
    <link rel="stylesheet" href="/assets/css/product-section.css">
    <link rel="stylesheet" href="/assets/css/home/brand-section.css">
    <link rel="stylesheet" href="/assets/css/home/post-section.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/modal.css">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <div class="wrapper">        
        @include('public._partials.header')
        @yield('content')
        @include('public._partials.footer')
        @include('public._partials.modal')
    </div>
    <script src="/assets/js/swiper-bundle.min.js"></script>
    <script src="/assets/js/swiper-config.js"></script>
    <script src="/assets/js/modal.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html>
        
