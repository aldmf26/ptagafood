<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AddKokiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProductController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // absen
    Route::controller(AbsenController::class)->group(function(){
        Route::get('/absen', 'index')->name('absen');
    });
    // add koki
    Route::controller(AddKokiController::class)->group(function(){
        Route::get('/addKoki', 'index')->name('addKoki');
    });


    // user
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::post('/users', 'create')->name('users.create');
        Route::get('/users/{id}', 'edit')->name('users.edit');
        Route::post('/users/update', 'update')->name('users.update');
        Route::get('/users/delete/{id}', 'delete')->name('users.delete');
    });

    // karyawan
    Route::controller(KaryawanController::class)->group(function () {
        Route::get('/karyawan', 'index')->name('karyawan');
        Route::post('/karyawan', 'create')->name('karyawan.create');
        Route::get('/karyawan/{id}', 'edit')->name('karyawan.edit');
        Route::post('/karyawan/update', 'update')->name('karyawan.update');
        Route::get('/karyawan/delete/{id}', 'delete')->name('karyawan.delete');
        Route::get('/addPoint', 'point')->name('karyawan.point');
    });

    Route::get('/dashboard', function () {
        return view('administrator.dashboard.dashboard', ['title' => 'Administrator']);
    })->name('dashboard');

    Route::controller(ProductController::class)->group(function () {
        Route::get('/produk', [ProductController::class, 'index'])->name('produk');
        Route::post('/produk', [ProductController::class, 'store'])->name('produk');
        Route::get('/tambah_harga', [ProductController::class, 'tambah_harga'])->name('tambah_harga');
        Route::get('/tambah_resep', [ProductController::class, 'tambah_resep'])->name('tambah_resep');
    });
});

Route::get('/', function () {
    return view('auth_layouting.login');
});

Route::get('/w', function () {
    return view('theme.master', ['title' => 'Data User']);
});


require __DIR__ . '/auth.php';
