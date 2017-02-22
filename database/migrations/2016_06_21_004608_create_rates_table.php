<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('political_seat_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->double('amount');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['political_seat_id','user_id']);
            $table->foreign('political_seat_id') ->references('id')
                ->on('political_seats')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rates');
    }
}
