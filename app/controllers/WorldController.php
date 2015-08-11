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
		
		if ($res == 'china') {
			$fetch = array_add($fetch, '156', $res);
		}
		if ($res == 'usa') {
			$fetch = array_add($fetch, '156', $res);
		}
		if ($res == 'russia') {
			$fetch = array_add($fetch, '156', $res);
		}
		if ($res == 'england') {
			$fetch = array_add($fetch, '156', $res);
		}
		if ($res == 'germany') {
			$fetch = array_add($fetch, '156', $res);
		}
		if ($res == 'france') {
			$fetch = array_add($fetch, '156', $res);
		}
		if ($res == 'spain') {
			$fetch = array_add($fetch, '156', $res);
		}
		if ($res == 'japan') {
			$fetch = array_add($fetch, '156', $res);
		}
		if ($res == 'south korea') {
			$fetch = array_add($fetch, '156', $res);
		}
		if ($res == 'canada') {
			$fetch = array_add($fetch, '156', $res);
		}
		if ($res == 'australia') {
			$fetch = array_add($fetch, '156', $res);
		}
		if ($res == 'india') {
			$fetch = array_add($fetch, '356', $res);
		}

			}
		return View::make('pages.world',compact('title','fetch'));
	}

}
