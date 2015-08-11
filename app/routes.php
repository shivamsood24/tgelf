<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//IndexController Routes
Route::get('/', 'IndexController@index');
Route::get('/events','IndexController@events');
Route::get('/aboutus','IndexController@aboutus');
Route::get('/program','IndexController@program');

//LoginController Routes
Route::get('/login', 'LoginController@index');
Route::post('/login','LoginController@login');

//UserControllerRoutes
Route::get('/register','UserController@index');
Route::post('/checkusername','UserController@checkusername');
Route::post('/checkcode','UserController@checkcode');
Route::get('/profile/{username}','UserController@profile');
Route::get('createuser','UserController@index');
Route::post('createuser','UserController@createuser');
Route::get('/fetchmap', 'UserController@fetchmap');

//ProfileController Routes
Route::get('/temp','ProfileController@temp');

//WorldController Routes
Route::get('/showleaders','WorldController@index');
Route::get('/world', 'WorldController@world');

Route::get('/logout', 'IndexController@doLogout');


//Temp Routes
Route::get('success',function(){
	return "Success";
});
Route::get('/hash', function()
{
	return Hash::make('demo123');
});