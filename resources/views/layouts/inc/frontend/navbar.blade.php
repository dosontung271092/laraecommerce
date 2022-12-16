<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar py-3 ps-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-5 col-md-2 my-auto d-md-block d-lg-block">
                    <img class="ms-md-3" src="{{ asset('admin/images/just-logo.jpg') }}" alt="logo" width="35" /> 
                    <span class="header__logo-text">OLYMPUS</span>
                </div>
                <div class="col-7 col-md-5 my-auto">
                    <form role="search" class="header__search-form">
                        <div class="input-group">
                            <input type="search" placeholder="Tìm kiếm sản phẩm" class="form-control header__search-form-input" />
                            <button class="btn bg-white header__search-form-btn" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections') }}">Danh mục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections/thuc-pham-danh-cho-tre-em') }}">Sản phẩm cho trẻ em</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections/thuc-pham-tang-cuong-suc-khoe') }}">Sản phẩm tăng cường sức khỏe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections/thuc-pham-cho-nguoi-gia') }}">Sản phẩm cho người già</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections/thuc-pham-lam-dep') }}">Sản phẩm làm đẹp</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>