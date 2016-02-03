<?php namespace Controllers\Admin;


use AdminController;
use View;
use Asset;
use Actionlog;


class MapController extends AdminController {


	public function getMap(){
		return View::make('frontend/map');
	}

}
