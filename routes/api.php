<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\CategoryController;

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

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class, 'register']);

Route::post('regenerateCache', [CacheController::class, 'regenerateCache']);

Route::middleware('jwt.auth')->group(function () {
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user',[AuthController::class,'user']);

    Route::get('activity/all',[ActivityController::class,'all']);
    Route::post('activity/create',[ActivityController::class,'create']);
    Route::get('activity/get/{id}',[ActivityController::class,'get']);    
    Route::get('activity/media/{id}',[ActivityController::class,'get']);   
    Route::put('activity/update',[ActivityController::class,'update']);

    Route::get('category/all',[CategoryController::class,'all']);
    Route::post('category/create',[CategoryController::class,'create']);
    Route::get('category/get/{id}',[CategoryController::class,'get']);    
    Route::put('category/update',[ActivityController::class,'update']);
    
});
