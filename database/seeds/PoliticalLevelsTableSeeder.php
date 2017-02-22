<?php

use Illuminate\Database\Seeder;

class PoliticalLevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('political_levels')->delete();
        
        \DB::table('political_levels')->insert(array (
            0 => 
            array (
                'id' => '5',
                'user_id' => '1',
                'name' => 'National',
                'description' => 'National Level',
                'rank' => '1',
                'deleted_at' => NULL,
                'created_at' => '2016-06-24 13:00:18',
                'updated_at' => '2016-06-24 13:00:18',
            ),
            1 => 
            array (
                'id' => '6',
                'user_id' => '1',
                'name' => 'County',
                'description' => 'county level',
                'rank' => '2',
                'deleted_at' => NULL,
                'created_at' => '2016-06-24 13:00:35',
                'updated_at' => '2016-06-24 13:00:35',
            ),
            2 => 
            array (
                'id' => '7',
                'user_id' => '1',
                'name' => 'Constituency',
                'description' => 'Constituency',
                'rank' => '3',
                'deleted_at' => NULL,
                'created_at' => '2016-06-24 13:00:50',
                'updated_at' => '2016-06-24 13:00:50',
            ),
            3 => 
            array (
                'id' => '8',
                'user_id' => '1',
                'name' => 'Ward',
                'description' => 'Ward',
                'rank' => '4',
                'deleted_at' => NULL,
                'created_at' => '2016-06-24 13:01:03',
                'updated_at' => '2016-06-24 13:01:03',
            ),
        ));
        
        
    }
}
