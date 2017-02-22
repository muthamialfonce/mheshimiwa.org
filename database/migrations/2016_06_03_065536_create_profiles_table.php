<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('region_id')->unsigned();
            $table->integer('county_id') ->unsigned();
            $table->integer('constituency_id')->unsigned();
            $table->integer('ward_id')->unsigned();
            $table->string('fname');
            $table->string('lname');
            $table->string('surname');
            $table->integer('id_number');
            $table->date('dob');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['user_id','region_id','ward_id']);
            $table->index(['county_id','constituency_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
            $table->foreign('constituency_id')->references('id')->on('constituencies')->onDelete('cascade');
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }
}
