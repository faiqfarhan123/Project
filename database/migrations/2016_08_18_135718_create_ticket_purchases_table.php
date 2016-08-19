<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_purchases', function(Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_id')->unique();
            $table->integer('ticket_buyer_id')->unsigned();
            $table->integer('ticket_type_id')->unsigned();
            $table->integer('quantity')->unsigned();

            $table->foreign('ticket_buyer_id')->references('id')->on('ticket_buyers')->onDelete('cascade');
            $table->foreign('ticket_type_id')->references('id')->on('ticket_types')->onDelete('cascade');

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
        Schema::drop('ticket_purchases');
    }
}
