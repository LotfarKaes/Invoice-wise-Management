<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumberSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('number_settings', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
            $table->string('uuid', 36)->primary()->unique();
            $table->string('invoice_number');
            $table->string('client_number');
            $table->string('estimate_number');
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
		Schema::drop('number_settings');
	}

}
