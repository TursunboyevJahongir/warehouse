<?php

use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\WarehouseController;
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

Route::get('products', [ProductsController::class, 'all']);
Route::get('product/{id}', [ProductsController::class, 'show']);

Route::get('materials', [MaterialController::class, 'all']);
Route::get('material/{id}', [MaterialController::class, 'show']);

Route::get('warehouse', [WarehouseController::class, 'all']);
Route::get('warehouse/{id}', [WarehouseController::class, 'show']);
Route::post('warehouse/production', [WarehouseController::class, 'production']);
