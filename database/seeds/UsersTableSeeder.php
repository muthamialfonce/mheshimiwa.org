<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'ian kibet',
                'role' => 'admin',
                'gender' => 'male',
                'phone' => '',
                'email' => 'kibethosea8@gmail.com',
                'password' => '$2y$10$IiT3jgaax7JRLAAhoBRbseGoOQtxxeM5YCK0zdAJboPHmIqczspWm',
                'image' => '/uploads/2016/Jun/11/1465614151_ianoffice1.jpg',
                'remember_token' => 'klY6MtCIPJsnpaymu74dWRz6Z3uOLkhYzzewiuwZ3CcAHeb4lecPaxvzJQAM',
                'deleted_at' => NULL,
                'created_at' => '2016-06-09 09:42:06',
                'updated_at' => '2016-06-21 08:00:46',
                'approved' => '0',
            ),
        ));
        
        
    }
}
