<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
            $table->string('uuid', 36)->primary()->unique();
            $table->string('client_id', 36);
            $table->string('number')->unique();
            $table->date('invoice_date');
            $table->date('due_date');
            $table->integer('status');
            $table->float('discount');
            $table->text('terms');
            $table->text('notes');
            $table->string('currency');

            $table->foreign('client_id')->references('uuid')->on('clients')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
		// then I add the increment_num "manually"
		DB::statement('ALTER Table invoices add increment_num INTEGER NOT NULL UNIQUE AUTO_INCREMENT;');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices');
	}

}
