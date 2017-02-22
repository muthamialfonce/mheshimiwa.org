<?php

use Illuminate\Database\Seeder;

class RatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rates')->delete();
        
        \DB::table('rates')->insert(array (
            0 => 
            array (
                'id' => '14',
                'political_seat_id' => '7',
                'user_id' => '1',
                'amount' => '50000',
                'created_at' => '2016-06-24 13:03:14',
                'updated_at' => '2016-06-24 13:03:14',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '15',
                'political_seat_id' => '8',
                'user_id' => '1',
                'amount' => '30000',
                'created_at' => '2016-06-24 13:03:33',
                'updated_at' => '2016-06-24 13:04:15',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => '16',
                'political_seat_id' => '9',
                'user_id' => '1',
                'amount' => '30000',
                'created_at' => '2016-06-24 13:03:41',
                'updated_at' => '2016-06-24 13:03:41',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => '17',
                'political_seat_id' => '10',
                'user_id' => '1',
                'amount' => '20000',
                'created_at' => '2016-06-24 13:03:50',
                'updated_at' => '2016-06-24 13:03:50',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => '18',
                'political_seat_id' => '12',
                'user_id' => '1',
                'amount' => '12000',
                'created_at' => '2016-06-24 13:04:02',
                'updated_at' => '2016-06-24 13:04:02',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
