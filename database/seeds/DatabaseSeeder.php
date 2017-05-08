<?php

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
        // $this->call(UsersTableSeeder::class);
        // $this->call(MenusTableSeeder::class);
        // $this->command->info('Menus seeder done.');
        // $this->call(SeasonsTableSeeder::class);
        // $this->command->info('Seasons seeder done.');
        // $this->call(AgesCategoriesTableSeeder::class);
        // $this->command->info('Ages Categories seeder done.');
        $this->call(CoursesTableSeeder::class);
        $this->command->info('Courses seeder done.');
    }
}
