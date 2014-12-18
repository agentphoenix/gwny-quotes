<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('region_id')->unsigned();
			$table->string('name');
			$table->float('rate');
			$table->float('replay_rate');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('hotels', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('region_id')->unsigned();
			$table->string('name');
			$table->float('rate');
			$table->boolean('default')->default((int) false);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('regions');
		Schema::dropIfExists('courses');
		Schema::dropIfExists('hotels');
	}

}
