<?php namespace Quote\Controllers;

use View,
	Input,
	Redirect,
	QuoteRepositoryInterface;

class QuoteController extends BaseController {

	protected $quotes;

	public function __construct(QuoteRepositoryInterface $quotes)
	{
		parent::__construct();

		$this->quotes = $quotes;
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
			->withHotels($quote->region->hotels->lists('name', 'id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

}