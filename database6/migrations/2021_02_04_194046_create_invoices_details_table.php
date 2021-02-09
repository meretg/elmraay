<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('invoices_details', function (Blueprint $table) {
            $table->increments('id');
            $table->float('unit_price', 8, 2);
            $table->float('quantity', 8, 2);
            $table->float('total_item_price', 8, 2);

            $table->integer('invoice_id')->unsigned();
            $table->integer('item_id')->unsigned();

            $table->timestamps();




            $table->foreign('supplier_id')->references('id')->on('items')
                ->onUpdate('cascade')->onDelete('cascade');

                $table->foreign('supplier_id')->references('id')->on('invoices')
                    ->onUpdate('cascade')->onDelete('cascade');






        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('invoices_details');

    }
}
