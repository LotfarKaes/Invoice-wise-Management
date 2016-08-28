<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('payments', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->string('uuid', 36)->primary()->unique();
            $table->string('invoice_id', 36);
            $table->date('payment_date');
            $table->float('amount');
            $table->text('notes');
            $table->string('method', 36);

            $table->foreign('invoice_id')->references('uuid')->on('invoices')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('method')->references('uuid')->on('payment_methods')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('payments');
	}

}
