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
		$title = 'TGelf - World  Map';
		$result = DB::table('user_addresses')->get();
			$fetch =array();
			foreach ($result as $res)
			{
		
		if ($res->country == 'china') {
			$fetch = array_add($fetch, '156', $res->country);
		}
		if ($res->country == 'usa') {
			$fetch = array_add($fetch, '840', $res->country);
		}
		if ($res->country == 'russia') {
			$fetch = array_add($fetch, '643', $res->country);
		}
		if ($res->country == 'england') {
			$fetch = array_add($fetch, '826', $res->country);
		}
		if ($res->country == 'germany') {
			$fetch = array_add($fetch, '276', $res->country);
		}
		if ($res->country == 'france') {
			$fetch = array_add($fetch, '250', $res->country);
		}
		if ($res->country == 'spain') {
			$fetch = array_add($fetch, '156', $res->country);
		}
		if ($res->country == 'japan') {
			$fetch = array_add($fetch, '156', $res->country);
		}
		if ($res->country == 'south korea') {
			$fetch = array_add($fetch, '156', $res->country);
		}
		if ($res->country == 'canada') {
			$fetch = array_add($fetch, '156', $res->country);
		}
		if ($res->country =='australia') {
			$fetch = array_add($fetch, '156', $res->country);
		}
		if ($res->country == 'india') {
			$fetch = array_add($fetch, '356', $res->country);
		}

			}
		return View::make('pages.world',compact('title','fetch'));
	}

}
