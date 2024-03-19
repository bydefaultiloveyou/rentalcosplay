<?php

use App\Http\Controllers\Manga\MangaController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::prefix('manga')
    ->group(function () {
        Route::get('/', MangaController::class)->name('manga.index');

        Route::get('/detail/{slug}', [MangaController::class, 'show'])->name('manga.show');

        Route::get('/search', [MangaController::class, 'search'])->name('manga.search');

        Route::get('/read/{slug}/{chapter}/{slugChapter}', [MangaController::class, 'read'])->name('manga.read');
    });
