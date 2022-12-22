<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Do Son Tung">
      <meta name="generator" content="Hugo 0.104.2">
      <title>Olympus</title>

      <link rel="icon" href="{{ asset('img/logos/logo-removebg.png') }}">
      <!-- Styles -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link href="{{ asset('/css/auth/signin.css') }}" rel="stylesheet">
   </head>
   <body class="text-center">
      <main class="form-signin w-100 m-auto">
         <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">{{ __('Login') }}</h1>
            <div class="form-floating">
               <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required id="floatingInput" placeholder="name@example.com">
               <label for="floatingInput">Email address</label>
               @error('email')
               <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-floating">
               <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required id="floatingPassword" placeholder="Password">
               <label for="floatingPassword">Password</label>
               @error('password')
               <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="checkbox mb-3">
               <label>
               <input type="checkbox" value="remember-me"> Remember me
               </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">© 2022 - 2025</p>
         </form>
      </main>
   </body>
</html>