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

#Auth Routes
Auth::routes();

#Home
Route::get('/', 'HomeController@index')->name('home');

# Employeers
Route::post('/employeer/store', 'EmployeerController@store')->name('employeers.store');
Route::get('/employeers', 'EmployeerController@index')->name('employeers.index');
Route::get('/employeers/create', 'EmployeerController@create')->name('employeers.create');

# Responsabilities
Route::get('/responsabilities/get', 'ResponsabilityController@get');

# Students
Route::get('/students', 'StudentController@index')->name('students.index');
Route::get('/students/create', 'StudentController@create')->name('students.create');
Route::post('/students/store', 'StudentController@store')->name('students.store');

# Stuffs
Route::get('/stuffs', 'StuffController@index')->name('stuffs.index');
Route::get('/stuffs/create', 'StuffController@create')->name('stuffs.create');
Route::post('/stuffs/store', 'StuffController@store')->name('stuffs.store');

#Classes/Groups
Route::get('/groups', 'GroupController@index')->name('groups.index');
Route::get('/groups/create', 'GroupController@create')->name('groups.create');
Route::post('/groups/store', 'GroupController@store')->name('groups.store');

#StudentGroup
Route::get('/student-groups', 'StudentGroupController@index')->name('student_groups.index');
