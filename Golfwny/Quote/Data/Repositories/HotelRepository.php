<?php namespace Quote\Data\Repositories;

use Hotel,
	HotelRepositoryInterface;

class HotelRepository extends BaseRepository implements HotelRepositoryInterface {

	protected $model;

	public function __construct(Hotel $model)
	{
		$this->model = $model;
	}

	public function all()
	{
		return $this->model->orderBy('region_id', 'asc')
			->orderBy('name', 'asc')->get();
	}

	public function create(array $data)
	{
		return $this->model->create($data);
	}

	public function delete($id)
	{
		// Get the hotel
		$hotel = $this->getById($id);

		if ($hotel)
		{
			$hotel->delete();

			return $hotel;
		}

		return false;
	}

	public function update($id, array $data)
	{
		// Get the hotel
		$hotel = $this->getById($id);

		if ($hotel)
		{
			$item = $hotel->fill($data);

			$item->save();

			return $item;
		}

		return false;
	}
	
}