<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\TrucksController;
use App\Http\Controllers\TrailersController;
use App\Http\Controllers\TruckTrailerPeopleController;
use App\Http\Controllers\AllocationsController;

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
    return view('welcome');
});

//Clients
Route::get('/', [ClientsController::class, 'index']);
Route::post('table',[ClientsController::class, 'store'])->name('table');

//People
Route::get('/people', [PeopleController::class,'index']);
Route::post('/people', [PeopleController::class,'store'])->name('people');

//Trucks
Route::get('/trucks', [TrucksController::class, 'index']);
Route::post('/trucks', [TrucksController::class, 'store'])->name('trucks');

//Trailers
Route::get('/trailers', [TrailersController::class, 'index']);
Route::post('/trailers', [TrailersController::class. 'store'])->name('trailers');

//TruckTrailerPeople
Route::get('/truck_trailer_people', [TruckTrailerPeopleController::class, 'index']);
Route::post('/truck_trailer_people', [TruckTrailerPeopleController::class, 'store'])->name('truck_trailer_people');

//Allocations
Route::get('/allocations', [AllocationsController::class, 'index'])->name('allocations');


