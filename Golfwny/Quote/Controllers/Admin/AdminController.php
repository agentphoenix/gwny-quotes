<?php namespace Quote\Controllers\Admin;

use View;
use Quote\Controllers\BaseController;

class AdminController extends BaseController {

	public function index()
	{
		return View::make('pages.admin.admin');
	}

}