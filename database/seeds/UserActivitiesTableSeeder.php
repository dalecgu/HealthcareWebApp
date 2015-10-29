<?php

use Illuminate\Database\Seeder;

use App\UserJoinActivities;

class UserActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userJoinActivities = new UserJoinActivities();
        $userJoinActivities->user_id = 1;
        $userJoinActivities->activity_id = 1;
        $userJoinActivities->save();
    }
}
