<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StokBarangController;
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

    // Route Profile
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'prosesUbahProfile'])->name('prosesUbahProfile');

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
        Route::get('/generate-kode-barang', 'generateKodeBarang')->name('generateKodeBarang');
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

    // Route Barang Keluar
    Route::prefix('/barang-keluar')->controller(BarangKeluarController::class)->group(function () {
        Route::get('/', 'halamanUtamaBarangKeluar')->name('halamanUtamaBarangKeluar');
        Route::get('/tambah', 'halamanTambahBarangKeluar')->name('halamanTambahBarangKeluar');
        Route::post('/tambah', 'prosesTambahBarangKeluar')->name('prosesTambahBarangKeluar');
        Route::get('/ubah/{id}', 'halamanUbahBarangKeluar')->name('halamanUbahBarangKeluar');
        Route::put('/ubah/{id}', 'prosesUbahBarangKeluar')->name('prosesUbahBarangKeluar');
        Route::get('/hapus/{id}', 'prosesHapusBarangKeluar')->name('prosesHapusBarangKeluar');
    });

    // Route Stok Barang
    Route::prefix('/stok-barang')->controller(StokBarangController::class)->group(function () {
        Route::get('/', 'halamanUtamaStokBarang')->name('halamanUtamaStokBarang');
        Route::get('/tambah', 'halamanTambahStokBarang')->name('halamanTambahStokBarang');
        Route::post('/tambah', 'prosesTambahStokBarang')->name('prosesTambahStokBarang');
        Route::get('/ubah/{id}', 'halamanUbahStokBarang')->name('halamanUbahStokBarang');
        Route::put('/ubah/{id}', 'prosesUbahStokBarang')->name('prosesUbahStokBarang');
        Route::get('/hapus/{id}', 'prosesHapusStokBarang')->name('prosesHapusStokBarang');
    });

    // Route Laporan
    Route::prefix('/laporan')->controller(LaporanController::class)->group(function () {
        Route::get('/', 'halamanUtamaLaporan')->name('halamanUtamaLaporan');

        Route::get('/preview/barang-masuk', 'previewBarangMasuk')->name('previewBarangMasuk');
        Route::get('/cetak/barang-masuk', 'cetakBarangMasuk')->name('cetakBarangMasuk');

        Route::get('/preview/barang-keluar', 'previewBarangKeluar')->name('previewBarangKeluar');
        Route::get('/cetak/barang-keluar', 'cetakBarangKeluar')->name('cetakBarangKeluar');

        Route::get('/preview/barang', 'previewBarang')->name('previewBarang');
        Route::get('/cetak/barang', 'cetakBarang')->name('cetakBarang');

        Route::get('/preview/pemasok', 'previewPemasok')->name('previewPemasok');
        Route::get('/cetak/pemasok', 'cetakPemasok')->name('cetakPemasok');

        Route::get('/preview/stokBarang', 'previewStokBarang')->name('previewStokBarang');
        Route::get('/cetak/stokBarang', 'cetakStokBarang')->name('cetakStokBarang');
    });

    // Route Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
