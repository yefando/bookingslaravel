<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('/bookings', \App\Http\Controllers\BookingsController::class);
Route::resource('/venues', \App\Http\Controllers\VenuesController::class);
Route::resource('/landing', \App\Http\Controllers\LandingController::class);
Route::resource('/bookingcreate', \App\Http\Controllers\createBooking::class);


Route::group(['namespace' => 'App\Http\Controllers'], function () {
	/**
	 * Home Routes
	 */
	Route::get('/', 'BookingsController@index')->name('bookings.index');
	Route::get('/bookings/create', 'BookingsController@create')->name('bookings.create');

	Route::group(['middleware' => ['guest']], function () {
		/**
		 * Register Routes
		 */
		Route::get('/register', 'RegisterController@show')->name('register.show');
		Route::post('/register', 'RegisterController@register')->name('register.perform');

		/**
		 * Login Routes
		 */
		Route::get('/login', 'LoginController@show')->name('login');
		Route::post('/login', 'LoginController@login')->name('login.perform');
	});

	Route::group(['middleware' => ['auth']], function () {
		/**
		 * Logout Routes
		 */
		Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
	});
});
