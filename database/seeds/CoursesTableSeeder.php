<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Season;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('email', 'chartmann.35@gmail.com')->get();
        $user  = $users->first();
        $seasons = Season::where('name', '2017')->get();
        $season  = $seasons->first();
        $courses = [
            ['name' => 'Mini Poussins 2008-2009', 'day' => 'Lundi', 'start_at' => Carbon::createFromTime(17, 0, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(18, 0, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Poussins 2006-2007', 'day' => 'Lundi', 'start_at' => Carbon::createFromTime(18, 0, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(19, 0, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Jujitsu (Adultes) Christine Voisin', 'day' => 'Lundi', 'start_at' => Carbon::createFromTime(20, 15, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(21, 30, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Benjamins-Minimes 2003-2004 2005-(2006)', 'day' => 'Mardi', 'start_at' => Carbon::createFromTime(18, 15, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(19, 30, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Adultes (à partir de 2002) ', 'day' => 'Mardi', 'start_at' => Carbon::createFromTime(19, 30, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(21, 00, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Mini Poussins 2008-2009', 'day' => 'Mercredi', 'start_at' => Carbon::createFromTime(17, 30, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(18, 30, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Mini Poussins 2008-2009', 'day' => 'Mercredi', 'start_at' => Carbon::createFromTime(17, 30, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(18, 30, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Poussins 2006-2007', 'day' => 'Mercredi', 'start_at' => Carbon::createFromTime(18, 30, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(19, 30, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Poussins 2006-2007', 'day' => 'Mercredi', 'start_at' => Carbon::createFromTime(18, 30, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(19, 30, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Jujitsu (Adultes) Christine Voisin', 'day' => 'Mercredi', 'start_at' => Carbon::createFromTime(20, 00, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(21, 30, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Débutants 2009-2010', 'day' => 'Jeudi', 'start_at' => Carbon::createFromTime(17, 15, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(18, 15, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Benjamins-Minimes 2003-2004 2005-(2006)', 'day' => 'Vendredi', 'start_at' => Carbon::createFromTime(18, 15, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(19, 30, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Adultes (à partir de 2002)', 'day' => 'Vendredi', 'start_at' => Carbon::createFromTime(19, 30, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(21, 00, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
            ['name' => 'Cours spécifiques : prépa grades, Kata, arbitrage, etc ...', 'day' => 'Samedi', 'start_at' => Carbon::createFromTime(18, 30, 0, 'Europe/Paris'), 'end_at' => Carbon::createFromTime(20, 00, 0, 'Europe/Paris'), 'teacher_id' => $user->id, 'season_id' => $season->id],
        ];
        array_walk($courses, [$this, 'insert']);
    }

    private function insert($course)
    {
        DB::table('courses')->insert($course);
    }
}
