<?php

use Illuminate\Database\Seeder;

class AgesCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Débutant', 'years' => 6],
            ['name' => 'Mini-poussin', 'years' => 7],
            ['name' => 'Poussin', 'years' => 9],
            ['name' => 'Benjamin', 'years' => 11],
            ['name' => 'Minime', 'years' => 13],
            ['name' => 'Cadet', 'years' => 15],
            ['name' => 'Junior', 'years' => 18],
            ['name' => 'Senior', 'years' => 21],
        ];
        array_walk($categories, [$this, 'insert']);
    }

    private function insert($category)
    {
        DB::table('age_categories')->insert($category);
    }
}
