<?php

use Illuminate\Database\Seeder;

class PoliticalSeatsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('political_seats')->delete();
        
        \DB::table('political_seats')->insert(array (
            0 => 
            array (
                'id' => '7',
                'user_id' => '1',
                'political_level_id' => '5',
                'name' => 'President',
                'description' => 'President',
                'rank' => '1',
                'deleted_at' => NULL,
                'created_at' => '2016-06-24 13:01:26',
                'updated_at' => '2016-06-24 13:01:26',
            ),
            1 => 
            array (
                'id' => '8',
                'user_id' => '1',
                'political_level_id' => '6',
                'name' => 'Senator',
                'description' => 'senator',
                'rank' => '2',
                'deleted_at' => NULL,
                'created_at' => '2016-06-24 13:01:46',
                'updated_at' => '2016-06-24 13:01:46',
            ),
            2 => 
            array (
                'id' => '9',
                'user_id' => '1',
                'political_level_id' => '6',
                'name' => 'Governor',
                'description' => 'Governor',
                'rank' => '3',
                'deleted_at' => NULL,
                'created_at' => '2016-06-24 13:01:58',
                'updated_at' => '2016-06-24 13:01:58',
            ),
            3 => 
            array (
                'id' => '10',
                'user_id' => '1',
                'political_level_id' => '7',
                'name' => 'MP',
                'description' => 'Member of Parliament',
                'rank' => '4',
                'deleted_at' => NULL,
                'created_at' => '2016-06-24 13:02:19',
                'updated_at' => '2016-06-24 13:02:19',
            ),
            4 => 
            array (
                'id' => '11',
                'user_id' => '1',
                'political_level_id' => '8',
                'name' => 'MCA',
                'description' => 'MCA',
                'rank' => '6',
                'deleted_at' => NULL,
                'created_at' => '2016-06-24 13:02:33',
                'updated_at' => '2016-06-24 13:02:33',
            ),
            5 => 
            array (
                'id' => '12',
                'user_id' => '1',
                'political_level_id' => '8',
                'name' => 'Women Representative',
                'description' => '
Women representative',
                'rank' => '6',
                'deleted_at' => NULL,
                'created_at' => '2016-06-24 13:02:53',
                'updated_at' => '2016-06-24 13:02:53',
            ),
        ));
        
        
    }
}
