<?php

use App\Http\Controllers\CityController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cleaner/{cleaner}', 'CleanersController@get');
Route::put('cleaner/{cleaner}', 'CleanersController@update');
Route::delete('cleaner/{cleaner}', 'CleanersController@destroy');


Route::get('city/{city}', 'CityController@get');
Route::put('city/{city}', 'CityController@update');
Route::delete('city/{city}', 'CityController@destroy');

