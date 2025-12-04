<?php

use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminProductController;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/produit/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/catalogue', [ProductController::class, 'showFilter'])->name('catalogue');

Route::get('/niveaux/{filiereId}', [ProductController::class, 'getNiveaux']);
Route::get('/matieres/{niveauId}', [ProductController::class, 'getMatieres']);
Route::get('/products/filter', [ProductController::class, 'filter']);

// Pages publiques
Route::view('/', 'auth.login')->name('home');
Route::view('/register', 'auth.register')->name('register');

// Auth
Route::post('/register', [UserController::class, 'register'])->name('register.store');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Dashboards protégés par garde + middleware personnalisé
Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard/admin', [UserController::class, 'showAdmin'])->name('dashboard.admin');
    Route::resource('products', AdminProductController::class)->except(['show']);
});

Route::middleware('auth:affilier')->group(function () {
    Route::get('/dashboard/affilier', [UserController::class, 'showAffilier'])->name('dashboard.affilier');
});

Route::middleware('auth:user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'showUser'])->name('dashboard.user');
});