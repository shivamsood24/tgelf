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


Route::get('/signup', 'ProfileController@index');
Route::post('/signup', 'ProfileController@checkval');
Route::get('/', 'IndexController@index');
Route::get('/login', 'LoginController@index');
Route::post('/login','LoginController@login');
Route::get('/register','UserController@index');
Route::get('/profile/{username}','UserController@profile');
Route::get('/temp','ProfileController@temp');
Route::get('createuser','UserController@index');
Route::post('createuser','UserController@createuser');
Route::get('success',function(){
	return "Success";
});
Route::get('/hash', function()
{
	return Hash::make('demo123');
});