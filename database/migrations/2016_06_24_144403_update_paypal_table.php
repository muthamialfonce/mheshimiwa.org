<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePaypalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('paypal_payments',function($table){
            $table->string('rate');
            $table->string('payer_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('paypal_payments',function($table){
            $table->dropColumn('rate');
            $table->dropColumn('payer_email');
        });
    }
}
