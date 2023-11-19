<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PemasokController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    // Route Login
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'prosesLogin'])->name('prosesLogin');
});

Route::middleware('auth')->group(function () {
    // Route Dashboard
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Route Pemasok
    Route::prefix('/pemasok')->controller(PemasokController::class)->group(function () {
        Route::get('/', 'halamanUtamaPemasok')->name('halamanUtamaPemasok');
        Route::get('/tambah', 'halamanTambahPemasok')->name('halamanTambahPemasok');
        Route::post('/tambah', 'prosesTambahPemasok')->name('prosesTambahPemasok');
        Route::get('/ubah/{id}', 'halamanUbahPemasok')->name('halamanUbahPemasok');
        Route::put('/ubah/{id}', 'prosesUbahPemasok')->name('prosesUbahPemasok');
        Route::get('/hapus/{id}', 'prosesHapusPemasok')->name('prosesHapusPemasok');
    });

    // Route Barang
    Route::prefix('/barang')->controller(BarangController::class)->group(function () {
        Route::get('/', 'halamanUtamaBarang')->name('halamanUtamaBarang');
        Route::get('/tambah', 'halamanTambahBarang')->name('halamanTambahBarang');
        Route::post('/tambah', 'prosesTambahBarang')->name('prosesTambahBarang');
        Route::get('/ubah/{id}', 'halamanUbahBarang')->name('halamanUbahBarang');
        Route::put('/ubah/{id}', 'prosesUbahBarang')->name('prosesUbahBarang');
        Route::get('/hapus/{id}', 'prosesHapusBarang')->name('prosesHapusBarang');
    });

    // Route Barang Masuk
    Route::prefix('/barang-masuk')->controller(BarangMasukController::class)->group(function () {
        Route::get('/', 'halamanUtamaBarangMasuk')->name('halamanUtamaBarangMasuk');
        Route::get('/tambah', 'halamanTambahBarangMasuk')->name('halamanTambahBarangMasuk');
        Route::post('/tambah', 'prosesTambahBarangMasuk')->name('prosesTambahBarangMasuk');
        Route::get('/ubah/{id}', 'halamanUbahBarangMasuk')->name('halamanUbahBarangMasuk');
        Route::put('/ubah/{id}', 'prosesUbahBarangMasuk')->name('prosesUbahBarangMasuk');
        Route::get('/hapus/{id}', 'prosesHapusBarangMasuk')->name('prosesHapusBarangMasuk');
    });

    // Route Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
