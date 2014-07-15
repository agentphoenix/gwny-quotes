<?php namespace Golfwny\Quote\Data\Repositories\Eloquent;

use RegionModel;

class RegionRepository implements \RegionRepositoryInterface {

	public function all()
	{
		return RegionModel::all();
	}

	public function findBySlug($slug)
	{
		return RegionModel::where('slug', $slug)->first();
	}
	
}