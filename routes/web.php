<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users/profile', function () {
    return view('users.profile.edit');
});

Route::get('/users/posts', function () {
    return view('users.posts.show');
});
