<?php

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/dashboard', '/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('courseUnits', 'CourseUnitsController');
Route::resource('notes', 'NotesController');

Route::redirect('/', '/home');

Route::get('/logout', 'Auth\LoginController@logout');

//semesters
Route::resource('semesters', 'SemesterController');

Route::post('activateSemester/{semester}', 'ActivateSemestersController@store');
