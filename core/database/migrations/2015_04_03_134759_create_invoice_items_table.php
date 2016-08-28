<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('invoice_items', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->string('uuid', 36)->primary()->unique();
            $table->string('invoice_id', 36);
            $table->string('item_name');
            $table->text('item_description');
            $table->float('quantity');
            $table->double('price', 15, 2);
            $table->string('tax_id', 36)->nullable();

            $table->foreign('invoice_id')->references('uuid')->on('invoices')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tax_id')->references('uuid')->on('tax_settings')->onDelete('cascade')->onUpdate('cascade');

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
		Schema::drop('invoice_items');
	}

}
