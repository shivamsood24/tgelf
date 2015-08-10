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
		return View::make('pages.index',array('title'=> $title));

	}

public function events()
	{
			//
		$title = "TGelf - Events";
		return View::make('pages.events',array('title'=> $title));
	}
	public function aboutus()
	{
			//
		$title = "TGelf - About Us";
		return View::make('pages.aboutus',array('title'=> $title));
	}
	public function program()
	{
			//
		$title = "TGelf - Program";
		return View::make('pages.program',array('title'=> $title));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
