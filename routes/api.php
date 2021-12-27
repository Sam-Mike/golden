<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TrailerController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\AllocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\LoadingLocationController;
use Illuminate\Support\Facades\DB;
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
Route::get('globalData', [HomeController::class, 'index']);
Route::patch('endTrip/{id}', [TripController::class, 'endTrip']);
Route::patch('switch_person_activity/{id}', [PeopleController::class, 'switch_person_activity']);
Route::patch('switch_vehicle_activity/{id}', [VehicleController::class, 'switch_vehicle_activity']);
Route::patch('switch_trailer_activity/{id}', [TrailerController::class, 'switch_trailer_activity']);
Route::apiResources([
    'clients' => ClientController::class,
    'people' => PeopleController::class,
    'vehicles' => VehicleController::class,
    'trailers' => TrailerController::class,
    'allocations' => AllocationController::class,
    'trips' => TripController::class,
    'claims' => ClaimController::class,
    'users' => UserController::class,
    'locations' => LocationController::class,
    'cargo' => CargoController::class,
    'expenses' => ExpenseController::class,
    'deposits' => DepositController::class,
    'destinations' => DestinationController::class,
    'loading_locations' => LoadingLocationController::class,
]);

// DB::listen(function($query) {
//     var_dump($query->sql);
// });
