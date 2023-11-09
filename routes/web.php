<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'category'],function(){
    Route::get('create',[\App\Http\Controllers\Admin\CategoryController::class,'create_category'])->name('create.category');
    Route::post('store',[\App\Http\Controllers\Admin\CategoryController::class,'store_category'])->name('store.category');
    Route::get('view',[\App\Http\Controllers\Admin\CategoryController::class,'view_category'])->name('view.category');
    Route::get('edit,{id}',[\App\Http\Controllers\Admin\CategoryController::class,'edit_category'])->name('edit.category');
    Route::get('delete,{id}',[\App\Http\Controllers\Admin\CategoryController::class,'delete_category'])->name('delete.category');
    Route::post('update,{id}',[\App\Http\Controllers\Admin\CategoryController::class,'update_category'])->name('update.category');
});

Route::group(['prefix'=>'products'],function(){
    Route::get('create',[\App\Http\Controllers\Admin\ProductController::class,'create'])->name('create.product');
    Route::post('store',[\App\Http\Controllers\Admin\ProductController::class,'store'])->name('store.product');
    Route::get('show',[\App\Http\Controllers\Admin\ProductController::class,'show'])->name('show.product');
});
