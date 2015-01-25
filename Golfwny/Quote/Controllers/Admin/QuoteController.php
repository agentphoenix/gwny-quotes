<?php namespace Quote\Controllers\Admin;

use View,
	Event,
	Input,
	Status,
	Redirect,
	HotelRepositoryInterface,
	QuoteRepositoryInterface,
	CourseRepositoryInterface,
	QuoteItemRepositoryInterface;
use Quote\Controllers\BaseController;
use Quote\Services\QuoteCalculatorService;

class QuoteController extends BaseController {

	protected $items;
	protected $hotels;
	protected $quotes;
	protected $courses;

	public function __construct(QuoteRepositoryInterface $quotes,
			QuoteItemRepositoryInterface $items,
			HotelRepositoryInterface $hotels,
			CourseRepositoryInterface $courses)
	{
		parent::__construct();

		$this->items = $items;
		$this->hotels = $hotels;
		$this->quotes = $quotes;
		$this->courses = $courses;
	}

	public function index()
	{
		return View::make('pages.admin.quotes.all')
			->withHeader("All Quotes")
			->withQuotes($this->quotes->all());
	}

	public function submitted()
	{
		return View::make('pages.admin.quotes.all')
			->withHeader("Quotes Awaiting Review")
			->withQuotes($this->quotes->getByStatus('submitted'));
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
		$quote = $this->quotes->update(Input::get('id'), [
			'status' => Status::toCode(Input::get('status'))
		]);

		Event::fire('quote.status', [$quote]);
	}

}