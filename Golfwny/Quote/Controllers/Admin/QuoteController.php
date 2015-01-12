<?php namespace Quote\Controllers\Admin;

use View,
	Input,
	Redirect,
	HotelRepositoryInterface,
	QuoteRepositoryInterface,
	CourseRepositoryInterface,
	QuoteItemRepositoryInterface;
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
			->withQuotes($this->quotes->all());
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

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Get the data
		$data = Input::all();

		// Update the quote
		if ($data['table'] == 'quotes')
			$this->quotes->update($data['id'], [$data['field'] => $data['value']]);
		else
			$this->items->update($data['id'], [$data['field'] => $data['value']]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
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

		return json_encode([
			'price'		=> $newQuote->present()->price,
			'deposit'	=> $newQuote->present()->deposit,
			'pricePerPerson' => $newQuote->present()->pricePerPerson,
		]);
	}

}