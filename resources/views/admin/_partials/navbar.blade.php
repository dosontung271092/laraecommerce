<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
       

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/admin/dashboard')}}">
                    <span data-feather="home" class="align-text-bottom"></span> {{ __('labels.dashboard') }}
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>{{ __('labels.product') }}</span>
            <a class="link-secondary" href="{{url('/admin/product/create')}}" aria-label="Add a new product">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
        </h6>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/category')}}">
                    <span data-feather="layers" class="align-text-bottom"></span> {{ __('labels.category') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/brand')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    {{ __('labels.brand') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/product')}}">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    {{ __('labels.product') }}
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>{{ __('labels.post') }}</span>
            <a class="link-secondary" href="{{url('/admin/post/create')}}" aria-label="Add a new post">
                <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
        </h6>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/taxonomy')}}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    {{ __('labels.taxonomy') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/post')}}">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    {{ __('labels.post') }}
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>{{ __('labels.configuration') }}</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/slider')}}">
            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
            Slider
            </a>
            </li>
            
        </ul>
    </div>
</nav>