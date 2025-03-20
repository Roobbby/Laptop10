@extends('front.layout.index')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Landing Page')
@section('content')
<div class="page-body-wrapper">
    <section id="home" class="home">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-banner">
                        <div class="bnr-text">
                            <div class="banner-title">
                                <h5>Website Rekomendasi</h5>
                            </div>
                            <p class="mt-3">
                                Website ini dapat digunakan untuk memberikan rekomendasi laptop
                                <br>
                                yang sesuai dengan keinginan Anda
                            </p>
                            <a href="{{ route('recomendation') }}" class="btn btn-secondary mt-3">Halaman
                                Rekomendasi</a>
                        </div>
                        <div class="bnr-img">
                            <img src="front/assets/images/rizky.png" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our-projects" id="projects">
        <div class="container">
            <div class="row mb-5">
                <div class="col-sm-12">
                    <div class="d-sm-flex justify-content-between align-items-center mb-2">
                        <h3 class="font-weight-medium text-dark">Produk-Produk Tersedia</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <div class="owl-carousel-projects owl-carousel owl-theme">
                @if ($products->isEmpty())
                <p>Tidak ada data</p>
                @else
                @foreach ($products as $product)
                <div class="item">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($product->image ?? 'front/assets/images/default-product.png') }}"
                            class="card-img-top" alt="{{ $product->name }}"
                            style="height:200px; object-fit:cover;">

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">
                                <strong>Prosesor:</strong> {{ $product->processor }}<br>
                                <strong>RAM:</strong> {{ $product->memory_capacity }} GB
                                {{ $product->memory_type }}<br>
                                <strong>Penyimpanan:</strong> {{ $product->storage_capacity }} GB
                                ({{ $product->storage_type }})<br>
                                <strong>Layar:</strong> {{ $product->screen_size }} inch<br>
                                <strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                            <!-- <a href="#" class="btn btn-primary">Detail</a> -->
                        </div>
                    </div>
                </div>

                @endforeach
                @endif
            </div>
        </div>
    </section>
</div>
@endsection
