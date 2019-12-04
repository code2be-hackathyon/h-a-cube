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


use App\Sessions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'isAuthorized'], function () {

    Route::post('createSession/validate', 'SessionController@insert')->name('createSession');

    Route::get('newCourse', 'CourseController@index');

    Route::get('createSession', 'SessionController@index');

    Route::get('changePwd', 'UserController@changePwd')->name('changePwd');

    Route::get('searchSession', 'SessionController@search');

    Route::get('profile', 'UserController@profile');

    Route::post('newCourse/send', 'CourseController@send')->name('newCourse');

    Route::get('voteForSession', 'ScoresController@vote')->name('voteForSession');

});


Auth::routes();

Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('sessionList', 'SessionController@showSessionList');
    Route::get('sessionDetails', 'SessionController@showSessionDetails')->name('sessionDetails');
    Route::post('sessionDetails/validate', 'SessionController@update')->name('sessionDetailsValidate');
    Route::get('themePage', 'CourseController@themePage');
    Route::get('themePage/send', 'CourseController@acceptTheme')->name('acceptTheme');
    Route::get('themePage/sendRefuse', 'CourseController@refuseTheme')->name('refuseTheme');
});

