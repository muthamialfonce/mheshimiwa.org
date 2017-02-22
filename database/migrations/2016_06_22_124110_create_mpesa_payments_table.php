<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpesaPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('account_number');
            $table->string('business_number');
            $table->string('currency');
            $table->string('amount');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('sender_phone');
            $table->string('transaction_type');
            $table->string('internal_transaction_id')->unique();
            $table->string('transaction_reference')->unique();
            $table->string('transaction_timestamp');
            $table->string('service_name');
            $table->softDeletes();
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
        Schema::drop('mpesa_payments');
    }
}
