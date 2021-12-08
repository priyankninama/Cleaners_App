<?php

use App\Http\Controllers\BookingDetailsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CleanersController;
use App\Http\Controllers\CustomersController;
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

Route::get('/', function () {
    return view('bookings.booking');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [CustomersController::class, 'index'] );

Route::prefix('/admin')->group(function () {
    Route::get('/', [BookingDetailsController::class, 'index'] );

    Route::get('/cleaner', [CleanersController::class, 'index'] );
    Route::post('/cleaner', [CleanersController::class, 'store'] );

    Route::post('/city', [CityController::class, 'store'] );
    Route::get('/city', [CityController::class, 'index'] );

});