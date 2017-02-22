<?php

use Illuminate\Database\Seeder;

class CountiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('counties')->delete();
        
        \DB::table('counties')->insert(array (
            0 => 
            array (
                'id' => '1',
                'region_id' => '1',
                'user_id' => '1',
                'name' => 'KIAMBU',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:32:24',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            1 => 
            array (
                'id' => '2',
                'region_id' => '1',
                'user_id' => '1',
                'name' => 'KIRINYAGA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:32:58',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            2 => 
            array (
                'id' => '3',
                'region_id' => '1',
                'user_id' => '1',
                'name' => 'MURANG\'A',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:33:11',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            3 => 
            array (
                'id' => '4',
                'region_id' => '1',
                'user_id' => '1',
                'name' => 'NYANDARUA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:33:55',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            4 => 
            array (
                'id' => '5',
                'region_id' => '1',
                'user_id' => '1',
                'name' => 'NYERI',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:34:23',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            5 => 
            array (
                'id' => '6',
                'region_id' => '2',
                'user_id' => '1',
                'name' => 'KILIFI',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:34:57',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            6 => 
            array (
                'id' => '7',
                'region_id' => '2',
                'user_id' => '1',
                'name' => 'KWALE',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:35:08',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            7 => 
            array (
                'id' => '8',
                'region_id' => '2',
                'user_id' => '1',
                'name' => 'LAMU',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:35:38',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            8 => 
            array (
                'id' => '9',
                'region_id' => '2',
                'user_id' => '1',
                'name' => 'MOMBASA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:36:14',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            9 => 
            array (
                'id' => '10',
                'region_id' => '2',
                'user_id' => '1',
                'name' => 'TAITA-TAVETA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:36:49',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            10 => 
            array (
                'id' => '11',
                'region_id' => '2',
                'user_id' => '1',
                'name' => 'TANA RIVER',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:37:12',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            11 => 
            array (
                'id' => '12',
                'region_id' => '3',
                'user_id' => '1',
                'name' => 'EMBU',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:39:10',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            12 => 
            array (
                'id' => '13',
                'region_id' => '3',
                'user_id' => '1',
                'name' => 'ISIOLO',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:39:20',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            13 => 
            array (
                'id' => '14',
                'region_id' => '3',
                'user_id' => '1',
                'name' => 'KITUI',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:39:31',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            14 => 
            array (
                'id' => '15',
                'region_id' => '3',
                'user_id' => '1',
                'name' => 'MACHAKOS',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:39:54',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            15 => 
            array (
                'id' => '16',
                'region_id' => '3',
                'user_id' => '1',
                'name' => 'MAKUENI',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:40:12',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            16 => 
            array (
                'id' => '17',
                'region_id' => '3',
                'user_id' => '1',
                'name' => 'MARSABIT',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:40:33',
                'updated_at' => '2016-06-11 12:44:39',
            ),
            17 => 
            array (
                'id' => '18',
                'region_id' => '3',
                'user_id' => '1',
                'name' => 'MERU',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:40:45',
                'updated_at' => '2016-06-11 12:44:40',
            ),
            18 => 
            array (
                'id' => '19',
                'region_id' => '3',
                'user_id' => '1',
                'name' => 'THARAKA-NITHI',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 07:41:12',
                'updated_at' => '2016-06-11 12:44:40',
            ),
            19 => 
            array (
                'id' => '20',
                'region_id' => '4',
                'user_id' => '1',
                'name' => 'NAIROBI',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:18:45',
                'updated_at' => '2016-06-11 12:44:40',
            ),
            20 => 
            array (
                'id' => '21',
                'region_id' => '5',
                'user_id' => '1',
                'name' => 'GARISSA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:22:17',
                'updated_at' => '2016-06-11 12:44:40',
            ),
            21 => 
            array (
                'id' => '22',
                'region_id' => '5',
                'user_id' => '1',
                'name' => 'MANDERA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:22:30',
                'updated_at' => '2016-06-11 12:44:40',
            ),
            22 => 
            array (
                'id' => '23',
                'region_id' => '5',
                'user_id' => '1',
                'name' => 'WAJIR',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:22:43',
                'updated_at' => '2016-06-11 12:44:40',
            ),
            23 => 
            array (
                'id' => '24',
                'region_id' => '6',
                'user_id' => '1',
                'name' => 'HOMA BAY',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:23:16',
                'updated_at' => '2016-06-11 12:44:40',
            ),
            24 => 
            array (
                'id' => '25',
                'region_id' => '6',
                'user_id' => '1',
                'name' => 'KISII',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:23:25',
                'updated_at' => '2016-06-11 12:44:40',
            ),
            25 => 
            array (
                'id' => '26',
                'region_id' => '6',
                'user_id' => '1',
                'name' => 'KISUMU',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:23:41',
                'updated_at' => '2016-06-11 12:44:40',
            ),
            26 => 
            array (
                'id' => '27',
                'region_id' => '6',
                'user_id' => '1',
                'name' => 'MIGORI',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:24:10',
                'updated_at' => '2016-06-11 12:44:40',
            ),
            27 => 
            array (
                'id' => '28',
                'region_id' => '6',
                'user_id' => '1',
                'name' => 'NYAMIRA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:24:30',
                'updated_at' => '2016-06-11 12:44:40',
            ),
            28 => 
            array (
                'id' => '29',
                'region_id' => '6',
                'user_id' => '1',
                'name' => 'SIAYA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:24:42',
                'updated_at' => '2016-06-11 12:44:40',
            ),
            29 => 
            array (
                'id' => '30',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'BARINGO',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:26:09',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            30 => 
            array (
                'id' => '31',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'BOMET',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:26:26',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            31 => 
            array (
                'id' => '32',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'ELGEYO-MARAKWET',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:27:41',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            32 => 
            array (
                'id' => '33',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'KAJIADO',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:27:54',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            33 => 
            array (
                'id' => '34',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'KERICHO',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:29:46',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            34 => 
            array (
                'id' => '35',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'LAIKIPIA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:29:58',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            35 => 
            array (
                'id' => '36',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'NAKURU',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:30:09',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            36 => 
            array (
                'id' => '37',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'NANDI',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:30:25',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            37 => 
            array (
                'id' => '38',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'NAROK',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:30:35',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            38 => 
            array (
                'id' => '39',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'SAMBURU',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:30:47',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            39 => 
            array (
                'id' => '40',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'TRANS NZOIA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:31:27',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            40 => 
            array (
                'id' => '41',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'TURKANA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:31:42',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            41 => 
            array (
                'id' => '42',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'UASIN GISHU',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:33:37',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            42 => 
            array (
                'id' => '43',
                'region_id' => '7',
                'user_id' => '1',
                'name' => 'WEST POKOT',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:34:21',
                'updated_at' => '2016-06-11 12:44:41',
            ),
            43 => 
            array (
                'id' => '44',
                'region_id' => '8',
                'user_id' => '1',
                'name' => 'BUNGOMA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:34:47',
                'updated_at' => '2016-06-11 12:44:42',
            ),
            44 => 
            array (
                'id' => '45',
                'region_id' => '8',
                'user_id' => '1',
                'name' => 'BUSIA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:35:01',
                'updated_at' => '2016-06-11 12:44:42',
            ),
            45 => 
            array (
                'id' => '46',
                'region_id' => '8',
                'user_id' => '1',
                'name' => 'KAKAMEGA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:35:18',
                'updated_at' => '2016-06-11 12:44:42',
            ),
            46 => 
            array (
                'id' => '47',
                'region_id' => '8',
                'user_id' => '1',
                'name' => 'VIHIGA',
                'deleted_at' => NULL,
                'created_at' => '2016-06-11 08:36:19',
                'updated_at' => '2016-06-11 12:44:42',
            ),
        ));
        
        
    }
}
