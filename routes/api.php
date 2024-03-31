<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoverController;
use App\Http\Controllers\MediaDefinitionController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ParnerController;

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
    Route::get('user', [AuthController::class, 'user']);

    Route::get('covers', [CoverController::class, 'all']);
    Route::post('covers/create', [CoverController::class, 'create']);
    Route::get('covers/get/{id}', [CoverController::class, 'get']);
    Route::get('covers/attachments/{id}', [CoverController::class, 'GetAttachmentsById']);
    Route::put('covers/update', [CoverController::class, 'update']);

    Route::get('activity/all', [ActivityController::class, 'all']);
    Route::post('activity/create', [ActivityController::class, 'create']);
    Route::get('activity/get/{id}', [ActivityController::class, 'get']);
    Route::get('activity/attachments/{id}', [ActivityController::class, 'GetAttachmentsById']);
    Route::post('activity/publish/{id}', [ActivityController::class, 'publish']);
    Route::post('activity/unpublish/{id}', [ActivityController::class, 'unpublish']);
    Route::put('activity/update', [ActivityController::class, 'update']);
    Route::delete('activity/delete/{id}', [ActivityController::class, 'delete']);

    Route::post('media/addatachment', [MediaController::class, 'AddAttachment']);
    Route::delete('media/removeattachment/{id}', [MediaController::class, 'RemoveAttachment']);

    Route::get('mediadefinitions/all', [MediaDefinitionController::class, 'all']);

    Route::get('category/all', [CategoryController::class, 'all']);
    Route::post('category/create', [CategoryController::class, 'create']);
    Route::get('category/get/{id}', [CategoryController::class, 'get']);
    Route::put('category/update', [CategoryController::class, 'update']);
    Route::delete('category/delete/{id}', [CategoryController::class, 'delete']);

    Route::get('parners/all', [ParnerController::class, 'all']);
    Route::post('parners/create', [ParnerController::class, 'create']);
    Route::get('parners/get/{id}', [ParnerController::class, 'get']);
    Route::put('parners/update', [ParnerController::class, 'update']);
    Route::delete('parners/delete/{id}', [ParnerController::class, 'delete']);
});
