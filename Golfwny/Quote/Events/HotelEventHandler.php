<?php namespace Quote\Events;

use Hotel, HotelRepositoryInterface;

class HotelEventHandler {

	protected $hotels;

	public function __construct(HotelRepositoryInterface $hotels)
	{
		$this->hotels = $hotels;
	}

	public function onCreate(Hotel $hotel)
	{
		// Update the default hotel
		$this->setDefaultHotel($hotel);
	}

	public function onDelete(Hotel $hotel)
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

	public function onUpdate(Hotel $hotel)
	{
		// Update the default hotel
		$this->setDefaultHotel($hotel);
	}

	protected function setDefaultHotel(Hotel $hotel)
	{
		// Get all the default hotels
		$defaultHotels = $this->hotels->getDefault($hotel->region_id);

		// Only do this if we have multiple default hotels
		if ($defaultHotels->count() > 1)
		{
			foreach ($defaultHotels as $dh)
			{
				// If the hotel is a default but not the one we just set, reset it
				if ((bool) $dh->default === true and $dh->id != $hotel->id)
				{
					$this->hotels->update($dh->id, ['default' => (int) false]);
				}
			}
		}
	}

}