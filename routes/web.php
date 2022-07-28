<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'loginAuth']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'admin', 'middleware' => ['is_admin']], function() {
    Route::get('/', [DashboardController::class, 'index']);

    Route::group(['prefix' => 'group'], function() {
        Route::get('/', [GroupController::class, 'indexGroup']);
        Route::get('/add', [GroupController::class, 'addGroup']);
        Route::post('/store', [GroupController::class, 'store']);
        Route::get('/delete/{id}', [GroupController::class, 'delete']);
        Route::get('/update/{id}', [GroupController::class, 'updateGroup']);
        Route::post('/update/{id}', [GroupController::class, 'update']);
    });

    Route::group(['prefix' => 'member'], function() {
        Route::get('/', [MemberController::class, 'indexMember']);
        Route::get('/import', [MemberController::class, 'importMember']);
        Route::get('/add', [MemberController::class, 'addMember']);
        Route::post('/store', [MemberController::class, 'store']);
        Route::get('/update/{id}', [MemberController::class, 'updateMember']);
        Route::post('/update/{id}', [MemberController::class, 'update']);
        Route::get('/delete/{id}', [MemberController::class, 'destroy']);
        Route::post('/import', [MemberController::class, 'import']);
    });

    Route::group(['prefix' => 'user'], function() {
        Route::get('/', [UserController::class, 'user']);
        Route::get('/add', [UserController::class, 'addUser']);
        Route::post('/store', [UserController::class, 'store']);
        Route::get('/update/{id}', [UserController::class, 'updateUser']);
        Route::post('/update/{id}', [UserController::class, 'update']);
        Route::get('/delete/{id}', [UserController::class, 'destroy']);
    });
});

