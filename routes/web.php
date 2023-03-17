<?php

use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    // user
    Route::controller(UserController::class)->group(function () {
        Route::name('users.')->group(function () {
            Route::get('/users', 'index')->name('index');
            Route::post('/users', 'create')->name('create');
        });
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
