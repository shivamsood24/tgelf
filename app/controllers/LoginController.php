<?php

class LoginController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Session::has('username'))
		{
			$value = Session::get('username');
			return Redirect::to('profile/'.$value);
		}
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
			'username' => 'required',
			'password' => 'required|alpha_num|between:5,20',
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes())
		{
			$username = Input::get('username');
        	$password = Input::get('password');

        	// //var_dump(Input::all());
        	// ($credentials));
			if (Auth::attempt($credentials))
		{
			Session::put('username', $username);
			//echo Session::get('username');
		   return Redirect::to('profile/'.$username);
		}
		else
		{
			return Redirect::to('login')->withErrors($validator,'login')->withInput(Input::except('password'));
		}
			

		}
		else
		{
			return Redirect::to('login')->withErrors($validator,'login')->withInput(Input::except('password'));
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
