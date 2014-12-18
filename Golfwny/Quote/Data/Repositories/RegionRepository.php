<?php namespace Quote\Data\Repositories;

use Region,
	RegionRepositoryInterface;

class RegionRepository extends BaseRepository implements RegionRepositoryInterface {

	protected $model;

	public function __construct(Region $model)
	{
		$this->model = $model;
	}

	public function findBySlug($slug)
	{
		return $this->getFirstBy('slug', $slug);
	}
	
}