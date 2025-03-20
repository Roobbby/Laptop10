@extends('front.layout.index')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Halaman Produk')
@section('content')

    <section class="pricing-list" id="plans">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="font-weight-medium text-dark">Laptop yang Kami jual</h4>
                    <h6 class="text-dark"></h6>
                </div>
            </div>

            <div class="row">
                @if ($products->isEmpty())
                    <p>Tidak ada data</p>
                @else
                    @foreach ($products as $product)
                        <div class="col-sm-4 mb-4">
                            <div class="pricing-box">
                                <img src="{{ asset($product->image ?? 'front/assets/images/default-product.png') }}"
                                    alt="{{ $product->name }}" class="img-fluid" style="height:200px; object-fit:cover;">
                                <h6 class="font-weight-medium title-text">{{ $product->name }}</h6>
                                <h3 class="text-amount mb-4 mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                                <ul class="pricing-list">
                                    <li><strong>Processor:</strong> {{ $product->processor }}</li>
                                    <li><strong>RAM:</strong> {{ $product->memory_capacity }} GB {{ $product->memory_type }}
                                    </li>
                                    <li><strong>Storage:</strong> {{ $product->storage_capacity }} GB
                                        ({{ $product->storage_type }})
                                    </li>
                                    <li><strong>Screen:</strong> {{ $product->screen_size }} inch</li>
                                    <li><strong>Battery Life:</strong> {{ $product->battery_life }} hours</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
