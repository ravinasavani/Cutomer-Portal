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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'customer','middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index')->name('customer');
    Route::post('/update','UserController@update')->name('update');

    Route::get('/passenger/create','PassengerController@create')->name('passenger.create');
    Route::post('/passenger/store','PassengerController@store')->name('passenger.store');
    Route::get('/passenger/delete/{id}','PassengerController@delete')->name('passenger.delete');

    Route::group(['prefix' => 'passenger','middleware' => 'auth'], function () {
        Route::get('/trip/create','TripController@create')->name('trip.create');
        Route::post('/trip/store','TripController@store')->name('trip.store');
        Route::get('/trip/delete/{id}','TripController@delete')->name('trip.delete');
    });

});
