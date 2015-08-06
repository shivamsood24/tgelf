<?php

/**
* 
*/
class UserController extends BaseController
{
	

	public function index()
	{
		$title = "TGelf - Register Page";
		
		return View::make('pages.register',array('title'=> $title));
	}
	public function createuser(){

		$credentials = [
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			'confirmpassword' => Input::get('confirmpassword'),
			'unique_code' => Input::get('uniquecode')
		];
		
		$rules = [
			'username' => 'required|alpha',
			'password' => 'required|alpha_num|between:4,8|confirmed',
            'confirmpassword' => 'required|alpha_num|between:4,8'
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