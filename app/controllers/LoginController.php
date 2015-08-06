<?php

class LoginController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "TGelf - Login Page";
		return View::make('pages.login',array('title'=> $title));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function login()
	{
		$credentials = [
			'username' => Input::get('username'),
			'password' => Input::get('password')
			];
		
		$rules = [
			'username' => 'required|alpha',
			'password' => 'required|alpha_num|between:5,20',
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes())
		{
			return Redirect::to('success');
		}
		else
		{
			return Redirect::to('login')->withErrors($validator,'login')->withInput();
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
