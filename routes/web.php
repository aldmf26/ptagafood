<?php

use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    // user
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::post('/users', 'create')->name('users.create');
        Route::get('/users/{id}', 'edit')->name('users.edit');
        Route::post('/users/update', 'update')->name('users.update');
        Route::get('/users/delete/{id}', 'delete')->name('users.delete');
    });

    // user
    Route::controller(KaryawanController::class)->group(function () {
        Route::get('/karyawan', 'index')->name('karyawan');
        Route::post('/karyawan', 'create')->name('karyawan.create');
        Route::get('/karyawan/{id}', 'edit')->name('karyawan.edit');
        Route::post('/karyawan/update', 'update')->name('karyawan.update');
        Route::get('/karyawan/delete/{id}', 'delete')->name('karyawan.delete');
    });

    Route::get('/dashboard', function () {
        return view('administrator.dashboard.dashboard', ['title' => 'Administrator']);
    })->name('dashboard');

    Route::get('/produk', [ProductController::class, 'index'])->name('produk');
});

Route::get('/', function () {
    return view('auth_layouting.login');
});

Route::get('/w', function () {
    return view('theme.master', ['title' => 'Data User']);
});


require __DIR__ . '/auth.php';
