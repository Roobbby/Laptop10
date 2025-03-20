<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/recomendation', [HomeController::class, 'recomendation'])->name('recomendation');
Route::get('/recomendation-result', [HomeController::class, 'resultrecomendation'])->name('resultrecomendation');

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/loginprocess', [HomeController::class, 'loginprocess'])->name('loginprocess');

Route::resource('product', ProductController::class);
Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');
Route::get('/rekomendasi', [ProductController::class, 'rekomendasi'])->name('rekomendasi');
