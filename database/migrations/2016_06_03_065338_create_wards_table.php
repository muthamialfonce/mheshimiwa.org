<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('constituency_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['constituency_id','user_id']);
            $table->foreign('constituency_id')
                ->references('id')
                ->on('constituencies')
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
        Schema::drop('wards');
    }
}
