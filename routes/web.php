<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/users', function () {
    return view('admin.users.index');
});
Route::get('admin/posts', function () {
    return view('admin.posts.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
