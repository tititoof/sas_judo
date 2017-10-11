<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Christophe Hartmann',
            'email'     => 'chartmann.35@gmail.com',
            'password'      => bcrypt('#!y20DebBK'),
            'is_admin'      => true,
            'is_debug'      => true,
            'firstname'     => 'Christophe',
            'lastname'      => 'Hartmann',
            'address'       => '4 rue Auguste Fouquet 37550 Saint Avertin',
            'phone'         => '0665711975',
            'is_teacher'    => false,
        ]);
    }
}
