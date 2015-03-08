<?php

class ItemSeeder extends Seeder {

	public function run()
	{
		// Regions
		$regions = [
			['name' => 'Rochester', 'slug' => ''],
			['name' => 'Buffalo', 'slug' => ''],
		];

		// Courses
		$courses = [
			[
				'region_id' => 1,
				'name' => "Ravenwood Golf Club",
				'address' => "929 Lynaugh Rd.\r\nVictor, NY 14564",
				'phone' => "585-924-5100",
				'general_manager' => "Mike Roeder",
				'rate' => 65.00,
				'replay_rate' => 35.00
			],
			[
				'region_id' => 1,
				'name' => "Mill Creek Golf Club",
				'address' => "128 Cedars Ave.\r\nChurchville, NY 14428",
				'phone' => "585-889-4110",
				'general_manager' => "Steve Nally",
				'rate' => 49.00,
				'replay_rate' => 25.00
			],
			[
				'region_id' => 1,
				'name' => "Greystone Golf Club",
				'address' => "1400 Atlantic Ave.\r\nWalworth, NY 14568",
				'phone' => "585-234-4653",
				'general_manager' => "Bill Middlebrook",
				'rate' => 60.00,
				'replay_rate' => 25.00
			],
			[
				'region_id' => 1,
				'name' => "Wildwood Golf Club",
				'address' => "",
				'phone' => "",
				'general_manager' => "",
				'rate' => 45.00,
				'replay_rate' => 20.00
			],
			[
				'region_id' => 1,
				'name' => "FarView Golf Club",
				'address' => "",
				'phone' => "",
				'general_manager' => "",
				'rate' => 30.00,
				'replay_rate' => 15.00
			],

			[
				'region_id' => 2,
				'name' => "Harvest Hill Golf Club",
				'address' => "",
				'phone' => "",
				'general_manager' => "",
				'rate' => 75.00
			],
			[
				'region_id' => 2,
				'name' => "The Links at Ivy Ridge",
				'address' => "",
				'phone' => "",
				'general_manager' => "",
				'rate' => 49.00
			],
			[
				'region_id' => 2,
				'name' => "Diamond Hawk Golf Club",
				'address' => "",
				'phone' => "",
				'general_manager' => "",
				'rate' => 60.00
			],
			[
				'region_id' => 2,
				'name' => "Rothland Golf Club",
				'address' => "",
				'phone' => "",
				'general_manager' => "",
				'rate' => 39.00
			],
		];

		// Hotels
		$hotels = [
			[
				'region_id' => 1,
				'name' => "Holiday Inn Hotel &amp; Suites",
				'address' => "",
				'phone' => "",
				'general_manager' => "",
				'rate' => 119.00,
				'tax_rate' => 14.00
			],
			[
				'region_id' => 1,
				'name' => "Best Western Plus Victor Inn &amp; Suites",
				'address' => "7502 Main Street Fishers\r\nVictor, NY 14564",
				'phone' => "585-672-2100",
				'general_manager' => "Robert Bennett",
				'rate' => 85.00,
				'tax_rate' => 11.00,
				'default' => 1
			],

			[
				'region_id' => 2,
				'name' => "Salvatore's Garden Palace Hotel",
				'address' => "",
				'phone' => "",
				'general_manager' => "",
				'rate' => 129.00,
				'tax_rate' => 0.00
			],
			[
				'region_id' => 2,
				'name' => "Comfort Suites Downtown",
				'address' => "",
				'phone' => "",
				'general_manager' => "",
				'rate' => 85.00,
				'tax_rate' => 0.00,
				'default' => 1
			],
		];

		foreach ($regions as $region)
		{
			Region::create($region);
		}

		foreach ($courses as $course)
		{
			Course::create($course);
		}

		foreach ($hotels as $hotel)
		{
			Hotel::create($hotel);
		}
	}

}