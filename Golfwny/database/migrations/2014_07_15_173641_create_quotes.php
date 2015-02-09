<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotes', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('region_id');
			$table->string('code', 12);
			$table->integer('status')->default(1);
			$table->string('name');
			$table->string('email');
			$table->string('phone', 20);
			$table->string('city')->nullable();
			$table->integer('people');
			$table->date('arrival');
			$table->date('departure');
			$table->float('total')->nullable();
			$table->float('deposit')->nullable();
			$table->float('percent_package', 8, 5);
			$table->float('percent_deposit', 8, 5);
			$table->boolean('paid_deposit')->default((int) false);
			$table->boolean('paid_total')->default((int) false);
			$table->text('comments')->nullable();
			$table->text('notes')->nullable();
			$table->timestamp('estimate_accepted')->nullable();
			$table->timestamp('estimate_rejected')->nullable();
			$table->string('estimate_initials', 50)->nullable();
			$table->timestamp('contract_accepted')->nullable();
			$table->timestamp('contract_rejected')->nullable();
			$table->string('contract_initials', 50)->nullable();
			$table->string('square_receipt_number')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('quotes_items', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->bigInteger('quote_id')->unsigned();
			$table->integer('hotel_id')->unsigned()->nullable();
			$table->integer('course_id')->unsigned()->nullable();
			$table->integer('people');
			$table->integer('holes')->nullable();
			$table->string('time_preference');
			$table->float('rate');
			$table->float('replay_rate');
			$table->string('confirmation')->nullable();
			$table->date('arrival')->nullable();
			$table->date('departure')->nullable();
			$table->string('time')->nullable();
			$table->string('time2')->nullable();
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
		Schema::dropIfExists('quotes');
		Schema::dropIfExists('quotes_items');
	}

}
