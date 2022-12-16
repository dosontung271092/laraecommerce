<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.104.2">
      <title>Laravel ecommerce</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="apple-touch-icon" href="{{ asset('/img/favicons/apple-touch-icon.png') }}"  sizes="180x180">
      <link rel="icon" href="{{ asset('/img/favicons/favicon-32x32.png') }}"  sizes="32x32" type="image/png">
      <link rel="icon" href="{{ asset('/img/favicons/favicon-16x16.png') }}"  sizes="16x16" type="image/png">
      <link rel="mask-icon" href="{{ asset('/img/favicons/safari-pinned-tab.svg') }}"  color="#712cf9">
      <link rel="icon" href="{{ asset('/img/favicons/favicon.ico') }}" >
      <meta name="theme-color" content="#712cf9">
      <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
      <link href="{{ asset('/css/app/app.css') }}" rel="stylesheet">
      @yield('style')
   </head>
   <body>
      @include('frontend._partials.header')
      @yield('content')
      @include('frontend._partials.footer')
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery-3.6.1.js') }}"></script>
      @yield('script')
   </body>
</html>