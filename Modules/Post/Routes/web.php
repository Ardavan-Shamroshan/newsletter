<?php

use Modules\Post\Http\Controllers\AdminPostController;
use Modules\Post\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// admin post
Route::middleware('auth', 'admin')->prefix('admin')->group(function () {
    Route::prefix('post')->group(function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('admin.post');
        Route::get('/create', [AdminPostController::class, 'create'])->name('admin.post.create');
        Route::post('/store', [AdminPostController::class, 'store'])->name('admin.post.store');
        Route::get('/show/{post:slug}', [AdminPostController::class, 'show'])->name('admin.post.show');
        Route::get('/edit/{post:slug}', [AdminPostController::class, 'edit'])->name('admin.post.edit');
        Route::put('/update/{post}', [AdminPostController::class, 'update'])->name('admin.post.update');
        Route::delete('/destroy/{post}', [AdminPostController::class, 'destroy'])->name('admin.post.destroy');
        Route::get('/isBanner/{post}', [AdminPostController::class, 'isBanner'])->name('admin.post.isBanner');
        Route::get('/status/{post}', [AdminPostController::class, 'status'])->name('admin.post.status');
        Route::get('/commentable/{post}', [AdminPostController::class, 'commentable'])->name('admin.post.commentable');
        Route::get('/clone/{post}', [AdminPostController::class, 'clone'])->name('admin.post.clone');
    });
});

// post
Route::prefix('post')->group(function () {
    Route::get('/',  [PostController::class, 'index'])->name('post');
    Route::get('/club-news',  [PostController::class, 'clubNews'])->name('post.club-news');
    Route::get('/world-news',  [PostController::class, 'worldNews'])->name('post.world-news');
    Route::get('/show/{post:slug}', [PostController::class, 'show'])->name('post.show');
});
