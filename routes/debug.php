<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::prefix('debug')->group(function () {
    Route::get('clear', function () {
        Artisan::call('route:clear');
        Artisan::call('event:clear');
        Artisan::call('view:clear');
    });

    Route::get('cache', function () {
        Artisan::call('route:cache');
        Artisan::call('event:cache');
        Artisan::call('view:cache');
    });

    Route::get('link', function () {
        $target = storage_path('/app/public/');
        $symlink = $_SERVER['DOCUMENT_ROOT'] . '/storage';
        symlink($target, $symlink);
    });
});
