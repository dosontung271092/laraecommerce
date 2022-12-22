<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Do Son Tung">
      <meta name="generator" content="Hugo 0.104.2">
      <title>Dashboard Olympus</title>

      <!-- Favicons -->
      <link rel="icon" href="{{ asset('img/logos/logo-removebg.png') }}">

      <!-- Styles -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link href="{{ asset('/css/admin/dashboard.css') }}" rel="stylesheet">

      @livewireStyles
   </head>
   <body>
      <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
         <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">{{ __('labels.administration') }}</a>
         <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
         <div class="navbar-nav">
            <div class="nav-item text-nowrap">
              <a 
                class="nav-link px-3" 
                href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              >
                <i class="mdi mdi-logout text-primary"></i> {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
         </div>
      </header>
      <div class="container-fluid">
         <div class="row">
            @include('admin._partials.navbar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
              @include('admin._partials.message')
              @yield('content')
            </main>
         </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="{{ asset('assets/js/jquery-3.6.1.js') }}"></script>
      <script src="{{ asset('/js/admin/dashboard.js') }}"></script>

      @yield('scripts')
      @livewireScripts
      @stack('script')
   </body>
</html>