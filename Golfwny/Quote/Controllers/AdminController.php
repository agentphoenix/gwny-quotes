<?php namespace Quote\Controllers;

use View,
	Event,
	Flash,
	Input,
	Status,
	Session,
	Redirect,
	QuoteRepositoryInterface,
	RegionRepositoryInterface;
use Quote\Services\QuoteCalculatorService;

class AdminController extends BaseController {

	protected $quotes;
	protected $regions;

	public function __construct(RegionRepositoryInterface $regions,
			QuoteRepositoryInterface $quotes)
	{
		parent::__construct();
		
		$this->quotes = $quotes;
		$this->regions = $regions;
	}

	public function index()
	{
		return View::make('pages.admin');
	}

}