<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithrawalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withrawal_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('method');
            $table->double('amount');
            $table->string('account');
            $table->integer('status');
            $table->string('transaction_code');
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
        Schema::drop('withrawal_requests');
    }
}
