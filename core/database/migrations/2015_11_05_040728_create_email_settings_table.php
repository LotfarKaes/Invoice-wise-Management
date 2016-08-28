<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('email_settings', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->string('uuid', 36)->primary()->unique();
			$table->string('protocol');
			$table->string('smtp_host');
			$table->string('smtp_username');
			$table->string('smtp_password');
			$table->string('smtp_port');
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
		Schema::drop('email_settings');
	}

}
