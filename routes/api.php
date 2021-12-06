<?php

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

Route::prefix('product')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\Product\ProductListController::class, 'index']);
    Route::post('/', [App\Http\Controllers\Api\Product\ProductCreateController::class, 'index']);
});

Route::prefix('stock')->group(function () {
    Route::get('/history/', [App\Http\Controllers\Api\Stock\StockHistoryController::class, 'index']);
    Route::post('/movement', [App\Http\Controllers\Api\Stock\StockMovementController::class, 'index']);
});
