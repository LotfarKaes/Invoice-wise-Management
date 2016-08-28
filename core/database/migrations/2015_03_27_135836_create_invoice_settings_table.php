<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_settings', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
            $table->string('uuid', 36)->primary()->unique();
            $table->integer('start_number');
            $table->text('terms');
            $table->integer('due_days');
            $table->string('logo');
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
		Schema::drop('invoice_settings');
	}

}
