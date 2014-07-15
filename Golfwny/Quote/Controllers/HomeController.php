<?php namespace Golfwny\Quote\Controllers;

use View,
	Event,
	Flash,
	Input,
	Redirect,
	RegionRepositoryInterface;

class HomeController extends BaseController {

	protected $regions;

	public function __construct(RegionRepositoryInterface $regions)
	{
		$this->regions = $regions;
	}

	public function index()
	{
		return View::make('pages.index')
			->withRegions($this->regions->all());
	}

	public function newQuote($slug)
	{
		// Get the region
		$region = $this->regions->findBySlug($slug);

		return View::make('pages.new-quote')
			->withCourses($region->courses->lists('name', 'id'))
			->withHotels($region->hotels)
			->withRegion($region)
			->withHoles(['9' => 9, '18' => 18, '27' => 27, '36' => 36]);
	}

}