<?php namespace Quote\Data\Interfaces;

interface QuoteItemRepositoryInterface extends BaseRepositoryInterface {

	public function create(array $data);
	public function update($id, array $data);
	
}