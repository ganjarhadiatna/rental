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

Route::get('/', 'MainController@index');
Route::get('/dashboard', 'MainController@index');
Route::get('/dashboard/{ctr}', 'MainController@dashboard');

Route::get('/data/car', 'MainController@car');
Route::get('/data/car/{ctr}', 'MainController@otherCar');

Route::get('/data/car/detail/{id}', 'MainController@detailCar');
Route::get('/data/car/edit/{id}', 'MainController@editCar');
Route::get('/add/car', 'MainController@addCar');
Route::post('/add/car/publish', 'MobilController@publish');
Route::post('/add/car/edit', 'MobilController@edit');
Route::post('/add/car/delete', 'MobilController@delete');

Route::get('/data/booking', 'MainController@booking');
Route::get('/data/booking/detail/{id}', 'MainController@bookingDetail');
Route::get('/data/booking/edit/{id}', 'MainController@bookingEdit');

Route::get('/add/booking/{id}', 'MainController@addBooking');
Route::post('/add/booking/publish', 'BookingController@publish');
Route::post('/add/user/edit', 'BookingController@editUser');
Route::post('/add/user/delete', 'BookingController@deleteUser');

Route::get('/data/transaction', 'MainController@transaction');
Route::get('/data/transaction/detail/{id}', 'MainController@transactionDetail');
Route::get('/data/transaction/edit/{id}', 'MainController@transactionEdit');
Route::post('/add/transaction/edit', 'BookingController@editSewa');
Route::post('/add/transaction/delete', 'BookingController@deleteSewa');


Route::post('/admin/login', 'AdminController@login');
Route::get('/admin/logout' ,'AdminController@logout');

Route::get('show/error/sql', function() {
    Event::listen('illuminate.query', function($query) {
    	var_dump($query);
    });
});