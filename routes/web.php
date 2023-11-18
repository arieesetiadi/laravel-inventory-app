<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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

    // Route Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
