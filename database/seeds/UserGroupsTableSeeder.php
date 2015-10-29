<?php

use Illuminate\Database\Seeder;

use App\UserJoinGroups;

class UserGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userJoinGroups = new UserJoinGroups();
        $userJoinGroups->user_id = 1;
        $userJoinGroups->group_id = 1;
        $userJoinGroups->save();
    }
}
