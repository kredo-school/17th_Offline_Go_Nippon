<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', function () {
    return view('users.profile.show');
});

Route::get('/show2', function () {
    return view('users.profile.show2');
// ★★★ 修正不要、このルート定義で 'post.store' が有効です ★★★
// ルート名は post. で統一されているため、Blade側を post.store に合わせましょう。
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/{id}/show', [PostController::class, 'show'])->name('post.show');
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/post/{id}/update', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('/users/profile', function () {
    return view('users.profile.edit');
});

Route::get('/users/posts', function () {
    return view('users.posts.show');
});
