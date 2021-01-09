<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ExamController@Welcome');

Auth::routes();

Route::get('/home', 'ExamController@Home');
Route::get('/exam/{id}', 'ExamController@ShowExam');
Route::post('/exam/result', 'ExamController@ShowResult');    

Route::group(['middleware' => ['role:superadministrator|administrator']], function() {
    Route::get('/manage', 'ManageController@Home');
    Route::resource('/manage/users','UserController');
    Route::resource('/manage/roles','RoleController');
    Route::resource('/manage/permissions','PermissionController');
    Route::resource('/manage/exams','AdminExamController');
    Route::resource('/manage/questions','AdminQuestionController');
});
