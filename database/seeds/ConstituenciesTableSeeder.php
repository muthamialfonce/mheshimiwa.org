<?php

use Illuminate\Database\Seeder;

class ConstituenciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('constituencies')->delete();
        
        \DB::table('constituencies')->insert(array (
            0 => 
            array (
                'id' => '10',
                'county_id' => '9',
                'user_id' => '1',
                'name' => 'CHANGAMWE',
                'created_at' => '2016-06-11 20:53:56',
                'updated_at' => '2016-06-11 20:53:56',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '11',
                'county_id' => '9',
                'user_id' => '1',
                'name' => 'JOMVU',
                'created_at' => '2016-06-11 20:53:56',
                'updated_at' => '2016-06-11 20:53:56',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => '12',
                'county_id' => '9',
                'user_id' => '1',
                'name' => 'KISAUNI',
                'created_at' => '2016-06-11 20:53:56',
                'updated_at' => '2016-06-11 20:53:56',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => '13',
                'county_id' => '9',
                'user_id' => '1',
                'name' => 'NYALI',
                'created_at' => '2016-06-11 20:53:56',
                'updated_at' => '2016-06-11 20:53:56',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => '14',
                'county_id' => '9',
                'user_id' => '1',
                'name' => 'LIKONI',
                'created_at' => '2016-06-11 20:53:56',
                'updated_at' => '2016-06-11 20:53:56',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => '15',
                'county_id' => '9',
                'user_id' => '1',
                'name' => 'MVITA',
                'created_at' => '2016-06-11 20:53:56',
                'updated_at' => '2016-06-11 20:53:56',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => '16',
                'county_id' => '7',
                'user_id' => '1',
                'name' => 'MSAMBWENI',
                'created_at' => '2016-06-11 20:53:56',
                'updated_at' => '2016-06-11 20:53:56',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => '17',
                'county_id' => '7',
                'user_id' => '1',
                'name' => 'LUNGA LUNGA',
                'created_at' => '2016-06-11 20:53:56',
                'updated_at' => '2016-06-11 20:53:56',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => '18',
                'county_id' => '7',
                'user_id' => '1',
                'name' => 'MATUGA',
                'created_at' => '2016-06-11 20:53:56',
                'updated_at' => '2016-06-11 20:53:56',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => '19',
                'county_id' => '7',
                'user_id' => '1',
                'name' => 'KINAGO',
                'created_at' => '2016-06-11 20:53:57',
                'updated_at' => '2016-06-11 20:53:57',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => '20',
                'county_id' => '6',
                'user_id' => '1',
                'name' => 'KILIFI NORTH',
                'created_at' => '2016-06-11 20:53:57',
                'updated_at' => '2016-06-11 20:53:57',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => '21',
                'county_id' => '6',
                'user_id' => '1',
                'name' => 'KILIFI SOUTH',
                'created_at' => '2016-06-11 20:53:57',
                'updated_at' => '2016-06-11 20:53:57',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => '22',
                'county_id' => '6',
                'user_id' => '1',
                'name' => 'KALOLENI',
                'created_at' => '2016-06-11 20:53:57',
                'updated_at' => '2016-06-11 20:53:57',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => '23',
                'county_id' => '6',
                'user_id' => '1',
                'name' => 'RABAI',
                'created_at' => '2016-06-11 20:53:57',
                'updated_at' => '2016-06-11 20:53:57',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => '24',
                'county_id' => '6',
                'user_id' => '1',
                'name' => 'GANZE',
                'created_at' => '2016-06-11 20:53:57',
                'updated_at' => '2016-06-11 20:53:57',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => '25',
                'county_id' => '6',
                'user_id' => '1',
                'name' => 'MALINDI',
                'created_at' => '2016-06-11 20:53:57',
                'updated_at' => '2016-06-11 20:53:57',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => '26',
                'county_id' => '6',
                'user_id' => '1',
                'name' => 'MAGARINI',
                'created_at' => '2016-06-11 20:53:57',
                'updated_at' => '2016-06-11 20:53:57',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => '27',
                'county_id' => '11',
                'user_id' => '1',
                'name' => 'GARSEN',
                'created_at' => '2016-06-11 20:53:57',
                'updated_at' => '2016-06-11 20:53:57',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => '28',
                'county_id' => '11',
                'user_id' => '1',
                'name' => 'GALOLE',
                'created_at' => '2016-06-11 20:53:57',
                'updated_at' => '2016-06-11 20:53:57',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => '29',
                'county_id' => '11',
                'user_id' => '1',
                'name' => 'BURA',
                'created_at' => '2016-06-11 20:53:58',
                'updated_at' => '2016-06-11 20:53:58',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => '30',
                'county_id' => '8',
                'user_id' => '1',
                'name' => 'LAMU EAST',
                'created_at' => '2016-06-11 20:53:58',
                'updated_at' => '2016-06-11 20:53:58',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => '31',
                'county_id' => '8',
                'user_id' => '1',
                'name' => 'LAMU WEST',
                'created_at' => '2016-06-11 20:53:58',
                'updated_at' => '2016-06-11 20:53:58',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => '32',
                'county_id' => '10',
                'user_id' => '1',
                'name' => 'TAVETA',
                'created_at' => '2016-06-11 20:53:58',
                'updated_at' => '2016-06-11 20:53:58',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => '33',
                'county_id' => '10',
                'user_id' => '1',
                'name' => 'WUNDANYI',
                'created_at' => '2016-06-11 20:53:58',
                'updated_at' => '2016-06-11 20:53:58',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => '34',
                'county_id' => '10',
                'user_id' => '1',
                'name' => 'MWATATE',
                'created_at' => '2016-06-11 20:53:58',
                'updated_at' => '2016-06-11 20:53:58',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => '35',
                'county_id' => '10',
                'user_id' => '1',
                'name' => 'VOI',
                'created_at' => '2016-06-11 20:53:58',
                'updated_at' => '2016-06-11 20:53:58',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => '36',
                'county_id' => '21',
                'user_id' => '1',
                'name' => 'GARISSA TOWNSHIP',
                'created_at' => '2016-06-11 20:53:58',
                'updated_at' => '2016-06-11 20:53:58',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => '37',
                'county_id' => '21',
                'user_id' => '1',
                'name' => 'BALAMBALA',
                'created_at' => '2016-06-11 20:53:59',
                'updated_at' => '2016-06-11 20:53:59',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => '38',
                'county_id' => '21',
                'user_id' => '1',
                'name' => 'LAGDERA',
                'created_at' => '2016-06-11 20:53:59',
                'updated_at' => '2016-06-11 20:53:59',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => '39',
                'county_id' => '21',
                'user_id' => '1',
                'name' => 'DADAAB',
                'created_at' => '2016-06-11 20:53:59',
                'updated_at' => '2016-06-11 20:53:59',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => '40',
                'county_id' => '21',
                'user_id' => '1',
                'name' => 'FAFI',
                'created_at' => '2016-06-11 20:53:59',
                'updated_at' => '2016-06-11 20:53:59',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => '41',
                'county_id' => '21',
                'user_id' => '1',
                'name' => 'IJARA',
                'created_at' => '2016-06-11 20:53:59',
                'updated_at' => '2016-06-11 20:53:59',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => '42',
                'county_id' => '23',
                'user_id' => '1',
                'name' => 'WAJIR NORTH',
                'created_at' => '2016-06-11 20:53:59',
                'updated_at' => '2016-06-11 20:53:59',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => '43',
                'county_id' => '23',
                'user_id' => '1',
                'name' => 'WAJIR EAST',
                'created_at' => '2016-06-11 20:53:59',
                'updated_at' => '2016-06-11 20:53:59',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => '44',
                'county_id' => '23',
                'user_id' => '1',
                'name' => 'TARBAJ',
                'created_at' => '2016-06-11 20:53:59',
                'updated_at' => '2016-06-11 20:53:59',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => '45',
                'county_id' => '23',
                'user_id' => '1',
                'name' => 'WAJIR WEST',
                'created_at' => '2016-06-11 20:53:59',
                'updated_at' => '2016-06-11 20:53:59',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => '46',
                'county_id' => '23',
                'user_id' => '1',
                'name' => 'ELDAS',
                'created_at' => '2016-06-11 20:53:59',
                'updated_at' => '2016-06-11 20:53:59',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => '47',
                'county_id' => '23',
                'user_id' => '1',
                'name' => 'WAJIR SOUTH',
                'created_at' => '2016-06-11 20:54:00',
                'updated_at' => '2016-06-11 20:54:00',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => '48',
                'county_id' => '22',
                'user_id' => '1',
                'name' => 'MANDERA WEST',
                'created_at' => '2016-06-11 20:54:00',
                'updated_at' => '2016-06-11 20:54:00',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => '49',
                'county_id' => '22',
                'user_id' => '1',
                'name' => 'BANISSA',
                'created_at' => '2016-06-11 20:54:00',
                'updated_at' => '2016-06-11 20:54:00',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => '50',
                'county_id' => '22',
                'user_id' => '1',
                'name' => 'MANDERA NORTH',
                'created_at' => '2016-06-11 20:54:00',
                'updated_at' => '2016-06-11 20:54:00',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => '51',
                'county_id' => '22',
                'user_id' => '1',
                'name' => 'MANDERA SOUTH',
                'created_at' => '2016-06-11 20:54:00',
                'updated_at' => '2016-06-11 20:54:00',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => '52',
                'county_id' => '22',
                'user_id' => '1',
                'name' => 'MANDERA EAST',
                'created_at' => '2016-06-11 20:54:00',
                'updated_at' => '2016-06-11 20:54:00',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => '53',
                'county_id' => '22',
                'user_id' => '1',
                'name' => 'LAFEY',
                'created_at' => '2016-06-11 20:54:00',
                'updated_at' => '2016-06-11 20:54:00',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => '54',
                'county_id' => '13',
                'user_id' => '1',
                'name' => 'ISIOLO NORTH',
                'created_at' => '2016-06-11 20:54:00',
                'updated_at' => '2016-06-11 20:54:00',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => '55',
                'county_id' => '13',
                'user_id' => '1',
                'name' => 'ISIOLO SOUTH',
                'created_at' => '2016-06-11 20:54:00',
                'updated_at' => '2016-06-11 20:54:00',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => '56',
                'county_id' => '18',
                'user_id' => '1',
                'name' => 'IGEMBE SOUTH',
                'created_at' => '2016-06-11 20:54:00',
                'updated_at' => '2016-06-11 20:54:00',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => '57',
                'county_id' => '18',
                'user_id' => '1',
                'name' => 'IGEMBE CENTRAL',
                'created_at' => '2016-06-11 20:54:01',
                'updated_at' => '2016-06-11 20:54:01',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => '58',
                'county_id' => '18',
                'user_id' => '1',
                'name' => 'IGEMBE NORTH',
                'created_at' => '2016-06-11 20:54:01',
                'updated_at' => '2016-06-11 20:54:01',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => '59',
                'county_id' => '18',
                'user_id' => '1',
                'name' => 'TIGANIA WEST',
                'created_at' => '2016-06-11 20:54:01',
                'updated_at' => '2016-06-11 20:54:01',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => '60',
                'county_id' => '18',
                'user_id' => '1',
                'name' => 'TIGANIA EAST',
                'created_at' => '2016-06-11 20:54:01',
                'updated_at' => '2016-06-11 20:54:01',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => '61',
                'county_id' => '18',
                'user_id' => '1',
                'name' => 'NORTH IMENTI',
                'created_at' => '2016-06-11 20:54:01',
                'updated_at' => '2016-06-11 20:54:01',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => '62',
                'county_id' => '18',
                'user_id' => '1',
                'name' => 'BUURI',
                'created_at' => '2016-06-11 20:54:01',
                'updated_at' => '2016-06-11 20:54:01',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => '63',
                'county_id' => '18',
                'user_id' => '1',
                'name' => 'CENTRAL IMENTI',
                'created_at' => '2016-06-11 20:54:01',
                'updated_at' => '2016-06-11 20:54:01',
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'id' => '64',
                'county_id' => '18',
                'user_id' => '1',
                'name' => 'SOUTH IMENTI',
                'created_at' => '2016-06-11 20:54:01',
                'updated_at' => '2016-06-11 20:54:01',
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'id' => '65',
                'county_id' => '19',
                'user_id' => '1',
                'name' => 'MAARA',
                'created_at' => '2016-06-11 20:54:01',
                'updated_at' => '2016-06-11 20:54:01',
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'id' => '66',
                'county_id' => '19',
                'user_id' => '1',
                'name' => 'CHUKA/IGAMBANG\'OMBE',
                'created_at' => '2016-06-11 20:54:01',
                'updated_at' => '2016-06-11 20:54:01',
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'id' => '67',
                'county_id' => '19',
                'user_id' => '1',
                'name' => 'THARAKA',
                'created_at' => '2016-06-11 20:54:02',
                'updated_at' => '2016-06-11 20:54:02',
                'deleted_at' => NULL,
            ),
            58 => 
            array (
                'id' => '68',
                'county_id' => '12',
                'user_id' => '1',
                'name' => 'MANYATTA',
                'created_at' => '2016-06-11 20:54:02',
                'updated_at' => '2016-06-11 20:54:02',
                'deleted_at' => NULL,
            ),
            59 => 
            array (
                'id' => '69',
                'county_id' => '12',
                'user_id' => '1',
                'name' => 'RUNYENJES',
                'created_at' => '2016-06-11 20:54:02',
                'updated_at' => '2016-06-11 20:54:02',
                'deleted_at' => NULL,
            ),
            60 => 
            array (
                'id' => '70',
                'county_id' => '12',
                'user_id' => '1',
                'name' => 'MBEERE SOUTH',
                'created_at' => '2016-06-11 20:54:02',
                'updated_at' => '2016-06-11 20:54:02',
                'deleted_at' => NULL,
            ),
            61 => 
            array (
                'id' => '71',
                'county_id' => '12',
                'user_id' => '1',
                'name' => 'MBEERE NORTH',
                'created_at' => '2016-06-11 20:54:02',
                'updated_at' => '2016-06-11 20:54:02',
                'deleted_at' => NULL,
            ),
            62 => 
            array (
                'id' => '72',
                'county_id' => '14',
                'user_id' => '1',
                'name' => 'MWINGI NORTH',
                'created_at' => '2016-06-11 20:54:02',
                'updated_at' => '2016-06-11 20:54:02',
                'deleted_at' => NULL,
            ),
            63 => 
            array (
                'id' => '73',
                'county_id' => '14',
                'user_id' => '1',
                'name' => 'MWINGI WEST',
                'created_at' => '2016-06-11 20:54:02',
                'updated_at' => '2016-06-11 20:54:02',
                'deleted_at' => NULL,
            ),
            64 => 
            array (
                'id' => '74',
                'county_id' => '14',
                'user_id' => '1',
                'name' => 'MWINGI CENTRAL',
                'created_at' => '2016-06-11 20:54:02',
                'updated_at' => '2016-06-11 20:54:02',
                'deleted_at' => NULL,
            ),
            65 => 
            array (
                'id' => '75',
                'county_id' => '14',
                'user_id' => '1',
                'name' => 'KITUI WEST',
                'created_at' => '2016-06-11 20:54:03',
                'updated_at' => '2016-06-11 20:54:03',
                'deleted_at' => NULL,
            ),
            66 => 
            array (
                'id' => '76',
                'county_id' => '14',
                'user_id' => '1',
                'name' => 'KITUI RURAL',
                'created_at' => '2016-06-11 20:54:03',
                'updated_at' => '2016-06-11 20:54:03',
                'deleted_at' => NULL,
            ),
            67 => 
            array (
                'id' => '77',
                'county_id' => '14',
                'user_id' => '1',
                'name' => 'KITUI CENTRAL',
                'created_at' => '2016-06-11 20:54:03',
                'updated_at' => '2016-06-11 20:54:03',
                'deleted_at' => NULL,
            ),
            68 => 
            array (
                'id' => '78',
                'county_id' => '14',
                'user_id' => '1',
                'name' => 'KITUI EAST',
                'created_at' => '2016-06-11 20:54:03',
                'updated_at' => '2016-06-11 20:54:03',
                'deleted_at' => NULL,
            ),
            69 => 
            array (
                'id' => '79',
                'county_id' => '14',
                'user_id' => '1',
                'name' => 'KITUI SOUTH',
                'created_at' => '2016-06-11 20:54:03',
                'updated_at' => '2016-06-11 20:54:03',
                'deleted_at' => NULL,
            ),
            70 => 
            array (
                'id' => '80',
                'county_id' => '15',
                'user_id' => '1',
                'name' => 'MASINGA',
                'created_at' => '2016-06-11 20:54:03',
                'updated_at' => '2016-06-11 20:54:03',
                'deleted_at' => NULL,
            ),
            71 => 
            array (
                'id' => '81',
                'county_id' => '15',
                'user_id' => '1',
                'name' => 'YATTA',
                'created_at' => '2016-06-11 20:54:03',
                'updated_at' => '2016-06-11 20:54:03',
                'deleted_at' => NULL,
            ),
            72 => 
            array (
                'id' => '82',
                'county_id' => '15',
                'user_id' => '1',
                'name' => 'KANGUNDO',
                'created_at' => '2016-06-11 20:54:03',
                'updated_at' => '2016-06-11 20:54:03',
                'deleted_at' => NULL,
            ),
            73 => 
            array (
                'id' => '83',
                'county_id' => '15',
                'user_id' => '1',
                'name' => 'MATUNGULU',
                'created_at' => '2016-06-11 20:54:03',
                'updated_at' => '2016-06-11 20:54:03',
                'deleted_at' => NULL,
            ),
            74 => 
            array (
                'id' => '84',
                'county_id' => '15',
                'user_id' => '1',
                'name' => 'KATHIANI',
                'created_at' => '2016-06-11 20:54:03',
                'updated_at' => '2016-06-11 20:54:03',
                'deleted_at' => NULL,
            ),
            75 => 
            array (
                'id' => '85',
                'county_id' => '15',
                'user_id' => '1',
                'name' => 'MAVOKO',
                'created_at' => '2016-06-11 20:54:03',
                'updated_at' => '2016-06-11 20:54:03',
                'deleted_at' => NULL,
            ),
            76 => 
            array (
                'id' => '86',
                'county_id' => '15',
                'user_id' => '1',
                'name' => 'MACHAKOS TOWN',
                'created_at' => '2016-06-11 20:54:03',
                'updated_at' => '2016-06-11 20:54:03',
                'deleted_at' => NULL,
            ),
            77 => 
            array (
                'id' => '87',
                'county_id' => '15',
                'user_id' => '1',
                'name' => 'MWALA',
                'created_at' => '2016-06-11 20:54:04',
                'updated_at' => '2016-06-11 20:54:04',
                'deleted_at' => NULL,
            ),
            78 => 
            array (
                'id' => '88',
                'county_id' => '16',
                'user_id' => '1',
                'name' => 'MBOONI',
                'created_at' => '2016-06-11 20:54:04',
                'updated_at' => '2016-06-11 20:54:04',
                'deleted_at' => NULL,
            ),
            79 => 
            array (
                'id' => '89',
                'county_id' => '16',
                'user_id' => '1',
                'name' => 'KILOME',
                'created_at' => '2016-06-11 20:54:04',
                'updated_at' => '2016-06-11 20:54:04',
                'deleted_at' => NULL,
            ),
            80 => 
            array (
                'id' => '90',
                'county_id' => '16',
                'user_id' => '1',
                'name' => 'KAITI',
                'created_at' => '2016-06-11 20:54:04',
                'updated_at' => '2016-06-11 20:54:04',
                'deleted_at' => NULL,
            ),
            81 => 
            array (
                'id' => '91',
                'county_id' => '16',
                'user_id' => '1',
                'name' => 'MAKUENI',
                'created_at' => '2016-06-11 20:54:04',
                'updated_at' => '2016-06-11 20:54:04',
                'deleted_at' => NULL,
            ),
            82 => 
            array (
                'id' => '92',
                'county_id' => '16',
                'user_id' => '1',
                'name' => 'KIBWEZI WEST',
                'created_at' => '2016-06-11 20:54:04',
                'updated_at' => '2016-06-11 20:54:04',
                'deleted_at' => NULL,
            ),
            83 => 
            array (
                'id' => '93',
                'county_id' => '16',
                'user_id' => '1',
                'name' => 'KIBWEZI EAST',
                'created_at' => '2016-06-11 20:54:04',
                'updated_at' => '2016-06-11 20:54:04',
                'deleted_at' => NULL,
            ),
            84 => 
            array (
                'id' => '94',
                'county_id' => '4',
                'user_id' => '1',
                'name' => 'KINANGOP',
                'created_at' => '2016-06-11 20:54:04',
                'updated_at' => '2016-06-11 20:54:04',
                'deleted_at' => NULL,
            ),
            85 => 
            array (
                'id' => '95',
                'county_id' => '4',
                'user_id' => '1',
                'name' => 'KIPIPIRI',
                'created_at' => '2016-06-11 20:54:04',
                'updated_at' => '2016-06-11 20:54:04',
                'deleted_at' => NULL,
            ),
            86 => 
            array (
                'id' => '96',
                'county_id' => '4',
                'user_id' => '1',
                'name' => 'OL KALOU',
                'created_at' => '2016-06-11 20:54:04',
                'updated_at' => '2016-06-11 20:54:04',
                'deleted_at' => NULL,
            ),
            87 => 
            array (
                'id' => '97',
                'county_id' => '4',
                'user_id' => '1',
                'name' => 'OL JORO OROK',
                'created_at' => '2016-06-11 20:54:04',
                'updated_at' => '2016-06-11 20:54:04',
                'deleted_at' => NULL,
            ),
            88 => 
            array (
                'id' => '98',
                'county_id' => '4',
                'user_id' => '1',
                'name' => 'NDARAGWA',
                'created_at' => '2016-06-11 20:54:05',
                'updated_at' => '2016-06-11 20:54:05',
                'deleted_at' => NULL,
            ),
            89 => 
            array (
                'id' => '99',
                'county_id' => '5',
                'user_id' => '1',
                'name' => 'TETU',
                'created_at' => '2016-06-11 20:54:05',
                'updated_at' => '2016-06-11 20:54:05',
                'deleted_at' => NULL,
            ),
            90 => 
            array (
                'id' => '100',
                'county_id' => '5',
                'user_id' => '1',
                'name' => 'KIENI',
                'created_at' => '2016-06-11 20:54:05',
                'updated_at' => '2016-06-11 20:54:05',
                'deleted_at' => NULL,
            ),
            91 => 
            array (
                'id' => '101',
                'county_id' => '5',
                'user_id' => '1',
                'name' => 'MATHIRA',
                'created_at' => '2016-06-11 20:54:05',
                'updated_at' => '2016-06-11 20:54:05',
                'deleted_at' => NULL,
            ),
            92 => 
            array (
                'id' => '102',
                'county_id' => '5',
                'user_id' => '1',
                'name' => 'OTHAYA',
                'created_at' => '2016-06-11 20:54:05',
                'updated_at' => '2016-06-11 20:54:05',
                'deleted_at' => NULL,
            ),
            93 => 
            array (
                'id' => '103',
                'county_id' => '5',
                'user_id' => '1',
                'name' => 'MUKURWENI',
                'created_at' => '2016-06-11 20:54:05',
                'updated_at' => '2016-06-11 20:54:05',
                'deleted_at' => NULL,
            ),
            94 => 
            array (
                'id' => '104',
                'county_id' => '5',
                'user_id' => '1',
                'name' => 'NYERI TOWN',
                'created_at' => '2016-06-11 20:54:05',
                'updated_at' => '2016-06-11 20:54:05',
                'deleted_at' => NULL,
            ),
            95 => 
            array (
                'id' => '105',
                'county_id' => '2',
                'user_id' => '1',
                'name' => 'MWEA',
                'created_at' => '2016-06-11 20:54:05',
                'updated_at' => '2016-06-11 20:54:05',
                'deleted_at' => NULL,
            ),
            96 => 
            array (
                'id' => '106',
                'county_id' => '2',
                'user_id' => '1',
                'name' => 'GICHUGU',
                'created_at' => '2016-06-11 20:54:05',
                'updated_at' => '2016-06-11 20:54:05',
                'deleted_at' => NULL,
            ),
            97 => 
            array (
                'id' => '107',
                'county_id' => '2',
                'user_id' => '1',
                'name' => 'NDIA',
                'created_at' => '2016-06-11 20:54:05',
                'updated_at' => '2016-06-11 20:54:05',
                'deleted_at' => NULL,
            ),
            98 => 
            array (
                'id' => '108',
                'county_id' => '2',
                'user_id' => '1',
                'name' => 'KIRINYAGA CENTRAL',
                'created_at' => '2016-06-11 20:54:05',
                'updated_at' => '2016-06-11 20:54:05',
                'deleted_at' => NULL,
            ),
            99 => 
            array (
                'id' => '109',
                'county_id' => '1',
                'user_id' => '1',
                'name' => 'GATUNDU SOUTH',
                'created_at' => '2016-06-11 20:54:06',
                'updated_at' => '2016-06-11 20:54:06',
                'deleted_at' => NULL,
            ),
            100 => 
            array (
                'id' => '110',
                'county_id' => '1',
                'user_id' => '1',
                'name' => 'GATUNDU NORTH',
                'created_at' => '2016-06-11 20:54:06',
                'updated_at' => '2016-06-11 20:54:06',
                'deleted_at' => NULL,
            ),
            101 => 
            array (
                'id' => '111',
                'county_id' => '1',
                'user_id' => '1',
                'name' => 'JUJA',
                'created_at' => '2016-06-11 20:54:06',
                'updated_at' => '2016-06-11 20:54:06',
                'deleted_at' => NULL,
            ),
            102 => 
            array (
                'id' => '112',
                'county_id' => '1',
                'user_id' => '1',
                'name' => 'THIKA TOWN',
                'created_at' => '2016-06-11 20:54:06',
                'updated_at' => '2016-06-11 20:54:06',
                'deleted_at' => NULL,
            ),
            103 => 
            array (
                'id' => '113',
                'county_id' => '1',
                'user_id' => '1',
                'name' => 'RUIRU',
                'created_at' => '2016-06-11 20:54:06',
                'updated_at' => '2016-06-11 20:54:06',
                'deleted_at' => NULL,
            ),
            104 => 
            array (
                'id' => '114',
                'county_id' => '1',
                'user_id' => '1',
                'name' => 'GITHUNGURI',
                'created_at' => '2016-06-11 20:54:07',
                'updated_at' => '2016-06-11 20:54:07',
                'deleted_at' => NULL,
            ),
            105 => 
            array (
                'id' => '115',
                'county_id' => '1',
                'user_id' => '1',
                'name' => 'KIAMBU',
                'created_at' => '2016-06-11 20:54:07',
                'updated_at' => '2016-06-11 20:54:07',
                'deleted_at' => NULL,
            ),
            106 => 
            array (
                'id' => '116',
                'county_id' => '1',
                'user_id' => '1',
                'name' => 'KIAMBAA',
                'created_at' => '2016-06-11 20:54:07',
                'updated_at' => '2016-06-11 20:54:07',
                'deleted_at' => NULL,
            ),
            107 => 
            array (
                'id' => '117',
                'county_id' => '1',
                'user_id' => '1',
                'name' => 'KABETE',
                'created_at' => '2016-06-11 20:54:07',
                'updated_at' => '2016-06-11 20:54:07',
                'deleted_at' => NULL,
            ),
            108 => 
            array (
                'id' => '118',
                'county_id' => '1',
                'user_id' => '1',
                'name' => 'KIKUYU',
                'created_at' => '2016-06-11 20:54:07',
                'updated_at' => '2016-06-11 20:54:07',
                'deleted_at' => NULL,
            ),
            109 => 
            array (
                'id' => '119',
                'county_id' => '1',
                'user_id' => '1',
                'name' => 'LIMURU',
                'created_at' => '2016-06-11 20:54:07',
                'updated_at' => '2016-06-11 20:54:07',
                'deleted_at' => NULL,
            ),
            110 => 
            array (
                'id' => '120',
                'county_id' => '1',
                'user_id' => '1',
                'name' => 'LARI',
                'created_at' => '2016-06-11 20:54:07',
                'updated_at' => '2016-06-11 20:54:07',
                'deleted_at' => NULL,
            ),
            111 => 
            array (
                'id' => '121',
                'county_id' => '41',
                'user_id' => '1',
                'name' => 'TURKANA NORTH',
                'created_at' => '2016-06-11 20:54:07',
                'updated_at' => '2016-06-11 20:54:07',
                'deleted_at' => NULL,
            ),
            112 => 
            array (
                'id' => '122',
                'county_id' => '41',
                'user_id' => '1',
                'name' => 'TURKANA WEST',
                'created_at' => '2016-06-11 20:54:07',
                'updated_at' => '2016-06-11 20:54:07',
                'deleted_at' => NULL,
            ),
            113 => 
            array (
                'id' => '123',
                'county_id' => '41',
                'user_id' => '1',
                'name' => 'TURKANA CENTRAL',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            114 => 
            array (
                'id' => '124',
                'county_id' => '41',
                'user_id' => '1',
                'name' => 'LOIMA',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            115 => 
            array (
                'id' => '125',
                'county_id' => '41',
                'user_id' => '1',
                'name' => 'TURKANA SOUTH',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            116 => 
            array (
                'id' => '126',
                'county_id' => '41',
                'user_id' => '1',
                'name' => 'TURKANA EAST',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            117 => 
            array (
                'id' => '127',
                'county_id' => '43',
                'user_id' => '1',
                'name' => 'KAPENGURIA',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            118 => 
            array (
                'id' => '128',
                'county_id' => '43',
                'user_id' => '1',
                'name' => 'SIGOR',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            119 => 
            array (
                'id' => '129',
                'county_id' => '43',
                'user_id' => '1',
                'name' => 'KACHELIBA',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            120 => 
            array (
                'id' => '130',
                'county_id' => '43',
                'user_id' => '1',
                'name' => 'POKOT SOUTH',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            121 => 
            array (
                'id' => '131',
                'county_id' => '39',
                'user_id' => '1',
                'name' => 'SAMBURU WEST',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            122 => 
            array (
                'id' => '132',
                'county_id' => '39',
                'user_id' => '1',
                'name' => 'SAMBURU NORTH',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            123 => 
            array (
                'id' => '133',
                'county_id' => '39',
                'user_id' => '1',
                'name' => 'SAMBURU EAST',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            124 => 
            array (
                'id' => '134',
                'county_id' => '40',
                'user_id' => '1',
                'name' => 'KWANZA',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            125 => 
            array (
                'id' => '135',
                'county_id' => '40',
                'user_id' => '1',
                'name' => 'ENDEBESS',
                'created_at' => '2016-06-11 20:54:08',
                'updated_at' => '2016-06-11 20:54:08',
                'deleted_at' => NULL,
            ),
            126 => 
            array (
                'id' => '136',
                'county_id' => '40',
                'user_id' => '1',
                'name' => 'SABOTI',
                'created_at' => '2016-06-11 20:54:09',
                'updated_at' => '2016-06-11 20:54:09',
                'deleted_at' => NULL,
            ),
            127 => 
            array (
                'id' => '137',
                'county_id' => '40',
                'user_id' => '1',
                'name' => 'KIMININI',
                'created_at' => '2016-06-11 20:54:09',
                'updated_at' => '2016-06-11 20:54:09',
                'deleted_at' => NULL,
            ),
            128 => 
            array (
                'id' => '138',
                'county_id' => '40',
                'user_id' => '1',
                'name' => 'CHERANGANY',
                'created_at' => '2016-06-11 20:54:09',
                'updated_at' => '2016-06-11 20:54:09',
                'deleted_at' => NULL,
            ),
            129 => 
            array (
                'id' => '139',
                'county_id' => '42',
                'user_id' => '1',
                'name' => 'SOY',
                'created_at' => '2016-06-11 20:54:09',
                'updated_at' => '2016-06-11 20:54:09',
                'deleted_at' => NULL,
            ),
            130 => 
            array (
                'id' => '140',
                'county_id' => '42',
                'user_id' => '1',
                'name' => 'TURBO',
                'created_at' => '2016-06-11 20:54:09',
                'updated_at' => '2016-06-11 20:54:09',
                'deleted_at' => NULL,
            ),
            131 => 
            array (
                'id' => '141',
                'county_id' => '42',
                'user_id' => '1',
                'name' => 'MOIBEN',
                'created_at' => '2016-06-11 20:54:09',
                'updated_at' => '2016-06-11 20:54:09',
                'deleted_at' => NULL,
            ),
            132 => 
            array (
                'id' => '142',
                'county_id' => '42',
                'user_id' => '1',
                'name' => 'AINABKOI',
                'created_at' => '2016-06-11 20:54:09',
                'updated_at' => '2016-06-11 20:54:09',
                'deleted_at' => NULL,
            ),
            133 => 
            array (
                'id' => '143',
                'county_id' => '42',
                'user_id' => '1',
                'name' => 'KAPSERET',
                'created_at' => '2016-06-11 20:54:09',
                'updated_at' => '2016-06-11 20:54:09',
                'deleted_at' => NULL,
            ),
            134 => 
            array (
                'id' => '144',
                'county_id' => '42',
                'user_id' => '1',
                'name' => 'KESSES',
                'created_at' => '2016-06-11 20:54:09',
                'updated_at' => '2016-06-11 20:54:09',
                'deleted_at' => NULL,
            ),
            135 => 
            array (
                'id' => '145',
                'county_id' => '37',
                'user_id' => '1',
                'name' => 'TINDERET',
                'created_at' => '2016-06-11 20:54:10',
                'updated_at' => '2016-06-11 20:54:10',
                'deleted_at' => NULL,
            ),
            136 => 
            array (
                'id' => '146',
                'county_id' => '37',
                'user_id' => '1',
                'name' => 'ALDAI',
                'created_at' => '2016-06-11 20:54:10',
                'updated_at' => '2016-06-11 20:54:10',
                'deleted_at' => NULL,
            ),
            137 => 
            array (
                'id' => '147',
                'county_id' => '37',
                'user_id' => '1',
                'name' => 'NANDI HILLS',
                'created_at' => '2016-06-11 20:54:10',
                'updated_at' => '2016-06-11 20:54:10',
                'deleted_at' => NULL,
            ),
            138 => 
            array (
                'id' => '148',
                'county_id' => '37',
                'user_id' => '1',
                'name' => 'CHESUMEI',
                'created_at' => '2016-06-11 20:54:10',
                'updated_at' => '2016-06-11 20:54:10',
                'deleted_at' => NULL,
            ),
            139 => 
            array (
                'id' => '149',
                'county_id' => '37',
                'user_id' => '1',
                'name' => 'EMGWEN',
                'created_at' => '2016-06-11 20:54:10',
                'updated_at' => '2016-06-11 20:54:10',
                'deleted_at' => NULL,
            ),
            140 => 
            array (
                'id' => '150',
                'county_id' => '37',
                'user_id' => '1',
                'name' => 'MOSOP',
                'created_at' => '2016-06-11 20:54:10',
                'updated_at' => '2016-06-11 20:54:10',
                'deleted_at' => NULL,
            ),
            141 => 
            array (
                'id' => '151',
                'county_id' => '30',
                'user_id' => '1',
                'name' => 'TIATY',
                'created_at' => '2016-06-11 20:54:10',
                'updated_at' => '2016-06-11 20:54:10',
                'deleted_at' => NULL,
            ),
            142 => 
            array (
                'id' => '152',
                'county_id' => '30',
                'user_id' => '1',
                'name' => 'BARINGO NORTH',
                'created_at' => '2016-06-11 20:54:10',
                'updated_at' => '2016-06-11 20:54:10',
                'deleted_at' => NULL,
            ),
            143 => 
            array (
                'id' => '153',
                'county_id' => '30',
                'user_id' => '1',
                'name' => 'BARINGO CENTRAL',
                'created_at' => '2016-06-11 20:54:10',
                'updated_at' => '2016-06-11 20:54:10',
                'deleted_at' => NULL,
            ),
            144 => 
            array (
                'id' => '154',
                'county_id' => '30',
                'user_id' => '1',
                'name' => 'BARINGO SOUTH',
                'created_at' => '2016-06-11 20:54:11',
                'updated_at' => '2016-06-11 20:54:11',
                'deleted_at' => NULL,
            ),
            145 => 
            array (
                'id' => '155',
                'county_id' => '30',
                'user_id' => '1',
                'name' => 'MOGOTIO',
                'created_at' => '2016-06-11 20:54:11',
                'updated_at' => '2016-06-11 20:54:11',
                'deleted_at' => NULL,
            ),
            146 => 
            array (
                'id' => '156',
                'county_id' => '30',
                'user_id' => '1',
                'name' => 'ELDAMA RAVINE',
                'created_at' => '2016-06-11 20:54:11',
                'updated_at' => '2016-06-11 20:54:11',
                'deleted_at' => NULL,
            ),
            147 => 
            array (
                'id' => '157',
                'county_id' => '35',
                'user_id' => '1',
                'name' => 'LAIKIPIA WEST',
                'created_at' => '2016-06-11 20:54:11',
                'updated_at' => '2016-06-11 20:54:11',
                'deleted_at' => NULL,
            ),
            148 => 
            array (
                'id' => '158',
                'county_id' => '35',
                'user_id' => '1',
                'name' => 'LAIKIPIA EAST',
                'created_at' => '2016-06-11 20:54:11',
                'updated_at' => '2016-06-11 20:54:11',
                'deleted_at' => NULL,
            ),
            149 => 
            array (
                'id' => '159',
                'county_id' => '35',
                'user_id' => '1',
                'name' => 'LAIKIPIA NORTH',
                'created_at' => '2016-06-11 20:54:11',
                'updated_at' => '2016-06-11 20:54:11',
                'deleted_at' => NULL,
            ),
            150 => 
            array (
                'id' => '160',
                'county_id' => '36',
                'user_id' => '1',
                'name' => 'MOLO',
                'created_at' => '2016-06-11 20:54:11',
                'updated_at' => '2016-06-11 20:54:11',
                'deleted_at' => NULL,
            ),
            151 => 
            array (
                'id' => '161',
                'county_id' => '36',
                'user_id' => '1',
                'name' => 'NJORO',
                'created_at' => '2016-06-11 20:54:11',
                'updated_at' => '2016-06-11 20:54:11',
                'deleted_at' => NULL,
            ),
            152 => 
            array (
                'id' => '162',
                'county_id' => '36',
                'user_id' => '1',
                'name' => 'NAIVASHA',
                'created_at' => '2016-06-11 20:54:11',
                'updated_at' => '2016-06-11 20:54:11',
                'deleted_at' => NULL,
            ),
            153 => 
            array (
                'id' => '163',
                'county_id' => '36',
                'user_id' => '1',
                'name' => 'GILGIL',
                'created_at' => '2016-06-11 20:54:11',
                'updated_at' => '2016-06-11 20:54:11',
                'deleted_at' => NULL,
            ),
            154 => 
            array (
                'id' => '164',
                'county_id' => '36',
                'user_id' => '1',
                'name' => 'KURESOI SOUTH',
                'created_at' => '2016-06-11 20:54:11',
                'updated_at' => '2016-06-11 20:54:11',
                'deleted_at' => NULL,
            ),
            155 => 
            array (
                'id' => '165',
                'county_id' => '36',
                'user_id' => '1',
                'name' => 'KURESOI NORTH',
                'created_at' => '2016-06-11 20:54:12',
                'updated_at' => '2016-06-11 20:54:12',
                'deleted_at' => NULL,
            ),
            156 => 
            array (
                'id' => '166',
                'county_id' => '36',
                'user_id' => '1',
                'name' => 'SUBUKIA',
                'created_at' => '2016-06-11 20:54:12',
                'updated_at' => '2016-06-11 20:54:12',
                'deleted_at' => NULL,
            ),
            157 => 
            array (
                'id' => '167',
                'county_id' => '36',
                'user_id' => '1',
                'name' => 'RONGAI',
                'created_at' => '2016-06-11 20:54:12',
                'updated_at' => '2016-06-11 20:54:12',
                'deleted_at' => NULL,
            ),
            158 => 
            array (
                'id' => '168',
                'county_id' => '36',
                'user_id' => '1',
                'name' => 'BAHATI',
                'created_at' => '2016-06-11 20:54:12',
                'updated_at' => '2016-06-11 20:54:12',
                'deleted_at' => NULL,
            ),
            159 => 
            array (
                'id' => '169',
                'county_id' => '36',
                'user_id' => '1',
                'name' => 'NAKURU TOWN WEST',
                'created_at' => '2016-06-11 20:54:12',
                'updated_at' => '2016-06-11 20:54:12',
                'deleted_at' => NULL,
            ),
            160 => 
            array (
                'id' => '170',
                'county_id' => '36',
                'user_id' => '1',
                'name' => 'NAKURU TOWN EAST',
                'created_at' => '2016-06-11 20:54:12',
                'updated_at' => '2016-06-11 20:54:12',
                'deleted_at' => NULL,
            ),
            161 => 
            array (
                'id' => '171',
                'county_id' => '38',
                'user_id' => '1',
                'name' => 'KILGORIS',
                'created_at' => '2016-06-11 20:54:12',
                'updated_at' => '2016-06-11 20:54:12',
                'deleted_at' => NULL,
            ),
            162 => 
            array (
                'id' => '172',
                'county_id' => '38',
                'user_id' => '1',
                'name' => 'EMURUA DIKIRR',
                'created_at' => '2016-06-11 20:54:12',
                'updated_at' => '2016-06-11 20:54:12',
                'deleted_at' => NULL,
            ),
            163 => 
            array (
                'id' => '173',
                'county_id' => '38',
                'user_id' => '1',
                'name' => 'NAROK NORTH',
                'created_at' => '2016-06-11 20:54:13',
                'updated_at' => '2016-06-11 20:54:13',
                'deleted_at' => NULL,
            ),
            164 => 
            array (
                'id' => '174',
                'county_id' => '38',
                'user_id' => '1',
                'name' => 'NAROK EAST',
                'created_at' => '2016-06-11 20:54:13',
                'updated_at' => '2016-06-11 20:54:13',
                'deleted_at' => NULL,
            ),
            165 => 
            array (
                'id' => '175',
                'county_id' => '38',
                'user_id' => '1',
                'name' => 'NAROK SOUTH',
                'created_at' => '2016-06-11 20:54:13',
                'updated_at' => '2016-06-11 20:54:13',
                'deleted_at' => NULL,
            ),
            166 => 
            array (
                'id' => '176',
                'county_id' => '38',
                'user_id' => '1',
                'name' => 'NAROK WEST',
                'created_at' => '2016-06-11 20:54:13',
                'updated_at' => '2016-06-11 20:54:13',
                'deleted_at' => NULL,
            ),
            167 => 
            array (
                'id' => '177',
                'county_id' => '33',
                'user_id' => '1',
                'name' => 'KAJIADO NORTH',
                'created_at' => '2016-06-11 20:54:13',
                'updated_at' => '2016-06-11 20:54:13',
                'deleted_at' => NULL,
            ),
            168 => 
            array (
                'id' => '178',
                'county_id' => '33',
                'user_id' => '1',
                'name' => 'KAJIADO CENTRAL',
                'created_at' => '2016-06-11 20:54:13',
                'updated_at' => '2016-06-11 20:54:13',
                'deleted_at' => NULL,
            ),
            169 => 
            array (
                'id' => '179',
                'county_id' => '33',
                'user_id' => '1',
                'name' => 'KAJIADO EAST',
                'created_at' => '2016-06-11 20:54:13',
                'updated_at' => '2016-06-11 20:54:13',
                'deleted_at' => NULL,
            ),
            170 => 
            array (
                'id' => '180',
                'county_id' => '33',
                'user_id' => '1',
                'name' => 'KAJIADO WEST',
                'created_at' => '2016-06-11 20:54:13',
                'updated_at' => '2016-06-11 20:54:13',
                'deleted_at' => NULL,
            ),
            171 => 
            array (
                'id' => '181',
                'county_id' => '33',
                'user_id' => '1',
                'name' => 'KAJIADO SOUTH',
                'created_at' => '2016-06-11 20:54:13',
                'updated_at' => '2016-06-11 20:54:13',
                'deleted_at' => NULL,
            ),
            172 => 
            array (
                'id' => '182',
                'county_id' => '34',
                'user_id' => '1',
                'name' => 'KIPKELION EAST',
                'created_at' => '2016-06-11 20:54:14',
                'updated_at' => '2016-06-11 20:54:14',
                'deleted_at' => NULL,
            ),
            173 => 
            array (
                'id' => '183',
                'county_id' => '34',
                'user_id' => '1',
                'name' => 'KIPKELION WEST',
                'created_at' => '2016-06-11 20:54:14',
                'updated_at' => '2016-06-11 20:54:14',
                'deleted_at' => NULL,
            ),
            174 => 
            array (
                'id' => '184',
                'county_id' => '34',
                'user_id' => '1',
                'name' => 'AINAMOI',
                'created_at' => '2016-06-11 20:54:14',
                'updated_at' => '2016-06-11 20:54:14',
                'deleted_at' => NULL,
            ),
            175 => 
            array (
                'id' => '185',
                'county_id' => '34',
                'user_id' => '1',
                'name' => 'BURETI',
                'created_at' => '2016-06-11 20:54:14',
                'updated_at' => '2016-06-11 20:54:14',
                'deleted_at' => NULL,
            ),
            176 => 
            array (
                'id' => '186',
                'county_id' => '34',
                'user_id' => '1',
                'name' => 'BELGUT',
                'created_at' => '2016-06-11 20:54:14',
                'updated_at' => '2016-06-11 20:54:14',
                'deleted_at' => NULL,
            ),
            177 => 
            array (
                'id' => '187',
                'county_id' => '34',
                'user_id' => '1',
                'name' => 'SIGOWET/SOIN',
                'created_at' => '2016-06-11 20:54:14',
                'updated_at' => '2016-06-11 20:54:14',
                'deleted_at' => NULL,
            ),
            178 => 
            array (
                'id' => '188',
                'county_id' => '31',
                'user_id' => '1',
                'name' => 'SOTIK',
                'created_at' => '2016-06-11 20:54:14',
                'updated_at' => '2016-06-11 20:54:14',
                'deleted_at' => NULL,
            ),
            179 => 
            array (
                'id' => '189',
                'county_id' => '31',
                'user_id' => '1',
                'name' => 'CHEPALUNGU',
                'created_at' => '2016-06-11 20:54:14',
                'updated_at' => '2016-06-11 20:54:14',
                'deleted_at' => NULL,
            ),
            180 => 
            array (
                'id' => '190',
                'county_id' => '31',
                'user_id' => '1',
                'name' => 'BOMET EAST',
                'created_at' => '2016-06-11 20:54:14',
                'updated_at' => '2016-06-11 20:54:14',
                'deleted_at' => NULL,
            ),
            181 => 
            array (
                'id' => '191',
                'county_id' => '31',
                'user_id' => '1',
                'name' => 'BOMET CENTRAL',
                'created_at' => '2016-06-11 20:54:15',
                'updated_at' => '2016-06-11 20:54:15',
                'deleted_at' => NULL,
            ),
            182 => 
            array (
                'id' => '192',
                'county_id' => '31',
                'user_id' => '1',
                'name' => 'KONOIN',
                'created_at' => '2016-06-11 20:54:15',
                'updated_at' => '2016-06-11 20:54:15',
                'deleted_at' => NULL,
            ),
            183 => 
            array (
                'id' => '193',
                'county_id' => '46',
                'user_id' => '1',
                'name' => 'LUGARI',
                'created_at' => '2016-06-11 20:54:15',
                'updated_at' => '2016-06-11 20:54:15',
                'deleted_at' => NULL,
            ),
            184 => 
            array (
                'id' => '194',
                'county_id' => '46',
                'user_id' => '1',
                'name' => 'LIKUYANI',
                'created_at' => '2016-06-11 20:54:15',
                'updated_at' => '2016-06-11 20:54:15',
                'deleted_at' => NULL,
            ),
            185 => 
            array (
                'id' => '195',
                'county_id' => '46',
                'user_id' => '1',
                'name' => 'MALAVA',
                'created_at' => '2016-06-11 20:54:15',
                'updated_at' => '2016-06-11 20:54:15',
                'deleted_at' => NULL,
            ),
            186 => 
            array (
                'id' => '196',
                'county_id' => '46',
                'user_id' => '1',
                'name' => 'LURAMBI',
                'created_at' => '2016-06-11 20:54:15',
                'updated_at' => '2016-06-11 20:54:15',
                'deleted_at' => NULL,
            ),
            187 => 
            array (
                'id' => '197',
                'county_id' => '46',
                'user_id' => '1',
                'name' => 'NAVAKHOLO',
                'created_at' => '2016-06-11 20:54:15',
                'updated_at' => '2016-06-11 20:54:15',
                'deleted_at' => NULL,
            ),
            188 => 
            array (
                'id' => '198',
                'county_id' => '46',
                'user_id' => '1',
                'name' => 'MUMIAS WEST',
                'created_at' => '2016-06-11 20:54:15',
                'updated_at' => '2016-06-11 20:54:15',
                'deleted_at' => NULL,
            ),
            189 => 
            array (
                'id' => '199',
                'county_id' => '46',
                'user_id' => '1',
                'name' => 'MUMIAS EAST',
                'created_at' => '2016-06-11 20:54:16',
                'updated_at' => '2016-06-11 20:54:16',
                'deleted_at' => NULL,
            ),
            190 => 
            array (
                'id' => '200',
                'county_id' => '46',
                'user_id' => '1',
                'name' => 'MATUNGU',
                'created_at' => '2016-06-11 20:54:16',
                'updated_at' => '2016-06-11 20:54:16',
                'deleted_at' => NULL,
            ),
            191 => 
            array (
                'id' => '201',
                'county_id' => '46',
                'user_id' => '1',
                'name' => 'BUTERE',
                'created_at' => '2016-06-11 20:54:16',
                'updated_at' => '2016-06-11 20:54:16',
                'deleted_at' => NULL,
            ),
            192 => 
            array (
                'id' => '202',
                'county_id' => '46',
                'user_id' => '1',
                'name' => 'KHWISERO',
                'created_at' => '2016-06-11 20:54:16',
                'updated_at' => '2016-06-11 20:54:16',
                'deleted_at' => NULL,
            ),
            193 => 
            array (
                'id' => '203',
                'county_id' => '46',
                'user_id' => '1',
                'name' => 'SHINYALU',
                'created_at' => '2016-06-11 20:54:16',
                'updated_at' => '2016-06-11 20:54:16',
                'deleted_at' => NULL,
            ),
            194 => 
            array (
                'id' => '204',
                'county_id' => '46',
                'user_id' => '1',
                'name' => 'IKOLOMANI',
                'created_at' => '2016-06-11 20:54:16',
                'updated_at' => '2016-06-11 20:54:16',
                'deleted_at' => NULL,
            ),
            195 => 
            array (
                'id' => '205',
                'county_id' => '47',
                'user_id' => '1',
                'name' => 'VIHIGA',
                'created_at' => '2016-06-11 20:54:16',
                'updated_at' => '2016-06-11 20:54:16',
                'deleted_at' => NULL,
            ),
            196 => 
            array (
                'id' => '206',
                'county_id' => '47',
                'user_id' => '1',
                'name' => 'SABATIA',
                'created_at' => '2016-06-11 20:54:17',
                'updated_at' => '2016-06-11 20:54:17',
                'deleted_at' => NULL,
            ),
            197 => 
            array (
                'id' => '207',
                'county_id' => '47',
                'user_id' => '1',
                'name' => 'HAMISI',
                'created_at' => '2016-06-11 20:54:17',
                'updated_at' => '2016-06-11 20:54:17',
                'deleted_at' => NULL,
            ),
            198 => 
            array (
                'id' => '208',
                'county_id' => '47',
                'user_id' => '1',
                'name' => 'LUANDA',
                'created_at' => '2016-06-11 20:54:17',
                'updated_at' => '2016-06-11 20:54:17',
                'deleted_at' => NULL,
            ),
            199 => 
            array (
                'id' => '209',
                'county_id' => '47',
                'user_id' => '1',
                'name' => 'EMUHAYA',
                'created_at' => '2016-06-11 20:54:17',
                'updated_at' => '2016-06-11 20:54:17',
                'deleted_at' => NULL,
            ),
            200 => 
            array (
                'id' => '210',
                'county_id' => '44',
                'user_id' => '1',
                'name' => 'MT. ELGON',
                'created_at' => '2016-06-11 20:54:17',
                'updated_at' => '2016-06-11 20:54:17',
                'deleted_at' => NULL,
            ),
            201 => 
            array (
                'id' => '211',
                'county_id' => '44',
                'user_id' => '1',
                'name' => 'SIRISIA',
                'created_at' => '2016-06-11 20:54:18',
                'updated_at' => '2016-06-11 20:54:18',
                'deleted_at' => NULL,
            ),
            202 => 
            array (
                'id' => '212',
                'county_id' => '44',
                'user_id' => '1',
                'name' => 'KABUCHAI',
                'created_at' => '2016-06-11 20:54:18',
                'updated_at' => '2016-06-11 20:54:18',
                'deleted_at' => NULL,
            ),
            203 => 
            array (
                'id' => '213',
                'county_id' => '44',
                'user_id' => '1',
                'name' => 'BUMULA',
                'created_at' => '2016-06-11 20:54:18',
                'updated_at' => '2016-06-11 20:54:18',
                'deleted_at' => NULL,
            ),
            204 => 
            array (
                'id' => '214',
                'county_id' => '44',
                'user_id' => '1',
                'name' => 'KANDUYI',
                'created_at' => '2016-06-11 20:54:18',
                'updated_at' => '2016-06-11 20:54:18',
                'deleted_at' => NULL,
            ),
            205 => 
            array (
                'id' => '215',
                'county_id' => '44',
                'user_id' => '1',
                'name' => 'WEBUYE EAST',
                'created_at' => '2016-06-11 20:54:18',
                'updated_at' => '2016-06-11 20:54:18',
                'deleted_at' => NULL,
            ),
            206 => 
            array (
                'id' => '216',
                'county_id' => '44',
                'user_id' => '1',
                'name' => 'WEBUYE WEST',
                'created_at' => '2016-06-11 20:54:18',
                'updated_at' => '2016-06-11 20:54:18',
                'deleted_at' => NULL,
            ),
            207 => 
            array (
                'id' => '217',
                'county_id' => '44',
                'user_id' => '1',
                'name' => 'KIMILILI',
                'created_at' => '2016-06-11 20:54:18',
                'updated_at' => '2016-06-11 20:54:18',
                'deleted_at' => NULL,
            ),
            208 => 
            array (
                'id' => '218',
                'county_id' => '44',
                'user_id' => '1',
                'name' => 'TONGAREN',
                'created_at' => '2016-06-11 20:54:18',
                'updated_at' => '2016-06-11 20:54:18',
                'deleted_at' => NULL,
            ),
            209 => 
            array (
                'id' => '219',
                'county_id' => '45',
                'user_id' => '1',
                'name' => 'TESO NORTH',
                'created_at' => '2016-06-11 20:54:18',
                'updated_at' => '2016-06-11 20:54:18',
                'deleted_at' => NULL,
            ),
            210 => 
            array (
                'id' => '220',
                'county_id' => '45',
                'user_id' => '1',
                'name' => 'TESO SOUTH',
                'created_at' => '2016-06-11 20:54:19',
                'updated_at' => '2016-06-11 20:54:19',
                'deleted_at' => NULL,
            ),
            211 => 
            array (
                'id' => '221',
                'county_id' => '45',
                'user_id' => '1',
                'name' => 'NAMBALE',
                'created_at' => '2016-06-11 20:54:19',
                'updated_at' => '2016-06-11 20:54:19',
                'deleted_at' => NULL,
            ),
            212 => 
            array (
                'id' => '222',
                'county_id' => '45',
                'user_id' => '1',
                'name' => 'MATAYOS',
                'created_at' => '2016-06-11 20:54:19',
                'updated_at' => '2016-06-11 20:54:19',
                'deleted_at' => NULL,
            ),
            213 => 
            array (
                'id' => '223',
                'county_id' => '45',
                'user_id' => '1',
                'name' => 'BUTULA',
                'created_at' => '2016-06-11 20:54:19',
                'updated_at' => '2016-06-11 20:54:19',
                'deleted_at' => NULL,
            ),
            214 => 
            array (
                'id' => '224',
                'county_id' => '45',
                'user_id' => '1',
                'name' => 'FUNYULA',
                'created_at' => '2016-06-11 20:54:19',
                'updated_at' => '2016-06-11 20:54:19',
                'deleted_at' => NULL,
            ),
            215 => 
            array (
                'id' => '225',
                'county_id' => '45',
                'user_id' => '1',
                'name' => 'BUDALANGI',
                'created_at' => '2016-06-11 20:54:19',
                'updated_at' => '2016-06-11 20:54:19',
                'deleted_at' => NULL,
            ),
            216 => 
            array (
                'id' => '226',
                'county_id' => '29',
                'user_id' => '1',
                'name' => 'UGENYA',
                'created_at' => '2016-06-11 20:54:19',
                'updated_at' => '2016-06-11 20:54:19',
                'deleted_at' => NULL,
            ),
            217 => 
            array (
                'id' => '227',
                'county_id' => '29',
                'user_id' => '1',
                'name' => 'UGUNJA',
                'created_at' => '2016-06-11 20:54:19',
                'updated_at' => '2016-06-11 20:54:19',
                'deleted_at' => NULL,
            ),
            218 => 
            array (
                'id' => '228',
                'county_id' => '29',
                'user_id' => '1',
                'name' => 'ALEGO USONGA',
                'created_at' => '2016-06-11 20:54:19',
                'updated_at' => '2016-06-11 20:54:19',
                'deleted_at' => NULL,
            ),
            219 => 
            array (
                'id' => '229',
                'county_id' => '29',
                'user_id' => '1',
                'name' => 'GEM',
                'created_at' => '2016-06-11 20:54:19',
                'updated_at' => '2016-06-11 20:54:19',
                'deleted_at' => NULL,
            ),
            220 => 
            array (
                'id' => '230',
                'county_id' => '29',
                'user_id' => '1',
                'name' => 'BONDO',
                'created_at' => '2016-06-11 20:54:19',
                'updated_at' => '2016-06-11 20:54:19',
                'deleted_at' => NULL,
            ),
            221 => 
            array (
                'id' => '231',
                'county_id' => '29',
                'user_id' => '1',
                'name' => 'RARIEDA',
                'created_at' => '2016-06-11 20:54:19',
                'updated_at' => '2016-06-11 20:54:19',
                'deleted_at' => NULL,
            ),
            222 => 
            array (
                'id' => '232',
                'county_id' => '26',
                'user_id' => '1',
                'name' => 'KISUMU EAST',
                'created_at' => '2016-06-11 20:54:20',
                'updated_at' => '2016-06-11 20:54:20',
                'deleted_at' => NULL,
            ),
            223 => 
            array (
                'id' => '233',
                'county_id' => '26',
                'user_id' => '1',
                'name' => 'KISUMU WEST',
                'created_at' => '2016-06-11 20:54:20',
                'updated_at' => '2016-06-11 20:54:20',
                'deleted_at' => NULL,
            ),
            224 => 
            array (
                'id' => '234',
                'county_id' => '26',
                'user_id' => '1',
                'name' => 'KISUMU CENTRAL',
                'created_at' => '2016-06-11 20:54:20',
                'updated_at' => '2016-06-11 20:54:20',
                'deleted_at' => NULL,
            ),
            225 => 
            array (
                'id' => '235',
                'county_id' => '26',
                'user_id' => '1',
                'name' => 'SEME',
                'created_at' => '2016-06-11 20:54:20',
                'updated_at' => '2016-06-11 20:54:20',
                'deleted_at' => NULL,
            ),
            226 => 
            array (
                'id' => '236',
                'county_id' => '26',
                'user_id' => '1',
                'name' => 'NYANDO',
                'created_at' => '2016-06-11 20:54:20',
                'updated_at' => '2016-06-11 20:54:20',
                'deleted_at' => NULL,
            ),
            227 => 
            array (
                'id' => '237',
                'county_id' => '26',
                'user_id' => '1',
                'name' => 'MUHORONI',
                'created_at' => '2016-06-11 20:54:20',
                'updated_at' => '2016-06-11 20:54:20',
                'deleted_at' => NULL,
            ),
            228 => 
            array (
                'id' => '238',
                'county_id' => '26',
                'user_id' => '1',
                'name' => 'NYAKACH',
                'created_at' => '2016-06-11 20:54:20',
                'updated_at' => '2016-06-11 20:54:20',
                'deleted_at' => NULL,
            ),
            229 => 
            array (
                'id' => '239',
                'county_id' => '24',
                'user_id' => '1',
                'name' => 'KASIPUL',
                'created_at' => '2016-06-11 20:54:20',
                'updated_at' => '2016-06-11 20:54:20',
                'deleted_at' => NULL,
            ),
            230 => 
            array (
                'id' => '240',
                'county_id' => '24',
                'user_id' => '1',
                'name' => 'KABONDO KASIPUL',
                'created_at' => '2016-06-11 20:54:20',
                'updated_at' => '2016-06-11 20:54:20',
                'deleted_at' => NULL,
            ),
            231 => 
            array (
                'id' => '241',
                'county_id' => '24',
                'user_id' => '1',
                'name' => 'KARACHUONYO',
                'created_at' => '2016-06-11 20:54:21',
                'updated_at' => '2016-06-11 20:54:21',
                'deleted_at' => NULL,
            ),
            232 => 
            array (
                'id' => '242',
                'county_id' => '24',
                'user_id' => '1',
                'name' => 'RANGWE',
                'created_at' => '2016-06-11 20:54:21',
                'updated_at' => '2016-06-11 20:54:21',
                'deleted_at' => NULL,
            ),
            233 => 
            array (
                'id' => '243',
                'county_id' => '24',
                'user_id' => '1',
                'name' => 'HOMA BAY TOWN',
                'created_at' => '2016-06-11 20:54:21',
                'updated_at' => '2016-06-11 20:54:21',
                'deleted_at' => NULL,
            ),
            234 => 
            array (
                'id' => '244',
                'county_id' => '24',
                'user_id' => '1',
                'name' => 'NDHIWA',
                'created_at' => '2016-06-11 20:54:21',
                'updated_at' => '2016-06-11 20:54:21',
                'deleted_at' => NULL,
            ),
            235 => 
            array (
                'id' => '245',
                'county_id' => '24',
                'user_id' => '1',
                'name' => 'SUBA NORTH',
                'created_at' => '2016-06-11 20:54:21',
                'updated_at' => '2016-06-11 20:54:21',
                'deleted_at' => NULL,
            ),
            236 => 
            array (
                'id' => '246',
                'county_id' => '24',
                'user_id' => '1',
                'name' => 'SUBA SOUTH',
                'created_at' => '2016-06-11 20:54:21',
                'updated_at' => '2016-06-11 20:54:21',
                'deleted_at' => NULL,
            ),
            237 => 
            array (
                'id' => '247',
                'county_id' => '27',
                'user_id' => '1',
                'name' => 'RONGO',
                'created_at' => '2016-06-11 20:54:21',
                'updated_at' => '2016-06-11 20:54:21',
                'deleted_at' => NULL,
            ),
            238 => 
            array (
                'id' => '248',
                'county_id' => '27',
                'user_id' => '1',
                'name' => 'AWENDO',
                'created_at' => '2016-06-11 20:54:21',
                'updated_at' => '2016-06-11 20:54:21',
                'deleted_at' => NULL,
            ),
            239 => 
            array (
                'id' => '249',
                'county_id' => '27',
                'user_id' => '1',
                'name' => 'SUNA EAST',
                'created_at' => '2016-06-11 20:54:21',
                'updated_at' => '2016-06-11 20:54:21',
                'deleted_at' => NULL,
            ),
            240 => 
            array (
                'id' => '250',
                'county_id' => '27',
                'user_id' => '1',
                'name' => 'SUNA WEST',
                'created_at' => '2016-06-11 20:54:21',
                'updated_at' => '2016-06-11 20:54:21',
                'deleted_at' => NULL,
            ),
            241 => 
            array (
                'id' => '251',
                'county_id' => '27',
                'user_id' => '1',
                'name' => 'URIRI',
                'created_at' => '2016-06-11 20:54:22',
                'updated_at' => '2016-06-11 20:54:22',
                'deleted_at' => NULL,
            ),
            242 => 
            array (
                'id' => '252',
                'county_id' => '27',
                'user_id' => '1',
                'name' => 'NYATIKE',
                'created_at' => '2016-06-11 20:54:22',
                'updated_at' => '2016-06-11 20:54:22',
                'deleted_at' => NULL,
            ),
            243 => 
            array (
                'id' => '253',
                'county_id' => '27',
                'user_id' => '1',
                'name' => 'KURIA WEST',
                'created_at' => '2016-06-11 20:54:22',
                'updated_at' => '2016-06-11 20:54:22',
                'deleted_at' => NULL,
            ),
            244 => 
            array (
                'id' => '254',
                'county_id' => '27',
                'user_id' => '1',
                'name' => 'KURIA EAST',
                'created_at' => '2016-06-11 20:54:22',
                'updated_at' => '2016-06-11 20:54:22',
                'deleted_at' => NULL,
            ),
            245 => 
            array (
                'id' => '255',
                'county_id' => '25',
                'user_id' => '1',
                'name' => 'BONCHARI',
                'created_at' => '2016-06-11 20:54:22',
                'updated_at' => '2016-06-11 20:54:22',
                'deleted_at' => NULL,
            ),
            246 => 
            array (
                'id' => '256',
                'county_id' => '25',
                'user_id' => '1',
                'name' => 'SOUTH MUGIRANGO',
                'created_at' => '2016-06-11 20:54:22',
                'updated_at' => '2016-06-11 20:54:22',
                'deleted_at' => NULL,
            ),
            247 => 
            array (
                'id' => '257',
                'county_id' => '25',
                'user_id' => '1',
                'name' => 'BOMACHOGE BORABU',
                'created_at' => '2016-06-11 20:54:22',
                'updated_at' => '2016-06-11 20:54:22',
                'deleted_at' => NULL,
            ),
            248 => 
            array (
                'id' => '258',
                'county_id' => '25',
                'user_id' => '1',
                'name' => 'BOBASI',
                'created_at' => '2016-06-11 20:54:22',
                'updated_at' => '2016-06-11 20:54:22',
                'deleted_at' => NULL,
            ),
            249 => 
            array (
                'id' => '259',
                'county_id' => '25',
                'user_id' => '1',
                'name' => 'BOMACHOGE CHACHE',
                'created_at' => '2016-06-11 20:54:22',
                'updated_at' => '2016-06-11 20:54:22',
                'deleted_at' => NULL,
            ),
            250 => 
            array (
                'id' => '260',
                'county_id' => '25',
                'user_id' => '1',
                'name' => 'NYARIBARI MASABA',
                'created_at' => '2016-06-11 20:54:22',
                'updated_at' => '2016-06-11 20:54:22',
                'deleted_at' => NULL,
            ),
            251 => 
            array (
                'id' => '261',
                'county_id' => '25',
                'user_id' => '1',
                'name' => 'NYARIBARI CHACHE',
                'created_at' => '2016-06-11 20:54:22',
                'updated_at' => '2016-06-11 20:54:22',
                'deleted_at' => NULL,
            ),
            252 => 
            array (
                'id' => '262',
                'county_id' => '25',
                'user_id' => '1',
                'name' => 'KITUTU CHACHE NORTH',
                'created_at' => '2016-06-11 20:54:22',
                'updated_at' => '2016-06-11 20:54:22',
                'deleted_at' => NULL,
            ),
            253 => 
            array (
                'id' => '263',
                'county_id' => '25',
                'user_id' => '1',
                'name' => 'KITUTU CHACHE SOUTH',
                'created_at' => '2016-06-11 20:54:23',
                'updated_at' => '2016-06-11 20:54:23',
                'deleted_at' => NULL,
            ),
            254 => 
            array (
                'id' => '264',
                'county_id' => '28',
                'user_id' => '1',
                'name' => 'KITUTU MASABA',
                'created_at' => '2016-06-11 20:54:23',
                'updated_at' => '2016-06-11 20:54:23',
                'deleted_at' => NULL,
            ),
            255 => 
            array (
                'id' => '265',
                'county_id' => '28',
                'user_id' => '1',
                'name' => 'WEST MUGIRANGO',
                'created_at' => '2016-06-11 20:54:23',
                'updated_at' => '2016-06-11 20:54:23',
                'deleted_at' => NULL,
            ),
            256 => 
            array (
                'id' => '266',
                'county_id' => '28',
                'user_id' => '1',
                'name' => 'NORTH MUGIRANGO',
                'created_at' => '2016-06-11 20:54:23',
                'updated_at' => '2016-06-11 20:54:23',
                'deleted_at' => NULL,
            ),
            257 => 
            array (
                'id' => '267',
                'county_id' => '28',
                'user_id' => '1',
                'name' => 'BORABU',
                'created_at' => '2016-06-11 20:54:23',
                'updated_at' => '2016-06-11 20:54:23',
                'deleted_at' => NULL,
            ),
            258 => 
            array (
                'id' => '268',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'WESTLANDS',
                'created_at' => '2016-06-11 20:54:23',
                'updated_at' => '2016-06-11 20:54:23',
                'deleted_at' => NULL,
            ),
            259 => 
            array (
                'id' => '269',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'DAGORETTI NORTH',
                'created_at' => '2016-06-11 20:54:23',
                'updated_at' => '2016-06-11 20:54:23',
                'deleted_at' => NULL,
            ),
            260 => 
            array (
                'id' => '270',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'DAGORETTI SOUTH',
                'created_at' => '2016-06-11 20:54:23',
                'updated_at' => '2016-06-11 20:54:23',
                'deleted_at' => NULL,
            ),
            261 => 
            array (
                'id' => '271',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'LANGATA',
                'created_at' => '2016-06-11 20:54:23',
                'updated_at' => '2016-06-11 20:54:23',
                'deleted_at' => NULL,
            ),
            262 => 
            array (
                'id' => '272',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'KIBRA',
                'created_at' => '2016-06-11 20:54:23',
                'updated_at' => '2016-06-11 20:54:23',
                'deleted_at' => NULL,
            ),
            263 => 
            array (
                'id' => '273',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'ROYSAMBU',
                'created_at' => '2016-06-11 20:54:24',
                'updated_at' => '2016-06-11 20:54:24',
                'deleted_at' => NULL,
            ),
            264 => 
            array (
                'id' => '274',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'KASARANI',
                'created_at' => '2016-06-11 20:54:24',
                'updated_at' => '2016-06-11 20:54:24',
                'deleted_at' => NULL,
            ),
            265 => 
            array (
                'id' => '275',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'RUARAKA',
                'created_at' => '2016-06-11 20:54:24',
                'updated_at' => '2016-06-11 20:54:24',
                'deleted_at' => NULL,
            ),
            266 => 
            array (
                'id' => '276',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'EMBAKASI SOUTH',
                'created_at' => '2016-06-11 20:54:24',
                'updated_at' => '2016-06-11 20:54:24',
                'deleted_at' => NULL,
            ),
            267 => 
            array (
                'id' => '277',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'EMBAKASI NORTH',
                'created_at' => '2016-06-11 20:54:24',
                'updated_at' => '2016-06-11 20:54:24',
                'deleted_at' => NULL,
            ),
            268 => 
            array (
                'id' => '278',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'EMBAKASI CENTRAL',
                'created_at' => '2016-06-11 20:54:24',
                'updated_at' => '2016-06-11 20:54:24',
                'deleted_at' => NULL,
            ),
            269 => 
            array (
                'id' => '279',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'EMBAKASI EAST',
                'created_at' => '2016-06-11 20:54:24',
                'updated_at' => '2016-06-11 20:54:24',
                'deleted_at' => NULL,
            ),
            270 => 
            array (
                'id' => '280',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'EMBAKASI WEST',
                'created_at' => '2016-06-11 20:54:24',
                'updated_at' => '2016-06-11 20:54:24',
                'deleted_at' => NULL,
            ),
            271 => 
            array (
                'id' => '281',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'MAKADARA',
                'created_at' => '2016-06-11 20:54:25',
                'updated_at' => '2016-06-11 20:54:25',
                'deleted_at' => NULL,
            ),
            272 => 
            array (
                'id' => '282',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'KAMUKUNJI',
                'created_at' => '2016-06-11 20:54:25',
                'updated_at' => '2016-06-11 20:54:25',
                'deleted_at' => NULL,
            ),
            273 => 
            array (
                'id' => '283',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'STAREHE',
                'created_at' => '2016-06-11 20:54:25',
                'updated_at' => '2016-06-11 20:54:25',
                'deleted_at' => NULL,
            ),
            274 => 
            array (
                'id' => '284',
                'county_id' => '20',
                'user_id' => '1',
                'name' => 'MATHARE',
                'created_at' => '2016-06-11 20:54:25',
                'updated_at' => '2016-06-11 20:54:25',
                'deleted_at' => NULL,
            ),
            275 => 
            array (
                'id' => '285',
                'county_id' => '32',
                'user_id' => '1',
                'name' => 'MARAKWET EAST',
                'created_at' => '2016-06-11 21:15:08',
                'updated_at' => '2016-06-11 21:15:08',
                'deleted_at' => NULL,
            ),
            276 => 
            array (
                'id' => '286',
                'county_id' => '32',
                'user_id' => '1',
                'name' => 'MARAKWET WEST',
                'created_at' => '2016-06-11 21:15:08',
                'updated_at' => '2016-06-11 21:15:08',
                'deleted_at' => NULL,
            ),
            277 => 
            array (
                'id' => '287',
                'county_id' => '32',
                'user_id' => '1',
                'name' => 'KEIYO NORTH',
                'created_at' => '2016-06-11 21:15:09',
                'updated_at' => '2016-06-11 21:15:09',
                'deleted_at' => NULL,
            ),
            278 => 
            array (
                'id' => '288',
                'county_id' => '32',
                'user_id' => '1',
                'name' => 'KEIYO SOUTH',
                'created_at' => '2016-06-11 21:15:09',
                'updated_at' => '2016-06-11 21:15:09',
                'deleted_at' => NULL,
            ),
            279 => 
            array (
                'id' => '289',
                'county_id' => '3',
                'user_id' => '1',
                'name' => 'KANGEMA',
                'created_at' => '2016-06-11 21:17:12',
                'updated_at' => '2016-06-11 21:17:12',
                'deleted_at' => NULL,
            ),
            280 => 
            array (
                'id' => '290',
                'county_id' => '3',
                'user_id' => '1',
                'name' => 'MATHIOYA',
                'created_at' => '2016-06-11 21:17:13',
                'updated_at' => '2016-06-11 21:17:13',
                'deleted_at' => NULL,
            ),
            281 => 
            array (
                'id' => '291',
                'county_id' => '3',
                'user_id' => '1',
                'name' => 'KIHARU',
                'created_at' => '2016-06-11 21:17:13',
                'updated_at' => '2016-06-11 21:17:13',
                'deleted_at' => NULL,
            ),
            282 => 
            array (
                'id' => '292',
                'county_id' => '3',
                'user_id' => '1',
                'name' => 'KIGUMO',
                'created_at' => '2016-06-11 21:17:13',
                'updated_at' => '2016-06-11 21:17:13',
                'deleted_at' => NULL,
            ),
            283 => 
            array (
                'id' => '293',
                'county_id' => '3',
                'user_id' => '1',
                'name' => 'MARAGWA',
                'created_at' => '2016-06-11 21:17:13',
                'updated_at' => '2016-06-11 21:17:13',
                'deleted_at' => NULL,
            ),
            284 => 
            array (
                'id' => '294',
                'county_id' => '3',
                'user_id' => '1',
                'name' => 'KANDARA',
                'created_at' => '2016-06-11 21:17:14',
                'updated_at' => '2016-06-11 21:17:14',
                'deleted_at' => NULL,
            ),
            285 => 
            array (
                'id' => '295',
                'county_id' => '3',
                'user_id' => '1',
                'name' => 'GATANGA',
                'created_at' => '2016-06-11 21:17:14',
                'updated_at' => '2016-06-11 21:17:14',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
