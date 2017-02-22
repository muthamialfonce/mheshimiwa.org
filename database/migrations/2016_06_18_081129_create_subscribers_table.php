<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ward_id')->unsigned();
            $table->string('email');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
            $table->index('ward_id');
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('cascade');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subscribers');
    }
}
