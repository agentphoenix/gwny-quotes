<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surveys', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->bigInteger('quote_id')->unsigned();
			$table->integer('hotel_rating');
			$table->text('hotel_comments')->nullable();
			$table->text('golf_comments')->nullable();
			$table->integer('overall_rating');
			$table->text('overall_comments')->nullable();
			$table->boolean('recommend');
			$table->boolean('use_comments');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('surveys');
	}

}
