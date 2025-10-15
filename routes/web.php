<?php

use Illuminate\Support\Facades\Route;

// Admin
Route::get('admin/users', function () {
    return view('admin.users.index');
});
Route::get('admin/posts', function () {
    return view('admin.posts.index');
});
Route::get('admin/categories', function () {
    return view('admin.categories.index');
});

//Analytics
Route::get('users/analytics', function () {
    return view('users.analytics.index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
