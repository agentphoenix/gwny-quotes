<?php

class ItemSeeder extends Seeder {

	public function run()
	{
		// Regions
		$regions = [
			['name' => 'Rochester', 'slug' => ''],
			['name' => 'Buffalo', 'slug' => ''],
			['name' => 'Silver Lake Resort', 'slug' => ''],
		];

		// Courses
		$courses = [
			['region_id' => 1, 'name' => "Ravenwood Golf Club", 'rate' => 75.00],
			['region_id' => 1, 'name' => "Mill Creek Golf Club", 'rate' => 49.00],
			['region_id' => 1, 'name' => "Greystone Golf Club", 'rate' => 60.00],
			['region_id' => 1, 'name' => "Blue Heron Hills Golf Club", 'rate' => 39.00],
			['region_id' => 1, 'name' => "FarView Golf Club", 'rate' => 29.00],

			['region_id' => 2, 'name' => "Harvest Hill Golf Club", 'rate' => 75.00],
			['region_id' => 2, 'name' => "The Links at Ivy Ridge", 'rate' => 49.00],
			['region_id' => 2, 'name' => "Diamond Hawk Golf Club", 'rate' => 60.00],
			['region_id' => 2, 'name' => "Rothland Golf Club", 'rate' => 39.00],

			['region_id' => 3, 'name' => "Silver Lake Golf Club", 'rate' => 99.00],
		];

		// Hotels
		$hotels = [
			['region_id' => 1, 'name' => "Holiday Inn Hotel &amp; Suites", 'rate' => 129.00],
			['region_id' => 1, 'name' => "Best Western Plus Victor Inn &amp; Suites", 'rate' => 85.00, 'default' => 1],

			['region_id' => 2, 'name' => "Salvatore's Garden Palace Hotel", 'rate' => 129.00],
			['region_id' => 2, 'name' => "Comfort Suites Downtown", 'rate' => 85.00, 'default' => 1],

			['region_id' => 3, 'name' => "Silver Lake Resort", 'rate' => 99.00, 'default' => 1],
		];

		foreach ($regions as $region)
		{
			RegionModel::create($region);
		}

		foreach ($courses as $course)
		{
			CourseModel::create($course);
		}

		foreach ($hotels as $hotel)
		{
			HotelModel::create($hotel);
		}
	}

}