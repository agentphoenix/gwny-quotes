<?php namespace Quote\Data\Interfaces;

use Quote;

interface QuoteRepositoryInterface extends BaseRepositoryInterface {

	public function countActive();
	public function countByStatus(array $conditions);
	public function create(array $data);
	public function createHotelQuote(Quote $quote);
	public function createGolfQuote(Quote $quote, array $data);
	public function getActive();
	public function getByCode($code);
	public function getByStatus($status);
	public function update($id, array $data);
	
}