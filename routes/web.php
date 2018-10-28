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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/buildings', 'BuildingController');
Route::resource('/parking', 'ParkingLotController');
Route::resource('/company', 'CompanyController');
Route::resource('/room', 'RoomController');
Route::resource('/alerts', 'AlertController');
Route::resource('/employee', 'InternalEmployeesController');

Route::get('/test','TestController@index');
