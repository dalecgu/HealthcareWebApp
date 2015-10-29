<?php

use Illuminate\Database\Seeder;

use App\UserCoach;

class UserCoachTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_coach = new UserCoach();

        $user_coach->user_id = 1;
        $user_coach->coach_id = 2;

        $user_coach->save();
    }
}
