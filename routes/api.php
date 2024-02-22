<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CacheController;

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

    Route::get('activitats',[ActivityController::class,'index']);
    Route::post('activitats/crear',[ActivityController::class,'create']);
    Route::get('activitats/detall/{$id}',[ActivityController::class,'get']);
    Route::put('activitats/detall/update',[ActivityController::class,'update']);

    
});
