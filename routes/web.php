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



Route::get('/shows', function () {
    return view('shows.table');
});

Route::get('/shows', function () {
    return view('table');
});

*/

Route::get('/', 'ClientController@index');

Route::post('table','ClientController@store');

