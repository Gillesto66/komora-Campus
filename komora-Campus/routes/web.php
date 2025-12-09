<?php

use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminFiliereController;
use App\Http\Controllers\Admin\AdminNiveauController;
use App\Http\Controllers\Admin\AdminMatiereController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DownloadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;






Route::get('/download/file/{product}', [DownloadController::class, 'download'])->name('download.file');

Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/panier', [CartController::class, 'view'])->name('cart.view');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('Kkiapay/callback', [CartController::class, 'kkiapayCallback'])->name('kkiapay.callback');

Route::post('/cart/save-customer', [CartController::class, 'saveCustomer'])->name('cart.save-customer');

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/produit/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/catalogue', [ProductController::class, 'showFilter'])->name('catalogue');

Route::get('/niveaux/{filiereId}', [ProductController::class, 'getNiveaux']);
Route::get('/matieres/{niveauId}', [ProductController::class, 'getMatieres']);
Route::get('/products/filter', [ProductController::class, 'filter']);

Route::get('/download', [DownloadController::class, 'index'])->name('download.index')->middleware('auth');
Route::get('/download/guest/{token}', [DownloadController::class, 'guest'])->name('download.guest');
Route::post('/download/set-password/{order}', [DownloadController::class, 'setPassword'])->name('download.set_password');
Route::get('/download/signed/{product}', [DownloadController::class, 'generateSignedUrl'])->name('download.signed');
Route::get('/download/file/{product}', [DownloadController::class, 'download'])->name('download.file');

// Auth
Route::get('/login', [UserController::class, 'showAuth'])->name('auth');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Dashboards protégés par garde + middleware personnalisé
Route::middleware('auth:user')->group(function () {
    Route::get('/dashboard/admin', [UserController::class, 'showAdmin'])->name('dashboard.admin');
    Route::resource('products', AdminProductController::class)->except(['show']);
    Route::resource('filieres', AdminFiliereController::class)->except(['show']);
    Route::resource('niveaux', AdminNiveauController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);

    Route::resource('matieres', AdminMatiereController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);

    // Route AJAX pour charger les niveaux par filière
    Route::get('filieres/{filiere_id}/niveaux', [AdminMatiereController::class, 'niveauxByFiliere'])
         ->name('admin.filieres.niveaux');


});

Route::middleware('auth:affilier')->group(function () {
    Route::get('/dashboard/affilier', [UserController::class, 'showAffilier'])->name('dashboard.affilier');
});

Route::middleware('auth:user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'showUser'])->name('dashboard.user');
});
