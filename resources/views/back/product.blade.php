@extends('back.layout.index')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Halaman Produk')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <!-- Page header section  -->
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        @include('back.alert')
                        <h1>List Data Produk</h1>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="mb-2">
                                    <a href="{{ route('product.create') }}" class="btn btn-primary theme-bg gradient btn-round">Tambah Data</a>
                                </div>
                            </div>
                            <ul class="header-dropdown dropdown">
                                <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Kondisi</th>
                                            <th>Processor</th>
                                            <th>Memory</th>
                                            <th>Ukuran Layar</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $index => $product)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->condition == 0 ? 'Baru' : 'Bekas' }}</td>
                                                <td>{{ $product->processor }}</td>
                                                <td>{{ $product->memory_capacity }} GB</td>
                                                <td>{{ $product->screen_size }} inch</td>
                                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                                <td>
                                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

