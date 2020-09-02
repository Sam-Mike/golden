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
Route::get('/', 'ClientsController@index');

Route::get('/shows', function () {
    return view('shows.table');
});

Route::get('/shows', function () {
    return view('table');
});

Route::post('table','ClientsController@store');
Route::get('/people', 'PeopleController@index')->name('people');
Route::get('/trucks', 'TrucksController@index')->name('trucks');
Route::get('/truck_trailer_people', 'TruckTrailerPeopleController@index')->name('truck_trailer_people');
Route::get('/allocations', 'AllocationsController@index')->name('allocations');
