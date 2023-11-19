<?php

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

    // Route Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
