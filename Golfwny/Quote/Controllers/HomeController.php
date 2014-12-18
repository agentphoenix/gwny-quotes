<?php namespace Quote\Controllers;

use View,
	Event,
	Flash,
	Input,
	Session,
	Redirect,
	QuoteRepositoryInterface,
	RegionRepositoryInterface;
use Quote\Services\QuoteCalculatorService;

class HomeController extends BaseController {

	protected $quotes;
	protected $regions;

	public function __construct(RegionRepositoryInterface $regions,
			QuoteRepositoryInterface $quotes)
	{
		$this->quotes = $quotes;
		$this->regions = $regions;
	}

	public function index($location = false, $step = 'info')
	{
		// Make sure the step is set properly
		$step = ( ! $location) ? 'location' : $step;

		switch ($step)
		{
			case 'location':
				$stepLocationStatus = 'active';
				$stepInfoStatus = 'disabled';
				$stepCoursesStatus = 'disabled';
				$stepConfirmStatus = 'disabled';
				$subview = 'index-location';
			break;

			case 'info':
				$stepLocationStatus = 'completed';
				$stepInfoStatus = 'active';
				$stepCoursesStatus = 'disabled';
				$stepConfirmStatus = 'disabled';
				$subview = 'index-info';
			break;

			case 'courses':
				$stepLocationStatus = 'completed';
				$stepInfoStatus = 'completed';
				$stepCoursesStatus = 'active';
				$stepConfirmStatus = 'disabled';
				$subview = 'index-courses';
			break;

			case 'confirm':
				$stepLocationStatus = 'completed';
				$stepInfoStatus = 'completed';
				$stepCoursesStatus = 'completed';
				$stepConfirmStatus = 'active';
				$subview = 'index-confirm';
			break;
		}

		$region = false;
		$quote = false;
		$courses = ['' => 'Choose a course'];

		if ($step != 'location')
		{
			// Get the region
			$region = $this->regions->findBySlug($location);

			$courses+= $region->courses->lists('name', 'id');
		}

		if ($step == 'courses' or $step == 'confirm')
		{
			$quote = $this->quotes->getByCode(Session::get('code'));
		}

		// Build the subview
		$subview = View::make("pages.{$subview}")
			->withRegions($this->regions->all())
			->withStep($step)
			->withLocation($location)
			->withCourses($courses)
			->withRegion($region)
			->withHoles([18 => '18 holes', 36 => '36 holes'])
			->withTimes(['No Preference' => 'No Preference', 'AM' => 'Morning', 'PM' => 'Afternoon'])
			->withQuote($quote);

		return View::make('pages.index')
			->withRegions($this->regions->all())
			->withStep($step)
			->withLocation($location)
			->with('stepLocationStatus', $stepLocationStatus)
			->with('stepInfoStatus', $stepInfoStatus)
			->with('stepCoursesStatus', $stepCoursesStatus)
			->with('stepConfirmStatus', $stepConfirmStatus)
			->withCourses($courses)
			->withRegion($region)
			->withHoles([18 => '18 holes', 36 => '36 holes'])
			->withTimes(['No Preference' => 'No Preference', 'AM' => 'Morning', 'PM' => 'Afternoon'])
			->withQuote($quote)
			->withView($subview);
	}

	public function storeInfo($location)
	{
		// Validate
		
		// Create a new quote record
		$quote = $this->quotes->create(Input::all());

		// Create a new item for the hotel
		$this->quotes->createHotelQuote($quote);

		// Flash the UID
		Session::flash('code', $quote->code);

		return Redirect::route('home', [$location, 'courses']);
	}

	public function storeCourses($location)
	{
		// Validate

		// Get the quote
		$quote = $this->quotes->getByCode(Input::get('code'));

		// Update the comments
		$this->quotes->update($quote->id, Input::only('comments'));

		// Store the courses
		$this->quotes->createGolfQuote($quote, Input::all());

		// Flash the UID
		Session::flash('code', $quote->code);

		return Redirect::route('home', [$location, 'confirm']);
	}

	public function storeConfirm($location)
	{
		// Get the quote
		$quote = $this->quotes->getByCode(Input::get('code'));

		// Create a new calculator
		$calculator = new QuoteCalculatorService($quote);

		// Update the quote
		$this->quotes->update($quote->id, [
			'status'	=> Status::SUBMITTED,
			'total'		=> $calculator->getTotal(),
			'deposit'	=> $calculator->getDeposit(),
		]);

		return Redirect::route('thank-you', [$quote->code]);
	}

	public function checkStatus()
	{
		return View::make('pages.check-status');
	}

	public function doCheckStatus()
	{
		return Redirect::route('package', [Input::get('code')]);
	}

	public function packageDetails($code)
	{
		$quote = $this->quotes->getByCode($code);

		return View::make('pages.package-details')
			->withQuote($quote);
	}

	public function thankYou()
	{
		return 'Thank you for your quote!';
	}

}