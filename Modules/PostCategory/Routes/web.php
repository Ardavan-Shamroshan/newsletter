<?php

use Modules\PostCategory\Http\Controllers\AdminPostCategoryController;
use Modules\PostCategory\Http\Controllers\PostCategoryController;

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


// admin post category
Route::middleware('auth', 'admin')->prefix('admin')->group(function () {
    Route::prefix('postcategory')->group(function () {
        Route::get('/', [AdminPostCategoryController::class, 'index'])->name('admin.postcategory');
        Route::get('/create', [AdminPostCategoryController::class, 'create'])->name('admin.postcategory.create');
        Route::post('/store', [AdminPostCategoryController::class, 'store'])->name('admin.postcategory.store');
        Route::get('/show/{postcategory:slug}', [AdminPostCategoryController::class, 'show'])->name('admin.postcategory.show');
        Route::get('/edit/{postcategory:slug}', [AdminPostCategoryController::class, 'edit'])->name('admin.postcategory.edit');
        Route::put('/update/{postcategory}', [AdminPostCategoryController::class, 'update'])->name('admin.postcategory.update');
        Route::delete('/destroy/{postcategory}', [AdminPostCategoryController::class, 'destroy'])->name('admin.postcategory.destroy');
        Route::get('/status/{postcategory}', [AdminPostCategoryController::class, 'status'])->name('admin.postcategory.status');
    });
});

// post category
Route::prefix('postcategory')->group(function () {
    Route::get('/{postcategory:slug}', [PostCategoryController::class, 'index'])->name('postcategory');
});
