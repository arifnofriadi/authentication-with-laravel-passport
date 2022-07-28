<?php

use App\Http\Controllers\API\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\PassportController;

Route::group(['prefix' => '/V1'], function() {
    Route::post('/login', [PassportController::class, 'login']);
    Route::post('/register', [PassportController::class, 'register']);

    Route::middleware('auth:api')->group(function() {
        Route::get('/user', [PassportController::class, 'user']);
        Route::get('/user/{id}', [PassportController::class, 'show']);
    });
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // return $request->user();
// });
