<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('political_party_id')->unsigned();
            $table->integer('political_seat_id')->unsigned();
            $table->integer('year');
            $table->integer('ended');
            $table->integer('won');
            $table->integer('status');
            $table->longText('comments');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['political_party_id','user_id']);
            $table->index(['political_seat_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('political_party_id')->references('id')->on('political_parties')->onDelete('cascade');
            $table->foreign('political_seat_id')->references('id')->on('political_seats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('politics');
    }
}
