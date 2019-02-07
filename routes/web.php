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

Route::group(['middleware'=> ['auth']], function(){
  #Home
  Route::get('/', 'HomeController@index')->name('home');

  # Employeers
  Route::post('/employeers/store', 'EmployeerController@store')->name('employeers.store');
  Route::get('/employeers', 'EmployeerController@index')->name('employeers.index');
  Route::get('/employeers/create', 'EmployeerController@create')->name('employeers.create');
  Route::post('/employeers/destroy/{id}', 'EmployeerController@destroy')->name('employeers.destroy');

  # Responsabilities
  Route::get('/responsabilities/get', 'ResponsabilityController@get');

  # Students
  Route::get('/students', 'StudentController@index')->name('students.index');
  Route::get('/students/create', 'StudentController@create')->name('students.create');
  Route::post('/students/store', 'StudentController@store')->name('students.store');
  Route::get('/report-card/{id}', 'StudentController@report_card')->name('students.report_card');
  Route::post('/students/destroy', 'StudentController@destroy')->name('students.delete');

  # Stuffs
  Route::get('/stuffs', 'StuffController@index')->name('stuffs.index');
  Route::get('/stuffs/create', 'StuffController@create')->name('stuffs.create');
  Route::post('/stuffs/store', 'StuffController@store')->name('stuffs.store');
  Route::post('/stuffs/destroy/{id}', 'StuffController@destroy')->name('stuffs.destroy');

  # Classes/Groups
  Route::get('/groups', 'GroupController@index')->name('groups.index');
  Route::get('/groups/create', 'GroupController@create')->name('groups.create');
  Route::post('/groups/store', 'GroupController@store')->name('groups.store');
  Route::post('/groups/destroy/{id}', 'GroupController@destroy')->name('groups.destroy');

  # StudentGroup
  Route::get('/student-groups', 'StudentGroupController@index')->name('student_groups.index');
  Route::get('/student-groups/json', 'StudentGroupController@indexJson')->name('student_groups.json');
  Route::post('/student-groups/store', 'StudentGroupController@store')->name('student_groups.store');
  Route::post('/student-groups/destroy/{id}', 'StudentGroupController@destroy')->name('student_group.destroy');

  # Grade
  Route::post('/grades/store', 'GradeController@store')->name('grades.store');
  Route::get('/grades', 'GradeController@index')->name('grades.index');
  Route::post('/grades/destroy/{id}', 'GroupController@destroy')->name('grades.destroy');

  # Unit
  Route::get('/units', 'UnitController@index');
  Route::post('/units/store', 'UnitController@store');

});
