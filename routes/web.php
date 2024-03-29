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
  Route::get('/', 'HomeController@index')->name('home');

  # Employeers
  Route::post('/employeers/store', 'EmployeerController@store')->name('employeers.store');
  Route::get('/employeers', 'EmployeerController@index')->name('employeers.index')->middleware('can:view-employeers');
  Route::get('/employeers/create', 'EmployeerController@create')->name('employeers.create')->middleware('can:add-employeers');
  Route::post('/employeers/destroy/{id}', 'EmployeerController@destroy')->name('employeers.destroy')->middleware('can:delete-employeers');
  Route::get('/employeers/edit/{id}', 'EmployeerController@edit')->name('employeers.edit')->middleware('can:edit-employeers');
  Route::post('/employeers/update', 'EmployeerController@update')->name('employeers.update')->middleware('can:edit-employeers');

  # Students
  Route::get('/students', 'StudentController@index')->name('students.index')->middleware('can:view-students');
  Route::get('/students/edit/{id}', 'StudentController@edit')->name('students.edit')->middleware('can:edit-students');
  Route::post('/students/update', 'StudentController@update')->name('students.update')->middleware('can:edit-students');
  Route::get('/students/create', 'StudentController@create')->name('students.create')->middleware('can:add-students');
  Route::post('/students/store', 'StudentController@store')->name('students.store')->middleware('can:add-students');
  Route::get('/report-card/{id}', 'StudentController@report_card')->name('students.report_card');
  Route::post('/students/destroy', 'StudentController@destroy')->name('students.delete')->middleware('can:delete-students');
  Route::get('/students/{id}', 'StudentController@view')->name('students.view')->middleware('can:view-students');

  # Stuffs
  Route::get('/stuffs', 'StuffController@index')->name('stuffs.index')->middleware('can:view-stuffs');
  Route::get('/stuffs/create', 'StuffController@create')->name('stuffs.create')->middleware('can:add-stuffs');
  Route::post('/stuffs/store', 'StuffController@store')->name('stuffs.store')->middleware('can:add-stuffs');
  Route::get('/stuffs/edit/{id}', 'StuffController@edit')->name('stuffs.edit')->middleware('can:edit-stuffs');
  Route::post('/stuffs/update', 'StuffController@update')->name('stuffs.update')->middleware('can:edit-stuffs');
  Route::post('/stuffs/destroy/{id}', 'StuffController@destroy')->name('stuffs.destroy')->middleware('can:delete-stuffs');

  # Classes/Groups
  Route::get('/groups/create', 'GroupController@create')->name('groups.create')->middleware('can:add-groups');
  Route::post('/groups/store', 'GroupController@store')->name('groups.store')->middleware('can:add-groups');
  Route::post('/groups/destroy/{id}', 'GroupController@destroy')->name('groups.destroy')->middleware('can:delete-groups');
  Route::get('/groups/ata/{id}', 'GroupController@ata')->name('groups.ata');
  Route::get('/groups/edit/{id}', 'GroupController@edit')->name('groups.edit')->middleware('can:edit-groups');
  Route::post('/groups/update', 'GroupController@update')->name('groups.update')->middleware('can:edit-groups');

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
  Route::get('/grades/edit/{id}', 'GradeController@edit')->name('grades.edit')->middleware('can:edit-grades');
  Route::post('/grades/update', 'GradeController@update')->name('grades.update')->middleware('can:edit-grades');


  # Unit
  Route::post('/units/store', 'UnitController@store')->name('units.store')->middleware('can:add-units');
  Route::post('/units/destroy/{id}', 'UnitController@destroy')->name('unit.destroy')->middleware('can:delete-units');

  # Option
  Route::get('/options', 'OptionController@index')->name('options.index')->middleware('can:view-options');
  Route::post('/options/store', 'OptionController@store')->name('options.store')->middleware('can:add-options');
  Route::get('/options/create', 'OptionController@create')->name('options.create')->middleware('can:add-options');
  Route::post('/options/destroy/{id}', 'OptionController@destroy')->name('options.destroy')->middleware('can:delete-options');
  Route::post('/options/update/{name}', 'OptionController@update')->name('options.update')->middleware('can:edit-options');

  # Statistic
  Route::get('/statistic/students/count', 'StatisticController@studentsCount')->name('statistic.student.count');
  Route::get('/statistic/employeers/count', 'StatisticController@employeersCount')->name('statistic.employeers.count');
  Route::get('/statistic/groups/count', 'StatisticController@groupsCount')->name('statistic.groups.count');
  
  # Schools
  Route::get('/schools/{name}', 'SchoolController@get')->name('school.get');

  # StudentTransfer
  Route::post('/student-transfers/store', 'StudentTransferController@store')->name('student_transfers.store');
  Route::get('/student-transfers', 'StudentTransferController@index')->name('student_transfers.index');
  Route::get('/student-transfers/pending', 'StudentTransferController@pending')->name('student_transfers.pending');
  Route::get('/student-transfers/{id}', 'StudentTransferController@view')->name('student_transfers.view');
  Route::post('/student-transfers/update/{id}', 'StudentTransferController@update')->name('student_transfers.update');

  # Search
  Route::get('/search/{entity}/{search}', 'SearchController@index')->name('search.index');

});
