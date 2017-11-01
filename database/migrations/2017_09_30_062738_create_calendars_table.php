<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->integer('year')->unsigned();
            $table->integer('month')->unsigned();
            $table->string('theme');
            $table->string('themeC');
            $table->string('layout');
            $table->string('background');
            $table->string('color');
            $table->string('colorYear');
            $table->string('colorWeek');
            $table->string('colorDay');
            $table->text('content');
            $table->timestamps();
            
            // Foreign key to user´s id
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendars');
    }
}
