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

	public function index($location = false, $step = 'info')
	{
		// Get the region
		$region = $this->regions->findBySlug($location);

		switch ($step)
		{
			case 'info':
				$stepInfoStatus = 'active';
				$stepCoursesStatus = 'disabled';
				$stepConfirmStatus = 'disabled';
			break;

			case 'courses':
				$stepInfoStatus = 'completed';
				$stepCoursesStatus = 'active';
				$stepConfirmStatus = 'disabled';
			break;

			case 'confirm':
				$stepInfoStatus = 'completed';
				$stepCoursesStatus = 'completed';
				$stepConfirmStatus = 'active';
			break;
		}

		$courses = ['' => 'Choose a course'];
		$courses+= $region->courses->lists('name', 'id');

		return View::make('pages.index')
			->withRegions($this->regions->all())
			->withStep($step)
			->withLocation($location)
			->with('stepInfoStatus', $stepInfoStatus)
			->with('stepCoursesStatus', $stepCoursesStatus)
			->with('stepConfirmStatus', $stepConfirmStatus)
			->withCourses($courses)
			->withRegion($region)
			->withHoles(['9' => 9, '18' => 18, '27' => 27, '36' => 36]);
	}

	public function storeInfo($location)
	{
		// Validate
		
		// Create a new quote record

		// Flash the UID

		return Redirect::route('home', [$location, 'courses']);
	}

	public function storeCourses($location)
	{
		// Store the courses

		// Flash the UID

		return Redirect::route('home', [$location, 'confirm']);
	}

	public function storeConfirm($location)
	{
		// Set the status

		// Redirect to the front
	}

}