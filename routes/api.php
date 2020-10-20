<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllocationsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\TrucksController;
use App\Http\Controllers\TrailersController;
use App\Http\Controllers\TruckTrailerDriverController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('allocation', [AllocationsController::class, 'setAllocation']);


Route::apiResource('clients',ClientsController::class);

Route::get('people', [PeopleController::class,'index']);
Route::post('people', [PeopleController::class,'store']);

Route::get('trucks', [TrucksController::class, 'index']);
Route::post('trucks', [TrucksController::class, 'store']);

Route::get('trailers', [TrailersController::class, 'index']);
Route::post('trailers', [TrailersController::class, 'store']);

Route::get('truck_trailer_driver', [TruckTrailerDriverController::class, 'index']);
Route::post('truck_trailer_driver', [TruckTrailerDriverController::class, 'store']);

Route::get('allocations', [AllocationsController::class, 'index'])->name('allocations');