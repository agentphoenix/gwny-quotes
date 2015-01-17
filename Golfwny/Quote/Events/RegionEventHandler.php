<?php namespace Quote\Events;

class RegionEventHandler {

	public function onCreate($region)
	{
		//
	}

	public function onDelete($region)
	{
		// Delete all the hotels for the region
		if ($region->hotels->count() > 0)
		{
			foreach ($region->hotels as $hotel)
			{
				$hotel->delete();
			}
		}

		// Delete all the courses for the region
		if ($region->courses->count() > 0)
		{
			foreach ($region->courses as $course)
			{
				$course->delete();
			}
		}
	}

	public function onUpdate($region)
	{
		//
	}

}