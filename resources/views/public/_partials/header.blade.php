<div class="container">
    <header class="blog-header py-4">
        <div class="row d-md-flex justify-content-between align-items-center">
            <div class="col-5 d-flex align-items-center ">
                <img src="{{ asset('img/logos/logo.jpg') }}" width="30">
                <div class="fs-5 ms-2 text-primary">OLYMPUS</div>
            </div>
            <div class="col-7">            
                <form class="d-flex w-100 border rounded" role="search" action="{{ url('search') }}">
                    <input class="form-control form-control-sm border-0" type="text" name="keyword" placeholder="Tìm kiếm sản phẩm" value="{{ !empty( $keyword ) ? $keyword : '' }}" aria-label=".form-control-sm example">
                    <button class="btn btn-sm" type="submit">
                        <a class="link-secondary" href="#" aria-label="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" role="img" viewBox="0 0 24 24">
                                <title>Search</title>
                                <circle cx="10.5" cy="10.5" r="7.5"/>
                                <path d="M21 21l-5.2-5.2"/>
                            </svg>
                        </a>
                    </button>
                </form>
            </div>
        </div>
    </header>
</div>