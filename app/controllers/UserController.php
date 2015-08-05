<?php

/**
* 
*/
class UserController extends BaseController
{
	

	public function index()
	{

		return View::make('pages.createuser');
	}
	public function createuser(){

		$credentials = [
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			'confirmpassword' => Input::get('confirmpassword'),
			'unique_code' => Input::get('uniquecode')
		];

		$rules = [
			'username' => 'required',
			'password' => 'required'
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes())
		{
			return Redirect::to('success');
		}
		else
		{
			return Redirect::to('createuser')->withErrors($validator)->withInput();
		}

	}
}