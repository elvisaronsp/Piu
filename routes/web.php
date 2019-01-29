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
Route::post('/employeer/store', 'EmployeerController@store')->name('employeer.store');
Route::get('/employeers', 'EmployeerController@index')->name('employeer.index');
Route::get('/employeers/create', 'EmployeerController@create')->name('employeer.create');
Route::get('/responsabilities/get', 'ResponsabilityController@get');
Route::get('/stuffs', 'StuffController@index');
Route::get('/students', 'StudentController@index');
