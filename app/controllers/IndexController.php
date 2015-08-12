<?php

class IndexController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$title = "TGelf - Homepage";
		if(Session::has('username')){
			$username = Session::get('username');
		$user = User::where('username',$username)->first();
				$data = array(
					'title' => $title,
					'username' => $user
					);
		return View::make('pages.index',$data);
		}
		
			return View::make('pages.index',array('title'=> $title));
	}

public function events()
	{
			//
		$title = "TGelf - Events";
		if(Session::has('username')){
			$username = Session::get('username');
		$user = User::where('username',$username)->first();
				$data = array(
					'title' => $title,
					'username' => $user
					);
		return View::make('pages.events',$data);
		}
		else{
		return View::make('pages.events',array('title'=> $title));
	}
	}
	public function aboutus()
	{
			//
		$title = "TGelf - About Us";
		if(Session::has('username')){
			$username = Session::get('username');
		$user = User::where('username',$username)->first();
				$data = array(
					'title' => $title,
					'username' => $user
					);
		return View::make('pages.aboutus',$data);
		}
		else{
		return View::make('pages.aboutus',array('title'=> $title));
	}
	}
	public function program()
	{
			//
		$title = "TGelf - Program";
		if(Session::has('username')){
			$username = Session::get('username');
		$user = User::where('username',$username)->first();
				$data = array(
					'title' => $title,
					'username' => $user
					);
		return View::make('pages.program',$data);
		}
		else{
		return View::make('pages.program',array('title'=> $title));
	}
	}

public function doLogout()
{
    Auth::logout(); // log the user out of our application
    Session::flush();
    return Redirect::to('login'); // redirect the user to the login screen
}

}
