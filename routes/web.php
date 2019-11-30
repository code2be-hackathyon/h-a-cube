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
//    if (Auth::check()) {
        return view('home');
//    } else {
//        return view('auth/login');
//    }
});

Route::get('createSession', 'SessionController@index');

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
