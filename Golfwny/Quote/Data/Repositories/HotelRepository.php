<?php namespace Quote\Data\Repositories;

use Hotel,
	HotelRepositoryInterface;

class HotelRepository extends BaseRepository implements HotelRepositoryInterface {

	protected $model;

	public function __construct(Hotel $model)
	{
		$this->model = $model;
	}
	
}