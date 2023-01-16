<?php

use Modules\Setting\Http\Controllers\AdminSettingController;

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

// admin setting
Route::middleware('auth', 'admin')->prefix('admin')->group(function () {
    Route::prefix('setting')->group(function () {
        Route::get('/', [AdminSettingController::class, 'index'])->name('admin.setting');
        Route::get('/show/{setting}', [AdminSettingController::class, 'show'])->name('admin.setting.show');
        Route::get('/edit/{setting}', [AdminSettingController::class, 'edit'])->name('admin.setting.edit');
        Route::put('/update/{setting}', [AdminSettingController::class, 'update'])->name('admin.setting.update');
    });
});

// setting
Route::prefix('setting')->group(function () {
    Route::get('/', 'SettingController@index');
});
