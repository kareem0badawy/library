<?php

use Illuminate\Support\Facades\Redis;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	Redis::set('name', 'kareem badawy');

	return Redis::get('name');
    //return view('welcome');
});


Route::resource('library','sectionController');

get('admin','sectionController@admin');

post('library/restore/{id}','sectionController@restore');

post('library/delete-forever/{id}','sectionController@deleteForever');

Route::resource('books', 'booksController');

get('/summary', 'booksController@summary');


// Authentication routes...
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');


// Password reset link request routes...
Route::get('/password/email', 'Auth\PasswordController@getEmail');
Route::post('/password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('/password/reset', 'Auth\PasswordController@postReset');

//Login by Facebook

Route::get('/auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('/callback', 'Auth\AuthController@handleProviderCallback');


//Login by Google

Route::get('/auth/google', 'Auth\AuthController@redirectToProvider');
Route::get('/callback/google', 'Auth\AuthController@handleProviderCallback');
