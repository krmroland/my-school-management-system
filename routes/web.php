<?php

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/dashboard', '/');

Route::get('/login', function () {
    auth()->loginUsingId(1);

    return redirect('/home');
})->name('login');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//courseUnits
Route::resource('courseUnits', 'CourseUnitsController');
Route::resource('courseUnit.notes', 'CourseUnitNotesController');
Route::get('courseUnits/{courseUnit}/pdf', 'CourseUnitPdfController@index');
Route::redirect('/', '/home');

Route::get('/logout', 'Auth\LoginController@logout');

//semesters
Route::resource('semesters', 'SemesterController');

Route::post('activateSemester/{semester}', 'ActivateSemestersController@store');

Route::resource('/faculties', 'FacultyController');

//backups
Route::get('/backups', function () {
    return response(
        file_get_contents(database_path('/database.sqlite')),
        200,
        [
            'Content-Type' => 'application/txt',
            'Content-Disposition' => 'inline; filename="database.sqlite"',
        ]
    );
});
