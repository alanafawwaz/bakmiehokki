<?php

use App\Http\Controllers\Admin\HadirController;
use App\Http\Controllers\Admin\IzinController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\ShiftController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pegawai\PegawaiHadirController;
use App\Http\Controllers\Pegawai\PegawaiIzinController;
use App\Http\Controllers\Pegawai\PegawaiShiftController;
use App\Http\Controllers\Pegawai\PegawaiStockController;
use App\Http\Controllers\Pegawai\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login']);
Route::get('/forgot', [AuthController::class, 'forgot']);
Route::post('/forgot', [AuthController::class, 'handleForgot']);
Route::get('/reset/{token}', [AuthController::class, 'reset']);
Route::post('/reset/{token}', [AuthController::class, 'handleReset']);

Route::middleware('login')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::middleware('admin')->group(function () {

        Route::prefix('/admin')->group(function () {

            Route::get('/stock', [StockController::class, 'index']);
            Route::get('/hadir', [HadirController::class, 'index']);
            Route::resource('/pegawai', PegawaiController::class);
            Route::resource('/shift', ShiftController::class)->except(['show']);
            Route::resource('/izin', IzinController::class)->only(['index', 'show']);
        });
    });

    Route::middleware('pegawai')->group(function () {

        Route::prefix('/pegawai')->group(function () {

            Route::get('/profile', [ProfileController::class, 'get'])->name('viewProfile');
            Route::post('/profile', [ProfileController::class, 'post'])->name('postProfile');

            Route::resource('/izin', PegawaiIzinController::class);
            Route::resource('/stock', PegawaiStockController::class);
            ROute::resource('/shift', PegawaiShiftController::class)->only(['index', 'show']);
            Route::get('/hadir', [PegawaiHadirController::class, 'create']);
            Route::resource('/hadir', PegawaiHadirController::class)->only(['store']);
        });
    });
});
