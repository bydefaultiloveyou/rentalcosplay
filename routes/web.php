<?php

use App\Http\Controllers\Dashboard\HomeController as DashboardHomeController;
use App\Http\Controllers\Dashboard\ProductController as DashboardProductController;
use App\Http\Controllers\Dashboard\RegisterController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\ProductController;
use App\Http\Controllers\Pages\SearchController;
use App\Http\Controllers\Pages\WishlistController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get("/", HomeController::class)->name('home.index');

    Route::get('search', SearchController::class)->name('search.index');

    Route::get("product/{product}", ProductController::class)->name('product.show');

    Route::prefix('/wishlist')->group(function () {
        Route::get('/', WishlistController::class)->name('wishlist.index');
        Route::post('store/{product_id}', [WishlistController::class, 'store'], 'store');
        Route::delete('delete/{product_id}', [WishlistController::class, 'delete'], 'store');
    });
});

Route::prefix("dashboard")->group(function () {

    Route::middleware(['auth.seller'])->group(function () {
        Route::get('register', [RegisterController::class, 'create'])->name('register.dashboard.create');

        Route::post('register/store', [RegisterController::class, 'store'])->name('register.dashboard.store');
    });

    Route::middleware(['costumer'])->group(function () {
        Route::get('/', [DashboardHomeController::class, 'index'])->name('dashboard.index');

        Route::post('product/store', [DashboardProductController::class, 'store']);
        Route::put('product/put/{id}', [DashboardProductController::class, 'put']);
        Route::delete('product/delete/{id}', [DashboardProductController::class, 'delete']);

        Route::resource('product', DashboardProductController::class)
            ->only(['index', 'create', "edit"])
            ->names([
                'index' => 'product.dashboard.index',
                'create' => 'product.dashboard.create',
                'edit' => 'product.dashboard.edit'
            ]);
    });
});

require __DIR__ . '/debug.php';

require __DIR__ . '/auth.php';
