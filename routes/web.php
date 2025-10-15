<?php

use Illuminate\Support\Facades\Route;

Route::get('/favorites', function () {
    return view('favorite');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
