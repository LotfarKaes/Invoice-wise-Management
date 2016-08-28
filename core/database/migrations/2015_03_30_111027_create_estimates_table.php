<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estimates', function(Blueprint $table)
		{
            $table->string('uuid', 36)->primary()->unique();
            $table->string('client_id', 36);
            $table->string('estimate_no')->unique();
            $table->date('estimate_date');
            $table->string('currency');
            $table->text('notes');
            $table->text('terms');

            $table->engine = 'InnoDB';
            $table->foreign('client_id')->references('uuid')->on('clients')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
		// then I add the increment_num "manually"
		DB::statement('ALTER Table estimates add increment_num INTEGER NOT NULL UNIQUE AUTO_INCREMENT;');
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estimates');
	}

}
