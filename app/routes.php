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

<<<<<<< HEAD
Route::get('/signup', 'ProfileController@index');
Route::post('/signup', 'ProfileController@checkval');
=======
Route::get('/', function()
{
    $data = array(
        'title' => 'Tgelf - Homepage');
});

Route::get('createuser','UserController@index');
Route::post('createuser','UserController@createuser');
Route::get('success',function(){
	return "Success";
});
>>>>>>> origin/master
