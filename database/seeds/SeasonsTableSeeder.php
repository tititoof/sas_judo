<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Model;
use Carbon\Carbon;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = [
            ['name' => '2017', 'start_at' => Carbon::createFromDate(2017, 1, 1, 'Europe/Paris'), 'end_at' => Carbon::createFromDate(2017, 12, 31, 'Europe/Paris')],
            ['name' => '2018', 'start_at' => Carbon::createFromDate(2018, 1, 1, 'Europe/Paris'), 'end_at' => Carbon::createFromDate(2018, 12, 31, 'Europe/Paris')],
            ['name' => '2019', 'start_at' => Carbon::createFromDate(2019, 1, 1, 'Europe/Paris'), 'end_at' => Carbon::createFromDate(2019, 12, 31, 'Europe/Paris')],
        ];
        array_walk($seasons, [$this, 'insert']);
    }

    private function insert($season)
    {
        DB::table('seasons')->insert($season);
    }
}
