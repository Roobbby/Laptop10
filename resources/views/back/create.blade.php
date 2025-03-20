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
                        <form id="laptop-form" method="POST" action="{{ route('product.store') }}"
                            enctype="multipart/form-data" novalidate>
                            @csrf

                            <!-- Radio untuk menentukan Laptop Baru atau Bekas -->
                            <div class="form-group c_form_group">
                                <h6>Kondisi Laptop</h6>
                                <div>
                                    <h6>
                                        <input type="radio" name="condition" value="0" required>
                                        Baru
                                    </h6>
                                    <h6>
                                        <input type="radio" name="condition" value="1" required>
                                        Bekas
                                    </h6>
                                </div>
                            </div>

                            <!-- Nama Laptop -->
                            <div class="form-group ">
                                <h6 for="namaLaptop">Nama Laptop</h6>
                                <input type="text" id="namaLaptop" name="namaLaptop" class="form-control" required>
                            </div>

                            <!-- Processor -->
                            <div class="form-group ">
                                <h6 for="processor">Processor</h6>
                                <input type="text" id="processor" name="processor" class="form-control" required>
                            </div>

                            <!-- Memory -->
                            <div class="form-group">
                                <h6 for="memory_capacity">Kapasitas Memori</h6>
                                <div style="display: flex; align-items: center;">
                                    <input type="number" id="memory_capacity" name="memory_capacity" class="form-control"
                                        min="1" required style="width: 100px;">
                                    <span style="margin-left: 10px; font-size: 15px;">GB</span>
                                </div>
                            </div>
                            <!-- Jenis Memori -->
                            <div class="form-group">
                                <h6 for="memory_type">Jenis Memori</h6>
                                <select id="memory_type" name="memory_type" class="form-control" required>
                                    <option value="DDR3">DDR3</option>
                                    <option value="DDR3L">DDR3L</option>
                                    <option value="DDR4">DDR4</option>
                                    <option value="DDR5">DDR5</option>
                                </select>
                            </div>
                            <!-- Penyimpanan Utama -->
                            <div class="form-group">
                                <h6>Penyimpanan Utama</h6>
                                <label for="storage_capacity">Kapasitas Penyimpanan Utama</label>
                                <div style="display: flex; align-items: center;">
                                    <input type="number" id="storage_capacity" name="storage_capacity" class="form-control"
                                        min="1" required style="width: 100px;">
                                    <span style="margin-left: 10px; font-size: 15px;">GB</span>
                                </div>

                                <label for="storage_type">Jenis Penyimpanan Utama</label>
                                <select id="storage_type" name="storage_type" class="form-control" required>
                                    <option value="SSD">SSD</option>
                                    <option value="HDD">HDD</option>
                                </select>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" id="enable_additional_storage" class="form-check-input">
                                <label for="enable_additional_storage" class="form-check-label">Tambahkan Penyimpanan
                                    Tambahan</label>
                            </div>

                            <!-- Penyimpanan Tambahan (Disembunyikan Secara Default) -->
                            <div id="additional_storage_form" style="display: none; margin-top: 15px;">
                                <div class="form-group">
                                    <label for="additional_storage_capacity">Kapasitas Tambahan</label>
                                    <div style="display: flex; align-items: center;">
                                        <input type="number" id="additional_storage_capacity"
                                            name="additional_storage_capacity" class="form-control" min="1"
                                            style="width: 100px;">
                                        <span style="margin-left: 10px; font-size: 15px;">GB</span>
                                    </div>

                                    <label for="additional_storage_type">Jenis Penyimpanan Tambahan</label>
                                    <select id="additional_storage_type" name="additional_storage_type"
                                        class="form-control">
                                        <option value="" selected>Pilih Jenis</option>
                                        <option value="SSD">SSD</option>
                                        <option value="HDD">HDD</option>
                                    </select>
                                </div>
                            </div>

                            <!-- VGA (Checkbox dan Input Dinamis) -->
                            <div class="form-group ">
                                <h6>
                                    <input type="checkbox" id="hasVGA" name="hasVGA">
                                    Laptop memiliki VGA ?
                                </h6>
                                <div id="vgaInput" style="display: none; margin-top: 10px;">
                                    <h6 for="vga">Nama VGA Extrenal</h6>
                                    <input type="text" id="vga" name="vga" class="form-control">
                                </div>
                            </div>

                            <!-- Ukuran Layar -->
                            <div class="form-group ">
                                <h6 for="screenSize">Ukuran Layar</h6>
                                <div style="display: flex; align-items: center;">
                                    <input type="text" id="screenSize" name="screenSize" class="form-control"
                                        style="width: 100px;" required>
                                    <span style="margin-left: 10px; font-size: 15px;">inch</span>
                                </div>
                            </div>

                            <!-- Daya Tahan Baterai -->
                            <div class="form-group">
                                <h6 for="batteryLife">Daya Tahan Baterai</h6>
                                <div style="display: flex; align-items: center;">
                                    <input type="text" id="batteryLife" name="batteryLife" class="form-control"
                                        style="width: 100px;" required>
                                    <span style="margin-left: 10px; font-size: 15px;">jam</span>
                                </div>
                            </div>

                            <!-- Include Items -->
                            <div class="form-group c_form_group">
                                <h6>Include</h6>
                                <div>
                                    <h6>
                                        <input type="checkbox" name="include[]" value="Tas"> Tas
                                    </h6>
                                    <h6>
                                        <input type="checkbox" name="include[]" value="Box"> Box
                                    </h6>
                                    <h6>
                                        <input type="checkbox" name="include[]" value="Charger"> Charger
                                    </h6>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="form-group c_form_group">
                                <h6 for="description">Deskripsi</h6>
                                <textarea id="description" name="description" class="form-control" rows="5" cols="30" required></textarea>
                            </div>

                            <!-- Gambar -->
                            <div class="form-group c_form_group">
                                <h6 for="image">Gambar</h6>
                                <input type="file" id="image" name="image" class="dropify" data-height="300">
                            </div>

                            <div class="form-group">
                                <h6 for="price">Harga</h6>
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Masukkan harga" required>
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
            let value = this.value.replace(/\./g, '');

            if (!/^\d*$/.test(value)) {
                return;
            }

            this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        });

        document.getElementById('laptop-form').addEventListener('submit', function() {
            let priceInput = document.getElementById('price');
            priceInput.value = priceInput.value.replace(/\./g, '');
        });
    </script>

@endsection
