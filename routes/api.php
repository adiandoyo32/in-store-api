<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::prefix('v1')->group(function () {
    Route::prefix('categories')->group(function() {
        Route::get('/', [Controllers\Api\v1\Category\CategoryController::class, 'index']);
        Route::post('/', [Controllers\Api\v1\Category\CategoryController::class, 'store']);

        Route::prefix('{category}')->group(function() {
            Route::get('/', [Controllers\Api\v1\Category\CategoryController::class, 'show']);
            Route::patch('/', [Controllers\Api\v1\Category\CategoryController::class, 'update']);
            Route::delete('/', [Controllers\Api\v1\Category\CategoryController::class, 'destroy']);
        });
    });
});

