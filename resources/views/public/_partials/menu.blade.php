
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="p-2 link-light text-decoration-none link-hover" href="{{ url('/') }}">Trang chủ</a></li>
                <li class="nav-item"><a class="p-2 link-light text-decoration-none link-hover" href="{{ url('/product-collection/') }}">Danh mục sản phẩm</a></li>
                <li class="nav-item"><a class="p-2 link-light text-decoration-none link-hover" href="{{ url('/post-collection/') }}">Danh mục bài viết</a></li>
                <li class="nav-item"><a class="p-2 link-light text-decoration-none link-hover" href="{{ url('/post-collection/gioi-thieu/ve-chung-toi') }}">Giới thiệu</a></li>
            </ul>
            <ul class="navbar-nav me-0">
                <li class="nav-item">
                    @if (Route::has('login'))
                        @auth
                            <!-- User is logging -->
                        @else
                            <a class="p-2 link-light text-decoration-none link-hover" href="{{ route('login') }}">{{ __('labels.login') }}</a>
                        @endauth
                    @endif    
                </li>
            </ul>
            
        </div>
    </div>
</nav>