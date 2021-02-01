<?php

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

Route::get('/', 'PagesController@home');

Route::resource('featuretypes', 'FeatureTypesController');

Route::resource('features', 'FeaturesController');

Route::resource('holidays', 'HolidaysController');

Route::resource('bookings', 'HolidayBookingsController');
Route::get('/locations', 'HolidayBookingsController@locations');

Route::get('/preferences', 'PagesController@preferences');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::delete('/holidayfeatures/{holidayfeature}', 'HolidayFeaturesController@destroy');
Route::post('/holidayfeatures', 'HolidayFeaturesController@store');
