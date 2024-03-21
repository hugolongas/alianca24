<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses' => 'PageController@Index', 'as' => 'home']);
Route::get('/activitats',['uses'=>'PageController@activities','as' =>'activities']);
Route::get('/activitats?date={date}',['uses'=>'PageController@activities','as' =>'activities.date']);
Route::get('/activitats/calendar/{year}/{month}',['uses'=>'ActivityController@calendarActivities','as' =>'activities.calendar']);

Route::get('/activitat/{slug}',['uses'=>'PageController@GetActivity','as' =>'activity']);

Route::get('alianca',['uses'=>'PageController@page','as'=>'alianca']);

Route::get('/contact',['uses'=>'PageController@contact','as'=>'contact']);

Route::get('/socis',['uses'=>'PageController@socis','as'=>'socis']);


