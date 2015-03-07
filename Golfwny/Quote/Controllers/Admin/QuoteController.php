<?php namespace Quote\Controllers\Admin;

use Date,
	View,
	Event,
	Flash,
	Input,
	Status,
	Redirect,
	Paginator,
	HotelRepositoryInterface,
	QuoteRepositoryInterface,
	CourseRepositoryInterface,
	SurveyRepositoryInterface,
	QuoteItemRepositoryInterface;
use Quote\Controllers\BaseController;
use Quote\Services\QuoteCalculatorService;

class QuoteController extends BaseController {

	protected $items;
	protected $hotels;
	protected $quotes;
	protected $courses;
	protected $surveys;

	public function __construct(QuoteRepositoryInterface $quotes,
			QuoteItemRepositoryInterface $items,
			HotelRepositoryInterface $hotels,
			CourseRepositoryInterface $courses,
			SurveyRepositoryInterface $surveys)
	{
		parent::__construct();

		$this->items = $items;
		$this->hotels = $hotels;
		$this->quotes = $quotes;
		$this->courses = $courses;
		$this->surveys = $surveys;
	}

	public function index()
	{
		// Find all the mods
		$data = $this->quotes->getByPage(Input::get('page', 1), 25, ['items'], 'arrival|desc');

		// Build the paginator
		$paginator = Paginator::make($data->items, $data->totalItems, 25);

		return View::make('pages.admin.quotes.all')
			->withHeader("All Quotes")
			->withQuotes($paginator);
	}

	public function submitted()
	{
		return View::make('pages.admin.quotes.all')
			->withHeader("Quotes Awaiting Review")
			->withQuotes($this->quotes->getByStatus('submitted'));
	}

	public function active()
	{
		return View::make('pages.admin.quotes.all')
			->withHeader("Active Quotes")
			->withQuotes($this->quotes->getActive());
	}

	public function accepted()
	{
		return View::make('pages.admin.quotes.all')
			->withHeader("Accepted Quotes")
			->withQuotes($this->quotes->getByStatus('accepted'));
	}

	public function rejected()
	{
		return View::make('pages.admin.quotes.all')
			->withHeader("Rejected Quotes")
			->withQuotes($this->quotes->getByStatus('rejected'));
	}

	public function edit($id)
	{
		// Get the quote
		$quote = $this->quotes->getById($id);

		return View::make('pages.admin.quotes.edit')
			->withQuote($quote)
			->withHotels($quote->region->hotels->lists('name', 'id'))
			->with('golfCourses', $quote->region->courses->lists('name', 'id'));
	}

	public function update($id)
	{
		// Get the data
		$data = Input::all();

		// Update the quote
		if ($data['table'] == 'quotes')
		{
			$quote = $this->quotes->update($data['id'], [$data['field'] => $data['value']]);
		}
		else
		{
			$item = $this->items->update($data['id'], [$data['field'] => $data['value']]);
			$quote = $item->quote;
		}

		Event::fire('quote.updated', [$quote]);
	}

	public function destroy($id)
	{
		Event::fire('quote.deleted', []);
	}

	public function getCourse($id)
	{
		// Get the course
		$course = $this->courses->getById($id);

		return json_encode($course->toArray());
	}

	public function getHotel($id)
	{
		// Get the hotel
		$hotel = $this->hotels->getById($id);

		return json_encode($hotel->toArray());
	}

	public function recalculatePrice($id)
	{
		// Get the quote
		$quote = $this->quotes->getById($id);

		// Create a new calculator
		$calculator = new QuoteCalculatorService($quote);

		// Update the quote
		$newQuote = $this->quotes->update($quote->id, [
			'total'		=> $calculator->getTotal(),
			'deposit'	=> $calculator->getDeposit(),
		]);

		Event::fire('quote.calculated', [$newQuote]);

		return json_encode([
			'price'		=> $newQuote->present()->price,
			'deposit'	=> $newQuote->present()->deposit,
			'pricePerPerson' => $newQuote->present()->pricePerPerson,
		]);
	}

	public function changeStatus()
	{
		// Grab the status
		$status = Status::toCode(Input::get('status'));

		$updateData['status'] = $status;

		if ($status == Status::ESTIMATE_ACCEPTED)
		{
			$updateData['estimate_accepted'] = Date::now();
			$updateData['estimate_rejected'] = null;
			$updateData['estimate_initials'] = Input::get('initials');
		}

		if ($status == Status::ESTIMATE_REJECTED)
		{
			$updateData['estimate_rejected'] = Date::now();
			$updateData['estimate_accepted'] = null;
			$updateData['estimate_initials'] = Input::get('initials');
		}

		if ($status == Status::CONTRACT_ACCEPTED)
		{
			$updateData['contract_accepted'] = Date::now();
			$updateData['contract_rejected'] = null;
			$updateData['contract_initials'] = Input::get('initials');
		}

		if ($status == Status::CONTRACT_REJECTED)
		{
			$updateData['contract_rejected'] = Date::now();
			$updateData['contract_accepted'] = null;
			$updateData['contract_initials'] = Input::get('initials');
		}

		// Update the quote
		$quote = $this->quotes->update(Input::get('id'), $updateData);

		// Set the flash message
		Flash::success("Quote has been updated!");

		Event::fire('quote.status', [$quote]);
	}

	public function addCourse()
	{
		// Get the quote
		$quote = $this->quotes->getByCode(Input::get('quote'));

		// Get the last course in the quote
		$lastCourse = $quote->getCourses()->last();

		$this->items->create([
			'quote_id'			=> $quote->id,
			'course_id'			=> $lastCourse->course_id,
			'people'			=> $lastCourse->people,
			'holes'				=> $lastCourse->holes,
			'time_preference'	=> $lastCourse->time_preference,
			'rate'				=> $lastCourse->rate,
			'replay_rate'		=> $lastCourse->replay_rate,
		]);
	}

	public function surveyResults($code)
	{
		$quote = $this->quotes->getByCode($code);

		return View::make('pages.admin.quotes.surveys')
			->withQuote($quote)
			->withResults($quote->surveys);
	}

}