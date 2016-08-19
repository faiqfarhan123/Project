<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_types', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('price_type', array('Free', 'Paid'));
            $table->integer('inventory')->unsigned();
            $table->integer('event_info_id')->unsigned();
            $table->integer('price')->unsigned()->default(0);

            $table->foreign('event_info_id')->references('id')->on('events')->onDelete('cascade');
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
        Schema::drop('ticket_types');
    }
}
