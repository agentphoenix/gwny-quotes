<?php namespace Quote\Data\Interfaces;

use Quote;

interface QuoteRepositoryInterface extends BaseRepositoryInterface {

	public function create(array $data);
	public function createHotelQuote(Quote $quote);
	public function createGolfQuote(Quote $quote, array $data);
	public function getByCode($code);
	public function update($id, array $data);
	
}