<div class="container">
    <header class="blog-header lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-6 d-flex align-items-center">
            <img src="{{ asset('img/logos/logo.jpg') }}" width="30">
            <span class="fs-2 ms-2 text-primary">Olympus</span>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center">
            <!-- <a class="link-secondary" href="#" aria-label="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
                <title>Search</title>
                <circle cx="10.5" cy="10.5" r="7.5"/>
                <path d="M21 21l-5.2-5.2"/>
                </svg>
            </a> -->
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <!-- User is logging -->
                    @else
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endauth
                </div>
            @endif
            
        </div>
    </div>
    </header>
</div>