<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('settings', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->string('uuid', 36)->primary()->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country');
            $table->string('contact');
            $table->string('vat');
            $table->string('website');
            $table->string('logo');
            $table->string('favicon');
            $table->string('date_format');
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
        Schema::drop('settings');
	}

}
