<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Main'], function (){
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function (){
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });
    Route::group(['namespace' => 'Lot', 'prefix' => 'lot'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\LotController::class, 'index'])->name('admin.lot.index');
        Route::get('/create',  [\App\Http\Controllers\Admin\LotController::class, 'create'])->name('admin.lot.create');
        Route::post('/', [\App\Http\Controllers\Admin\LotController::class, 'store'])->name('admin.lot.store');
        Route::get('/{lot}', [\App\Http\Controllers\Admin\LotController::class, 'show'])->name('admin.lot.show');
        Route::get('/{lot}/edit', [\App\Http\Controllers\Admin\LotController::class, 'edit'])->name('admin.lot.edit');
        Route::patch('/{lot}',  [\App\Http\Controllers\Admin\LotController::class, 'update'])->name('admin.lot.update');
        Route::delete('/{lot}',  [\App\Http\Controllers\Admin\LotController::class, 'delete'])->name('admin.lot.delete');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin.category.show');
        Route::get('/{category}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.category.delete');
    });
});

