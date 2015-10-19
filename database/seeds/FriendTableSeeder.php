<?php

use Illuminate\Database\Seeder;

use App\Friend;

class FriendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $friend = new Friend();

        $friend->user_id = 1;
        $friend->friend_id = 5;

        $friend->save();
    }
}
