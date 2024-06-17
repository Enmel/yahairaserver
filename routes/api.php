<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/tokens/create', App\Http\Controllers\AuthController::class);

Route::prefix('products')->group(function () {

    Route::get('/', App\Http\Controllers\Products\ListController::class);
    Route::post('/', App\Http\Controllers\Products\StoreController::class);
    Route::get('/{product}', App\Http\Controllers\Products\GetByIdController::class);
    Route::put('/{product}', App\Http\Controllers\Products\UpdateController::class);

    Route::get('/{product}/variant/{sku}', App\Http\Controllers\Variants\GetByIdController::class);
    Route::post('/{product}/variant', App\Http\Controllers\Variants\StoreController::class);
    Route::put('/{product}/variant/{sku}', App\Http\Controllers\Variants\UpdateController::class);

})->middleware('auth:sanctum');
