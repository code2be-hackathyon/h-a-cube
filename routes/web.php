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


Route::group(['middleware' => 'isAdmin'], function () {

    Route::get('/test', function () {
        return view('frontoffice/newCourse');
    });

});


Route::get('/', function () {
    return view('home');
});

Route::get('/newCourse', 'CourseController@index');

Route::get('createSession', 'SessionController@index');

Route::get('/changePwd', 'UserController@changePwd')->name('changePwd');

Route::get('/searchSession', 'SessionController@search');

Route::get('/profile', 'UserController@profile');

Auth::routes();

Route::get('courses', 'CourseController@index');
Route::get('courses/{course}', 'CourseController@show');
Route::post('courses', 'CourseController@store');
Route::put('courses/{course}', 'CourseController@update');
Route::delete('courses/{course}', 'CourseController@delete');

Route::get('usertypes', 'UserTypeController@index');
Route::get('usertypes/{usertype}', 'UserTypeController@show');
Route::post('usertypes', 'UserTypeController@store');
Route::put('usertypes/{usertype}', 'UserTypeController@update');
Route::delete('usertypes/{usertype}', 'UserTypeController@delete');

Route::get('users', 'UserController@index');
Route::get('users/{user}', 'UserController@show');
Route::post('users', 'UserController@store');
Route::put('users/{user}', 'UserController@update');
Route::delete('users/user}', 'UserController@delete');

Route::get('etablissements', 'EtablissementController@index');
Route::get('etablissements/{etablissement}', 'EtablissementController@show');
Route::post('etablissements', 'EtablissementController@store');
Route::put('etablissements/{etablissement}', 'EtablissementController@update');
Route::delete('etablissements/etablissement}', 'EtablissementController@delete');
