<?php namespace Quote\Data\Repositories;

use Region,
	RegionRepositoryInterface;

class RegionRepository extends BaseRepository implements RegionRepositoryInterface {

	protected $model;

	public function __construct(Region $model)
	{
		$this->model = $model;
	}

	public function create(array $data)
	{
		return $this->model->create($data);
	}

	public function delete($id)
	{
		// Get the region
		$region = $this->getById($id);

		if ($region)
		{
			$region->delete();

			return $region;
		}
		
		return false;
	}

	public function findBySlug($slug)
	{
		return $this->getFirstBy('slug', $slug);
	}

	public function update($id, array $data)
	{
		// Get the region
		$region = $this->getById($id);

		if ($region)
		{
			$item = $region->fill($data);

			$item->save();

			return $item;
		}

		return false;
	}
	
}