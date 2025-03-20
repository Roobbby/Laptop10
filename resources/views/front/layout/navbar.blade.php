<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="front/assets/images/logo.svg" alt="Mooli"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <div class="d-lg-none d-flex justify-content-between px-4 py-3 align-items-center">
                <img src="" class="logo-mobile-menu" alt="logo">
                <a href="javascript:;" class="close-menu"><i class="mdi mdi-close"></i></a>
            </div>
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('products') ? 'active' : '' }}" href="{{ route('products') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('recomendation') ? 'active' : '' }}" href="{{ route('recomendation') }}">Rekomendasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="{{ route('login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

