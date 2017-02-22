<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstituenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constituencies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('county_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['county_id','user_id']);
            $table->foreign('county_id') ->references('id')
                ->on('counties')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('constituencies');
    }
}
