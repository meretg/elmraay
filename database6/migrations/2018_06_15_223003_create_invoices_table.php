<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('num');
            $table->date('date');
            $table->float('freight_cost', 8, 2);
            $table->float('other_expenses', 8, 2);
            $table->float('discount', 8, 2);
            $table->float('total', 8, 2);
            $table->float('paid', 8, 2);
            $table->float('debt', 8, 2);
            $table->longText('notes');
            $table->integer('supplier_id')->unsigned();
            $table->timestamps();




            $table->foreign('supplier_id')->references('id')->on('suppliers')
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
        Schema::drop('invoices');
    }
}
