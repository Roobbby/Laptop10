@extends('back.layout.index')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Tambah Produk')
@section('content')
<div id="main-content">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Form Tambah Data Produk</h2>
                    <h2>Silahkan isikan data dibawah ini <b>jangan sampai ada yang terlewat</b></h2>
                </div>
                <div class="body">
                    <form id="laptop-form" method="POST" action="{{ route('product.update', $product->id) }}"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('put')

                        <!-- Radio untuk menentukan Laptop Baru atau Bekas -->
                        <div class="form-group c_form_group">
                            <h6>Kondisi Laptop</h6>
                            <div>
                                <h6>
                                    <input type="radio" name="condition" value="0" {{ $product->condition == 0 ? 'checked' : '' }} required>
                                    Baru
                                </h6>
                                <h6>
                                    <input type="radio" name="condition" value="1" {{ $product->condition == 1 ? 'checked' : '' }} required>
                                    Bekas
                                </h6>
                            </div>
                        </div>

                        <!-- Nama Laptop -->
                        <div class="form-group ">
                            <h6 for="namaLaptop">Nama Laptop</h6>
                            <input type="text" id="namaLaptop" name="namaLaptop" class="form-control" value="{{ $product->name }}" required>
                        </div>

                        <!-- Processor -->
                        <div class="form-group ">
                            <h6 for="processor">Processor</h6>
                            <input type="text" id="processor" name="processor" class="form-control" value="{{ $product->processor }}" required>
                        </div>

                        <!-- Memory -->
                        <div class="form-group">
                            <h6>Kapasitas Memori</h6>
                            <div style="display: flex; align-items: center;">
                                <input type="number" name="memory_capacity" class="form-control" min="1" required style="width: 100px;" value="{{ $product->memory_capacity }}">
                                <span style="margin-left: 10px; font-size: 15px;">GB</span>
                            </div>
                        </div>
                        <!-- Jenis Memori -->
                        <div class="form-group">
                            <h6>Jenis Memori</h6>
                            <select name="memory_type" class="form-control" required>
                                <option value="DDR3" {{ $product->memory_type == 'DDR3' ? 'selected' : '' }}>DDR3</option>
                                <option value="DDR3L" {{ $product->memory_type == 'DDR3L' ? 'selected' : '' }}>DDR3L</option>
                                <option value="DDR4" {{ $product->memory_type == 'DDR4' ? 'selected' : '' }}>DDR4</option>
                                <option value="DDR5" {{ $product->memory_type == 'DDR5' ? 'selected' : '' }}>DDR5</option>
                            </select>
                        </div>
                        <!-- Penyimpanan Utama -->
                        <div class="form-group">
                            <h6>Penyimpanan Utama</h6>
                            <label>Kapasitas Penyimpanan Utama</label>
                            <div style="display: flex; align-items: center;">
                                <input type="number" name="storage_capacity" class="form-control" min="1" required style="width: 100px;" value="{{ $product->storage_capacity }}">
                                <span style="margin-left: 10px; font-size: 15px;">GB</span>
                            </div>

                            <label>Jenis Penyimpanan Utama</label>
                            <select name="storage_type" class="form-control" required>
                                <option value="SSD" {{ $product->storage_type == 'SSD' ? 'selected' : '' }}>SSD</option>
                                <option value="HDD" {{ $product->storage_type == 'HDD' ? 'selected' : '' }}>HDD</option>
                            </select>
                        </div>


                        <!-- VGA (Checkbox dan Input Dinamis) -->
                        <div class="form-group">
                            <h6>
                                <input type="checkbox" id="hasVGA" name="hasVGA" {{ !empty($product->vga) ? 'checked' : '' }}>
                                Laptop memiliki VGA ?
                            </h6>
                            <div id="vgaInput" style="{{ !empty($product->vga) ? 'display: block;' : 'display: none;' }}; margin-top: 10px;">
                                <h6>Nama VGA Extrenal</h6>
                                <input type="text" name="vga" class="form-control" value="{{ $product->vga }}">
                            </div>
                        </div>

                        <!-- Ukuran Layar -->
                        <div class="form-group">
                            <h6>Ukuran Layar</h6>
                            <div style="display: flex; align-items: center;">
                                <input type="text" name="screenSize" class="form-control" style="width: 100px;" required value="{{ $product->screen_size }}">
                                <span style="margin-left: 10px; font-size: 15px;">inch</span>
                            </div>
                        </div>


                        <!-- Daya Tahan Baterai -->
                        <div class="form-group">
                            <h6>Daya Tahan Baterai</h6>
                            <div style="display: flex; align-items: center;">
                                <input type="text" name="batteryLife" class="form-control" style="width: 100px;" required value="{{ $product->battery_life }}">
                                <span style="margin-left: 10px; font-size: 15px;">jam</span>
                            </div>
                        </div>

                        <!-- Include Items -->
                        <div class="form-group c_form_group">
                            <h6>Include</h6>
                            @php
                            $includes = json_decode($product->includes, true);
                            @endphp

                            <div>
                                <h6>
                                    <input type="checkbox" name="include[]" value="Tas"
                                        {{ in_array("Tas", $includes ?? []) ? 'checked' : '' }}>
                                    Tas
                                </h6>
                                <h6>
                                    <input type="checkbox" name="include[]" value="Box"
                                        {{ in_array("Box", $includes ?? []) ? 'checked' : '' }}>
                                    Box
                                </h6>
                                <h6>
                                    <input type="checkbox" name="include[]" value="Charger"
                                        {{ in_array("Charger", $includes ?? []) ? 'checked' : '' }}>
                                    Charger
                                </h6>
                            </div>
                        </div>



                        <!-- Deskripsi -->
                        <div class="form-group">
                            <h6>Deskripsi</h6>
                            <textarea name="description" class="form-control" rows="5" cols="30" required>{{ $product->description }}</textarea>
                        </div>

                        <!-- Gambar -->
                        <div class="form-group">
                            <div class="mb-3">
                                <h6>Gambar saat ini:</h6>
                                <img src="{{ asset($product->image ? $product->image : 'front/assets/images/default-product.png') }}"
                                    alt="{{ $product->name }}"
                                    class="img-fluid"
                                    style="height:200px; object-fit:cover; border-radius: 10px;">

                            </div>
                            <h6>Gambar</h6>
                            <input type="file" name="image" class="dropify" data-height="300">
                        </div>


                        <div class="form-group">
                            <h6>Harga</h6>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Masukkan harga" required value="{{ number_format($product->price, 0, ',', '.') }}">
                        </div>


                        <!-- Tombol Submit -->
                        <br>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary theme-bg gradient">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hasVGA = document.getElementById('hasVGA');
        const vgaInput = document.getElementById('vgaInput');

        // Event Listener untuk checkbox VGA
        hasVGA.addEventListener('change', function() {
            if (hasVGA.checked) {
                vgaInput.style.display = 'block';
            } else {
                vgaInput.style.display = 'none';
            }
        });
    });
    // JavaScript untuk Toggle Penyimpanan Tambahan
    document.getElementById('enable_additional_storage').addEventListener('change', function() {
        const additionalStorageForm = document.getElementById('additional_storage_form');
        if (this.checked) {
            additionalStorageForm.style.display = 'block';
            document.getElementById('additional_storage_capacity').required = true;
            document.getElementById('additional_storage_type').required = true;
        } else {
            additionalStorageForm.style.display = 'none';
            document.getElementById('additional_storage_capacity').required = false;
            document.getElementById('additional_storage_type').required = false;
        }
    });
    document.getElementById('price').addEventListener('input', function(e) {
        let priceInput = document.getElementById('price');

        priceInput.addEventListener('input', function (e) {
            let value = this.value.replace(/\D/g, ''); // Hanya angka yang diperbolehkan

            if (value) {
                this.value = parseInt(value, 10).toLocaleString('id-ID');
            } else {
                this.value = '';
            }
        });
    });

    document.getElementById('laptop-form').addEventListener('submit', function() {
        let priceInput = document.getElementById('price');
        priceInput.value = priceInput.value.replace(/\./g, '');
    });
</script>

@endsection
