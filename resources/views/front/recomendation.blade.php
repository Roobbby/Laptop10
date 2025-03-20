@extends('front.layout.index')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Halaman Rekomendasi')
@section('content')
<section class="contactus" id="contact">
    <div class="container">
        <div class="row mb-5 pb-5">
            <div class="col-sm-7">
                <h3 class="font-weight-medium mt-5 mt-lg-0">Form Rekomendasi Laptop</h3>
                <h6 class="mb-5">Isi informasi di bawah ini untuk mendapatkan rekomendasi laptop yang sesuai dengan kebutuhan Anda.</h6>
                <form action="{{ route('rekomendasi') }}" method="GET">
                    <div class="row">
                        <!-- Nama Brand Laptop -->
                        <div class="col-sm-12 mb-3">
                            <label for="brand">Nama Brand Laptop (Opsional)</label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: Asus, HP, Lenovo" required>
                            </div>
                        </div>

                        <!-- Ukuran Layar Laptop -->
                        <div class="col-sm-12 mb-3">
                            <label for="screen_size">Ukuran Layar Laptop yang Dibutuhkan</label>
                            <div class="form-group">
                                <select name="screen_size" id="screen_size" class="form-control" required>
                                    <option value="" selected disabled>Pilih Ukuran Layar</option>
                                    <option value="12">12 Inch</option>
                                    <option value="13">13 Inch</option>
                                    <option value="14">14 Inch</option>
                                    <option value="15">15 Inch</option>
                                    <option value="17">17 Inch</option>
                                </select>
                            </div>
                        </div>

                        <!-- Harga Laptop -->
                        <div class="col-sm-12 mb-3">
                            <label for="price">Harga Laptop yang Ditentukan</label>
                            <div class="form-group">
                                <input type="text" name="price" class="form-control" id="price" placeholder="Masukkan Harga" required>
                            </div>
                        </div>

                        <!-- Tombol Rekomendasikan -->
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-secondary">Rekomendasikan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section></section>
<section></section>
<section></section>
<script>
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
