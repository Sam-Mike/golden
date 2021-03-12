<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\TrailerController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\AllocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ClaimController;
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

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('allocations', AllocationController::class)-> middleware('auth:sanctum');
Route::get('globalData', [HomeController::class, 'index']);
Route::apiResources([
    'clients' => ClientController::class,
    'people' => PeopleController::class,
    'trucks' => TruckController::class,
    'trailers' => TrailerController::class,
    'allocations' => AllocationController::class,
    'trips' => TripController::class,
    'claims' =>ClaimController::class,
]);


