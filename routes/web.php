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

Route::get('table', 'ClientsController@index');
Route::post('table','ClientsController@store')->name('table');

//People
Route::get('/people', 'PeopleController@index')->name('people');
Route::post('/people', 'PeopleController@store')->name('people');

//Trucks
Route::get('/trucks', 'TrucksController@index')->name('trucks');
Route::post('/trucks', 'TrucksController@store')->name('trucks');

//TruckTrailerPeople
Route::get('/truck_trailer_people', 'TruckTrailerPeopleController@index')->name('truck_trailer_people');
Route::post('/truck_trailer_people', 'TruckTrailerPeopleController@store')->name('truck_trailer_people');

//Allocations
Route::get('/allocations', 'AllocationsController@index')->name('allocations');
