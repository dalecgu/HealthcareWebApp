<?php

use Illuminate\Database\Seeder;

use App\Reply;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reply = new Reply();

        $reply->topic_id = 1;
        $reply->user_id = 1;
        $reply->quote = 0;
        $reply->content = 'test';

        $reply->save();
    }
}
