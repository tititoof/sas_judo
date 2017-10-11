<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Model;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('categories')->delete();
        $categories = [
            ['name' => 'Les news',          'type' => 'NewsFactory',],
            ['name' => 'Adhérents',         'type' => 'NewsFactory',],
            ['name' => 'Le bureau',         'type' => 'ArticlesFactory',],
            ['name' => 'Les bons moments',  'type' => 'NewsFactory',],
            ['name' => 'Compétitions',      'type' => 'NewsFactory',],
            ['name' => 'Cotisations',       'type' => 'NewsFactory',],
            ['name' => 'Résultats',         'type' => 'ArticlesFactory',],
        ];
        array_walk($categories, [$this, 'insertCategory']);
    }

    private function insertCategory($category)
    {
        DB::table('categories')->insert($category);
    }
}
