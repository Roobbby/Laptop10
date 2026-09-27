# Laptop10 (Laravel 10)

Dokumentasi ini disusun berdasarkan implementasi yang ada di codebase saat ini.

## Ringkasan Aplikasi

Aplikasi ini adalah web rekomendasi dan katalog laptop berbasis **Laravel 10**. Pengguna dapat melihat daftar produk dan meminta rekomendasi laptop berdasarkan kriteria sederhana (brand, ukuran layar, dan harga). Tersedia juga area backend untuk mengelola data produk (CRUD).

> Catatan: Branding yang muncul di tampilan adalah **"Rizky Comp"**, sementara `.env.example` masih menggunakan `APP_NAME=Laravel`.

## Fitur Utama

- Halaman beranda dengan ringkasan produk.
- Halaman daftar laptop (`/products`).
- Form rekomendasi laptop (`/recomendation`).
- Hasil rekomendasi laptop dengan perhitungan similarity (`/rekomendasi`, method GET).
- Halaman login admin (`/login`) dan submit login (`/loginprocess`).
- Dashboard backend (`/dashboard`).
- CRUD produk melalui resource route `/product`.
- Upload gambar produk ke `public/images`.

## Teknologi yang Digunakan

### Backend

- PHP `^8.1`
- Laravel Framework `^10.0`
- Laravel Sanctum `^3.2`
- Laravel Tinker `^2.8`
- Guzzle HTTP `^7.2`

### Frontend / Asset

- Vite `^4.0.0`
- laravel-vite-plugin `^0.7.2`
- Axios `^1.1.2`
- Template aset statis frontend: `public/front`
- Template aset statis backend: `public/back`

## Struktur Direktori Penting

```text
app/
  Http/Controllers/
    HomeController.php
    ProductController.php
  Models/
    Product.php
    User.php

database/
  migrations/
    2014_10_12_000000_create_users_table.php
  seeders/
    UserSeeder.php
    DatabaseSeeder.php

public/
  front/
  back/
  images/

resources/views/
  front/
  back/

routes/
  web.php
```

## Prasyarat

- PHP 8.1+
- Composer
- Node.js + npm
- Database MySQL/MariaDB

## Instalasi Lokal

```bash
git clone https://github.com/Roobbby/Laptop10.git
cd Laptop10

cp .env.example .env
composer install
php artisan key:generate

npm install
```

## Konfigurasi `.env`

Sesuaikan variabel database berikut di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=user_database
DB_PASSWORD=password_database
```

Opsional:

- Ubah `APP_NAME` bila ingin menyesuaikan nama aplikasi.
- Atur `APP_URL` sesuai host lokal Anda.

## Setup Database

Jalankan migrasi:

```bash
php artisan migrate
```

Jika ingin memakai seeder user admin bawaan:

```bash
php artisan db:seed --class=UserSeeder
```

### Catatan penting terkait skema database

- Pada repository ini hanya tersedia migration untuk tabel `users`.
- Model/controller menggunakan tabel `products`, namun migration tabel `products` **tidak ditemukan** di codebase saat ini.
- Sebelum fitur produk/rekomendasi dipakai, pastikan tabel `products` sudah dibuat sesuai field yang dipakai pada `ProductController` dan form backend.

## Menjalankan Aplikasi (Development)

Terminal 1 (Laravel server):

```bash
php artisan serve
```

Terminal 2 (Vite dev server):

```bash
npm run dev
```

## Build Production Frontend

```bash
npm run build
```

## Route & Alur Fitur Utama

Berikut route dari `routes/web.php`:

| Method | URI | Nama Route | Deskripsi |
|---|---|---|---|
| GET | `/` | `home` | Beranda + produk ringkas |
| GET | `/products` | `products` | Daftar laptop |
| GET | `/recomendation` | `recomendation` | Form input rekomendasi |
| GET | `/recomendation-result` | `resultrecomendation` | Halaman hasil rekomendasi (versi umum) |
| GET | `/rekomendasi` | `rekomendasi` | Proses filter & similarity, kirim 3 rekomendasi terbaik |
| GET | `/login` | `login` | Halaman login admin |
| POST | `/loginprocess` | `loginprocess` | Submit login |
| GET/POST/... | `/product` | `product.*` | CRUD produk (resource controller) |
| GET | `/dashboard` | `dashboard` | Dashboard backend |

## Informasi Login / Demo

Seeder `UserSeeder` menyediakan akun:

- **username**: `admin`
- **password**: `12345678`

Catatan implementasi saat ini:

- `DatabaseSeeder` belum memanggil `UserSeeder` secara otomatis.
- Method `loginprocess` belum melakukan validasi autentikasi terhadap database (saat ini langsung mengarahkan ke dashboard).

## Testing

Menjalankan test:

```bash
php artisan test
```

Catatan:

- Test bawaan (`tests/Feature/ExampleTest.php`) mengakses route `/`.
- Karena route `/` mengambil data `Product::all()`, test dapat gagal jika tabel `products` belum tersedia.

## Kontribusi

Kontribusi dipersilakan melalui pull request kecil dan terfokus:

1. Fork repository
2. Buat branch fitur/perbaikan
3. Commit perubahan
4. Buka pull request ke `master`

---

Jika ada bagian yang ingin dipastikan lebih lanjut (misalnya struktur pasti tabel `products`), silakan lengkapi migration terkait agar setup proyek dapat sepenuhnya reproducible.
