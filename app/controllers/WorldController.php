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
		return View::make('pages.showleaders',array('title'=> $title));
	}


	public function world()
	{
		$title = "TGelf - World  Map";
		return View::make('pages.world',array('title'=> $title));
	}

}
