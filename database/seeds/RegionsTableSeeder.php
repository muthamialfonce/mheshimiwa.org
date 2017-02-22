<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('regions')->delete();
        
        \DB::table('regions')->insert(array (
            0 => 
            array (
                'id' => '1',
                'user_id' => '1',
                'name' => 'CENTRAL',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:26:21',
                'updated_at' => '2016-06-11 12:38:42',
            ),
            1 => 
            array (
                'id' => '2',
                'user_id' => '1',
                'name' => 'COAST',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:26:34',
                'updated_at' => '2016-06-11 12:38:42',
            ),
            2 => 
            array (
                'id' => '3',
                'user_id' => '1',
                'name' => 'EASTERN',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:26:45',
                'updated_at' => '2016-06-11 12:38:42',
            ),
            3 => 
            array (
                'id' => '4',
                'user_id' => '1',
                'name' => 'NAIROBI',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:28:05',
                'updated_at' => '2016-06-11 12:38:42',
            ),
            4 => 
            array (
                'id' => '5',
                'user_id' => '1',
                'name' => 'NORTH EASTERN',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:28:16',
                'updated_at' => '2016-06-11 12:38:42',
            ),
            5 => 
            array (
                'id' => '6',
                'user_id' => '1',
                'name' => 'NYANZA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:28:25',
                'updated_at' => '2016-06-11 12:38:42',
            ),
            6 => 
            array (
                'id' => '7',
                'user_id' => '1',
                'name' => 'RIFT VALLEY',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:29:26',
                'updated_at' => '2016-06-11 12:38:42',
            ),
            7 => 
            array (
                'id' => '8',
                'user_id' => '1',
                'name' => 'WESTERN',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:29:39',
                'updated_at' => '2016-06-11 12:38:42',
            ),
        ));
        
        
    }
}
