<?php

use Illuminate\Database\Seeder;

use App\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment();

        $comment->moment_id = 1;
        $comment->user_id = 5;
        $comment->content = 'Comment On Your Moment';

        $comment->save();
    }
}
