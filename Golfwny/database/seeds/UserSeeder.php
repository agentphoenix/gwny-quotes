<?php

class UserSeeder extends Seeder {

	public function run()
	{
		User::create([
			'name'		=> 'David VanScott',
			'email'		=> 'david.vanscott@gmail.com',
			'password'	=> 'password',
		]);
	}

}