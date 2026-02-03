<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StockMasterController;
use App\Http\Controllers\StockConsolidateController;


Route::post('login', [AuthController::class, 'login']);

Route::middleware('jwt.auth')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);

    Route::apiResource('users', UserController::class);
   
});
 Route::apiResource('stock-master', StockMasterController::class);
 Route::apiResource('stock-consolidate', StockConsolidateController::class);