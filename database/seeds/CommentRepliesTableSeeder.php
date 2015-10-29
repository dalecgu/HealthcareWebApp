<?php

use Illuminate\Database\Seeder;

use App\CommentReply;

class CommentRepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commentReply = new CommentReply();

        $commentReply->reply_id = 1;
        $commentReply->user_id = 5;
        $commentReply->content = 'testtest';

        $commentReply->save();
    }
}
