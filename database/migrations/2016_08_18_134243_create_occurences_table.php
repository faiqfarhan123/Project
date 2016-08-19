<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccurencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function(Blueprint $table) {
            $table->increments('id');
            $table->char('name', 100);
            $table->string('presenter', 100)->nullable();
            $table->date('start_date')->nullable();
            $table->time('start_time')->nullable();
            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();
            $table->date('sales_cut_off_date')->nullable();
            $table->time('sales_cut_off_time')->nullable();
            $table->text('sales_cut_off_message')->nullable();
            $table->binary('flyer')->nullable();
            $table->text('description')->nullable();
            $table->string('hashtag')->nullable();
            $table->string('venue_name')->nullable();

            $table->integer('age_group_id')->unsigned()->nullable();
            $table->integer('event_type_id')->unsigned()->nullable();
            $table->integer('event_category_id')->unsigned()->nullable();
            $table->integer('event_organizer_id')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('age_group_id')->references('id')->on('age_groups')->onDelete('set null');
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('set null');
            $table->foreign('event_category_id')->references('id')->on('event_categories')->onDelete('set null');
            $table->foreign('event_organizer_id')->references('id')->on('event_organizers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}