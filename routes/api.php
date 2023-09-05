<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')
    ->group(function () {
        Route::namespace('Api\V1')->group(function () {
            Route::get('/get-goods-with-price-and-quantity-on-stocks', [\App\Http\Controllers\Api\V1\IndexController::class, 'getGoodsWithPriceAndQuantityOnStocks']);
            Route::get('/get-goods-with-price-and-quantity-by-stock/{stockId}', [\App\Http\Controllers\Api\V1\IndexController::class, 'getGoodsWithPriceAndQuantityByStock']);
            Route::get('/get-goods-with-price-and-characteristic-without-stock', [\App\Http\Controllers\Api\V1\IndexController::class, 'getGoodsWithPriceAndCharacteristicWithoutStock']);
            Route::get('/get-goods-with-price-and-quantity-with-stock', [\App\Http\Controllers\Api\V1\IndexController::class, 'getGoodsWithPriceAndQuantityWithStock']);
        });
    });