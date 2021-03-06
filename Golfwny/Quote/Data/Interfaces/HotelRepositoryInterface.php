<?php namespace Quote\Data\Interfaces;

interface HotelRepositoryInterface extends BaseRepositoryInterface {

	public function create(array $data);
	public function delete($id);
	public function getDefault($region);
	public function update($id, array $data);
	
}