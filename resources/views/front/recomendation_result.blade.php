@extends('front.layout.index')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Hasil Rekomendasi')
@section('content')

    <section class="our-projects" id="projects">
        <div class="container">
            <div class="row mb-5">
                <div class="col-sm-12">
                    <h3 class="font-weight-medium text-dark ">Hasil Rekomendasi</h3>
                    <h6>Berikut adalah laptop yang cocok berdasarkan kriteria yang Anda pilih:</h6>
                </div>
            </div>
            <div class="row">
                @if ($recommendedProducts->isEmpty())
                    <div class="col-sm-12 mb-3">
                        <b style="font-size: 20px;">Maaf, Tidak ada laptop yang sesuai dengan kriteria Anda.</b>
                        <br>
                        <a href="{{ route('recomendation') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                @else
                    @foreach ($recommendedProducts as $product)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <img src="{{ asset($product->image ?? 'front/assets/images/default-product.png') }}"
                                        alt="{{ $product->name }}" class="img-fluid"
                                        style="height:200px; object-fit:cover;">
                                    <h5 class="card-title">{{ $product->name }} </h5>
                                    <p class="card-text">
                                        <strong>Ukuran Layar:</strong> {{ $product->screen_size }} Inch<br>
                                        <strong>Harga:</strong> Rp{{ number_format($product->price, 0, ',', '.') }}<br>
                                        <strong>Prosesor:</strong> {{ $product->processor }}<br>
                                        <strong>RAM:</strong> {{ $product->memory_capacity }} GB<br>
                                        <strong>Storage:</strong> {{ $product->storage_capacity }}<br>
                                        <strong>Grafis:</strong>
                                        @if (!empty($product->vga))
                                            {{ $product->vga }}
                                        @else
                                            VGA Dedicated
                                        @endif <br>
                                        <strong>Perhitungan Rekomendasi:</strong><br>
                                        <strong>Similarity Score :{{ number_format($product->similarity * 100, 2) }}%</strong><br>
                                        <br>
                                        <strong>Deskripsi :</strong>
                                        <br>
                                        <p >{!! nl2br(e($product->description)) !!}</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
