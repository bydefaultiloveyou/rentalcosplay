<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest', 'auth.costumer'])->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('register/store', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('login.create');
    Route::post('login/store', [LoginController::class, 'store']);
});

Route::get('/logout', function (Request $request) {
    // delete add session
    $request->session()->flush();

    // redirect and delete cookie auth
    return redirect(route('home.index'))->withCookies([Cookie::forget('uuid'), Cookie::forget('authenticated')]);
})->name('logout');
