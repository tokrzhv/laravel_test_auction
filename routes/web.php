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
        Route::get('/', 'IndexController')->name('admin.lot.index');
        Route::get('/create', 'CreateController')->name('admin.lot.create');
        Route::post('/', 'StoreController')->name('admin.lot.store');
        Route::get('/{lot}', 'ShowController')->name('admin.lot.show');
        Route::get('/{lot}/edit', 'EditController')->name('admin.lot.edit');
        Route::patch('/{lot}', 'UpdateController')->name('admin.lot.update');
        Route::delete('/{lot}', 'DeleteController')->name('admin.lot.delete');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });
});

