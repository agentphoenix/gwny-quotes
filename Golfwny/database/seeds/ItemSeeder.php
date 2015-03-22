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
				'address' => "128 Cedars Avenue\r\nChurchville, NY 14428",
				'phone' => "585-889-4110",
				'general_manager' => "Steve Nally",
				'rate' => 49.00,
				'replay_rate' => 25.00
			],
			[
				'region_id' => 1,
				'name' => "Greystone Golf Club",
				'address' => "1400 Atlantic Avenue\r\nWalworth, NY 14568",
				'phone' => "1-800-810-2325",
				'general_manager' => "Bill Middlebrook",
				'rate' => 60.00,
				'replay_rate' => 25.00
			],
			[
				'region_id' => 1,
				'name' => "Wildwood Golf Club",
				'address' => "1201 Rush West Rush Road\r\nRush, NY 14543",
				'phone' => "585-334-5860",
				'general_manager' => "Mike Sweazy",
				'rate' => 45.00,
				'replay_rate' => 20.00
			],
			[
				'region_id' => 1,
				'name' => "FarView Golf Club",
				'address' => "2419 Avon Geneseo Road\r\nAvon, NY 14414",
				'phone' => "585-226-8210",
				'general_manager' => "Jim Millar",
				'rate' => 30.00,
				'replay_rate' => 15.00
			],

			[
				'region_id' => 2,
				'name' => "Harvest Hill Golf Club",
				'address' => "3052 Transit Road\r\nOrchard Park, NY 14127",
				'phone' => "716-662-1980",
				'general_manager' => "Josh Wojtaszczyk",
				'rate' => 59.00,
				'replay_rate' => 35.00
			],
			[
				'region_id' => 2,
				'name' => "The Links at Ivy Ridge",
				'address' => "12089 Main Road\r\nAkron, NY 14001",
				'phone' => "716-542-6342",
				'general_manager' => "Jim Fisk",
				'rate' => 55.00,
				'replay_rate' => 30.00
			],
			[
				'region_id' => 2,
				'name' => "Diamond Hawk Golf Club",
				'address' => "255 Sonwil Drive\r\nCheektowaga, NY 14225",
				'phone' => "716-651-0700",
				'general_manager' => "Andy Mummey",
				'rate' => 59.00,
				'replay_rate' => 35.00
			],
			[
				'region_id' => 2,
				'name' => "Rothland Golf Club",
				'address' => "12089 Clarence Center Road\r\nAkron, NY 14001",
				'phone' => "716-542-4325",
				'general_manager' => "Chris Carroll",
				'rate' => 35.00,
				'replay_rate' => 20.00
			],
			[
				'region_id' => 2,
				'name' => "Seneca Hickory Stick",
				'address' => "4560 Creek Road\r\nLewiston, NY 14092",
				'phone' => "716-754-2424",
				'general_manager' => "Jason Moravec",
				'rate' => 72.00,
				'replay_rate' => 37.00
			],
		];

		// Hotels
		$hotels = [
			[
				'region_id' => 1,
				'name' => "Holiday Inn Hotel &amp; Suites",
				'address' => "800 Jefferson Road\r\nRochester, NY 14623",
				'phone' => "585-475-9191",
				'general_manager' => "Manoj Patel",
				'rate' => 119.00,
				'tax_rate' => 14.00
			],
			[
				'region_id' => 1,
				'name' => "Best Western Plus Victor Inn &amp; Suites",
				'address' => "7449 Route 96\r\nVictor, NY 14564",
				'phone' => "585-924-3933",
				'general_manager' => "Patrick Hansen",
				'rate' => 85.00,
				'tax_rate' => 11.00,
				'default' => 1
			],

			[
				'region_id' => 2,
				'name' => "Salvatore's Garden Palace Hotel",
				'address' => "6615 Transit Road\r\nWilliamsville, NY 14221",
				'phone' => "716-635-9000",
				'general_manager' => "Jeanine Panzica",
				'rate' => 150.00,
				'tax_rate' => 0.00
			],
			[
				'region_id' => 2,
				'name' => "Comfort Suites Downtown",
				'address' => "601 Main Street\r\nBuffalo, NY 14203",
				'phone' => "716-854-5500",
				'general_manager' => "Matt Spencer",
				'rate' => 99.00,
				'tax_rate' => 12.75,
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