<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ProductController;
use Illuminate\Contracts\Cache\Store;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'/products'],function(){
    Route::get('',[ProductController::class,'index'])->name('products');
    Route::post('',[ProductController::class,'store'])->name('products');
    Route::get('/{id}',[ProductController::class,'show'])->name('products.show');
    Route::put('/{id}',[ProductController::class,'update'])->name('products.update');
    Route::delete('/{id}',[ProductController::class,'destory'])->name('products.destory');
});