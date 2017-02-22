<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('academic_level_id')->unsigned();
            $table->string('name');
            $table->string('joined');
            $table->string('completed');
            $table->string('achievement');
            $table->softDeletes();
            $table->timestamps();

            $table->index(['user_id','academic_level_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('academic_level_id')->references('id')->on('academic_levels')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('education_levels');
    }
}
