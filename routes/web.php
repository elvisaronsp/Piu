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

Route::get('/grades/student-boletim', 'GradeController@studentBoletim')->name('grades.student_boletim');
Route::get('/schools', 'SchoolController@index')->name('school.index');
Route::get('/groups', 'GroupController@index')->name('groups.index');
Route::get('/student-groups/json', 'StudentGroupController@indexJson')->name('student_groups.json');
Route::get('/grades/boletim/{student_group_id}', 'GradeController@dataBoletim')->name('grades.boletim');
Route::get('/units', 'UnitController@index')->name('units.index');
# Image
Route::get('/images/{folder}/{fileName}', 'ImageController@show')->name('images.show');

Route::group(['middleware'=> ['auth']], function(){
  # Home
  Route::get('/', 'HomeController@index')->name('home')->middleware('can:control-panel');

  # Employeers
  Route::post('/employeers/store', 'EmployeerController@store')->name('employeers.store');
  Route::get('/employeers', 'EmployeerController@index')->name('employeers.index')->middleware('can:view-employeers');
  Route::get('/employeers/create', 'EmployeerController@create')->name('employeers.create')->middleware('can:add-employeers');
  Route::post('/employeers/destroy/{id}', 'EmployeerController@destroy')->name('employeers.destroy')->middleware('can:delete-employeers');

  # Students
  Route::get('/students', 'StudentController@index')->name('students.index')->middleware('can:view-students');
  Route::get('/students/edit/{id}', 'StudentController@edit')->name('students.edit')->middleware('can:edit-students');
  Route::post('/students/update', 'StudentController@update')->name('students.update')->middleware('can:edit-students');
  Route::get('/students/create', 'StudentController@create')->name('students.create')->middleware('can:add-students');
  Route::post('/students/store', 'StudentController@store')->name('students.store')->middleware('can:add-students');
  Route::get('/report-card/{id}', 'StudentController@report_card')->name('students.report_card');
  Route::post('/students/destroy', 'StudentController@destroy')->name('students.delete')->middleware('can:delete-students');

  # Stuffs
  Route::get('/stuffs', 'StuffController@index')->name('stuffs.index')->middleware('can:view-stuffs');
  Route::get('/stuffs/create', 'StuffController@create')->name('stuffs.create')->middleware('can:add-stuffs');
  Route::post('/stuffs/store', 'StuffController@store')->name('stuffs.store')->middleware('can:add-stuffs');
  Route::post('/stuffs/destroy/{id}', 'StuffController@destroy')->name('stuffs.destroy')->middleware('can:delete-stuffs');

  # Classes/Groups
  Route::get('/groups/create', 'GroupController@create')->name('groups.create')->middleware('can:add-groups');
  Route::post('/groups/store', 'GroupController@store')->name('groups.store')->middleware('can:add-groups');
  Route::post('/groups/destroy/{id}', 'GroupController@destroy')->name('groups.destroy')->middleware('can:delete-groups');
  Route::get('/groups/ata/{id}', 'GroupController@ata')->name('groups.ata');

  # StudentGroup
  Route::get('/student-groups', 'StudentGroupController@index')->name('student_groups.index')->middleware('can:view-student_groups');
  Route::post('/student-groups/store', 'StudentGroupController@store')->name('student_groups.store')->middleware('can:add-student_groups');
  Route::post('/student-groups/destroy/{id}', 'StudentGroupController@destroy')->name('student_group.destroy')->middleware('can:delete-student_groups');
  Route::get('/student-groups/boletim/{id}', 'StudentGroupController@boletim')->name('student_group.boletim');

  # Grade
  Route::post('/grades/store', 'GradeController@store')->name('grades.store')->middleware('can:add-grades');
  Route::get('/grades', 'GradeController@index')->name('grades.index')->middleware('can:view-grades');
  Route::post('/grades/destroy/{id}', 'GradeController@destroy')->name('grades.destroy')->middleware('can:delete-grades');
  Route::get('/grades/data-chart/{group_id}/{unit_id}', 'GradeController@dataChart')->name('grades.datachart');
  Route::get('/grades/ata/{group_id}/', 'GradeController@dataAta')->name('grades.ata');


  # Unit
  Route::post('/units/store', 'UnitController@store')->name('units.store')->middleware('can:add-units');
  Route::post('/units/destroy/{id}', 'UnitController@destroy')->name('unit.destroy')->middleware('can:delete-units');

  # Option
  Route::get('/options', 'OptionController@index')->name('options.index')->middleware('can:view-options');
  Route::post('/options/store', 'OptionController@store')->name('options.store')->middleware('can:add-options');
  Route::get('/options/create', 'OptionController@create')->name('options.create')->middleware('can:add-options');
  Route::post('/options/destroy/{id}', 'OptionController@destroy')->name('options.destroy')->middleware('can:delete-options');
  Route::post('/options/update/{name}', 'OptionController@update')->name('options.update')->middleware('can:edit-options');

  #School


});
