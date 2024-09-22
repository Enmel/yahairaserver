<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('users')->group(function () {

    Route::get('/', App\Http\Controllers\Users\ListController::class);
    Route::post('/', App\Http\Controllers\Users\StoreController::class);
    Route::get('/{user}', App\Http\Controllers\Users\GetByIdController::class);
    Route::patch('/{user}', App\Http\Controllers\Users\UpdateController::class);
    Route::delete('/{user}', App\Http\Controllers\Users\DeleteController::class);

})->middleware('auth:sanctum');


Route::post('/tokens/create', App\Http\Controllers\AuthController::class);

Route::prefix('product_types')->group(function () {

    Route::get('/', App\Http\Controllers\ProductTypes\ListController::class);
    Route::post('/', App\Http\Controllers\ProductTypes\StoreController::class);
    Route::get('/{product_type}', App\Http\Controllers\ProductTypes\GetByIdController::class);
    Route::put('/{product_type}', App\Http\Controllers\ProductTypes\UpdateController::class);
    Route::delete('/{product_type}', App\Http\Controllers\ProductTypes\DeleteController::class);

    Route::get('/{product_type}/attributes', App\Http\Controllers\Attributes\ListController::class);
    Route::post('/{product_type}/attributes', App\Http\Controllers\Attributes\StoreController::class);
    Route::get('/{product_type}/attributes/{attribute}', App\Http\Controllers\Attributes\GetByIdController::class);
    Route::patch('/{product_type}/attributes/{attribute}', App\Http\Controllers\Attributes\UpdateController::class);
    Route::delete('/{product_type}/attributes/{attribute}', App\Http\Controllers\Attributes\DeleteController::class);

    Route::post('/{product_type}/attributes/{attribute}/options', App\Http\Controllers\Options\StoreController::class);
    Route::delete('/{product_type}/attributes/{attribute}/options/{option}', App\Http\Controllers\Options\DeleteController::class);

})->middleware('auth:sanctum');

Route::prefix('stores')->group(function () {

    Route::get('/', App\Http\Controllers\Stores\ListController::class);
    Route::post('/', App\Http\Controllers\Stores\StoreController::class);
    Route::get('/{store}', App\Http\Controllers\Stores\GetByIdController::class);
    Route::put('/{store}', App\Http\Controllers\Stores\UpdateController::class);
    Route::delete('/{store}', App\Http\Controllers\Stores\DeleteController::class);

})->middleware('auth:sanctum');

Route::prefix('clients')->group(function () {

    Route::get('/', App\Http\Controllers\Clients\ListController::class);
    Route::post('/', App\Http\Controllers\Clients\StoreController::class);
    Route::get('/{client}', App\Http\Controllers\Clients\GetByIdController::class);
    Route::patch('/{client}', App\Http\Controllers\Clients\UpdateController::class);
    Route::delete('/{client}', App\Http\Controllers\Clients\DeleteController::class);

})->middleware('auth:sanctum');

Route::prefix('brands')->group(function () {

    Route::get('/', App\Http\Controllers\Brands\ListController::class);
    Route::post('/', App\Http\Controllers\Brands\StoreController::class);
    Route::get('/{brand}', App\Http\Controllers\Brands\GetByIdController::class);
    Route::put('/{brand}', App\Http\Controllers\Brands\UpdateController::class);
    Route::delete('/{brand}', App\Http\Controllers\Brands\DeleteController::class);

})->middleware('auth:sanctum');


Route::prefix('products')->group(function () {

    Route::get('/', App\Http\Controllers\Products\ListController::class);
    Route::post('/', App\Http\Controllers\Products\StoreController::class);
    Route::get('/{product}', App\Http\Controllers\Products\GetByIdController::class);
    Route::put('/{product}', App\Http\Controllers\Products\UpdateController::class);
    Route::delete('/{product}', App\Http\Controllers\Products\DeleteController::class);

    Route::get('/{product:upc}/variant', App\Http\Controllers\Variants\ListByUpcController::class);
    Route::get('/{product:upc}/variant/{sku:sku}', App\Http\Controllers\Variants\GetByIdController::class);
    Route::post('/{product:upc}/variant', App\Http\Controllers\Variants\StoreController::class);
    Route::put('/{product:upc}/variant/{sku:sku}', App\Http\Controllers\Variants\UpdateController::class);
})->middleware('auth:sanctum');

Route::prefix('stocks')->group(function () {

    Route::get('/', App\Http\Controllers\Stock\ListController::class);
    Route::put('/', App\Http\Controllers\Stock\SetController::class);

})->middleware('auth:sanctum');

/*
 *  Invoice
 *      Cliente
 *      Vendedor
 *      Sucursal_venta
 *      Payment Details
 *
 *  Invoice Item
 *      store_id
 *      Invoice_id
 *      Sku_id,
 *      amount,
 *      price
 *
 *  Payment Details
 * */
