<?php namespace Quote\Events;

use HotelRepositoryInterface;

class HotelEventHandler {

	protected $hotels;

	public function __construct(HotelRepositoryInterface $hotels)
	{
		$this->hotels = $hotels;
	}

	public function onCreate($hotel)
	{
		//
	}

	public function onDelete($hotel)
	{
		// Check to see if the hotel we're removing is the default. If it is,
		// grab the first hotel we find for the region and set that hotel as
		// the new default
		if ((bool) $hotel->default === true)
		{
			// Get the first hotel for this region
			$item = $this->hotels->getFirstBy('region_id', $hotel->region_id);

			// Update the hotel
			$this->hotels->update($item->id, ['default' => (int) true]);
		}
	}

	public function onUpdate($hotel)
	{
		//
	}

}