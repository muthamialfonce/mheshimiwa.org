an<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('RegionsTableSeeder');
        $this->call('CountiesTableSeeder');
        $this->call('ConstituenciesTableSeeder');
        $this->call('WardsTableSeeder');
        $this->call('PoliticalLevelsTableSeeder');
        $this->call('PoliticalSeatsTableSeeder');
        $this->call('AcademicLevelsTableSeeder');
        $this->call('RatesTableSeeder');
        $this->call('PoliticalPartiesTableSeeder');
    }
}
