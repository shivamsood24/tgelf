<?php

class WorldController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "TGelf - leaders  Page";
		if(Session::has('username')){
			$username = Session::get('username');
		$user = User::where('username',$username)->first();
				$data = array(
					'title' => $title,
					'username' => $user
					);
		return View::make('pages.showleaders',$data);
		}
		else{
		return View::make('pages.showleaders',array('title'=> $title));
	}
	}


	public function world()
	{
		$title = "TGelf - World  Map";
		if(Session::has('username')){
			$username = Session::get('username');
		$user = User::where('username',$username)->first();
				$data = array(
					'title' => $title,
					'username' => $user
					);
		return View::make('pages.world',$data);
		}
		else
		{
		$country = UserAddress::all();
		return View::make('pages.world',array('title'=> $title));
	}
	}

	public function fetchmap()
	{	
		$fetch = array();

		$country = UserAddress::all();
		return $fetch;
		
	}


}
