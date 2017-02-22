<?php

use Illuminate\Database\Seeder;

class AcademicLevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('academic_levels')->delete();
        
        \DB::table('academic_levels')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Primary Level',
                'details' => 'Primary School',
                'user_id' => '1',
                'created_at' => '2016-06-09 06:48:28',
                'updated_at' => '2016-06-09 06:48:28',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Secondary Level',
                'details' => 'high school',
                'user_id' => '1',
                'created_at' => '2016-06-09 06:48:45',
                'updated_at' => '2016-06-09 06:48:45',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Undergraduate',
                'details' => 'university & college',
                'user_id' => '1',
                'created_at' => '2016-06-09 06:49:39',
                'updated_at' => '2016-06-09 06:50:37',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Post Graduate',
                'details' => 'master, phd etc',
                'user_id' => '1',
                'created_at' => '2016-06-09 06:50:18',
                'updated_at' => '2016-06-09 06:50:18',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
