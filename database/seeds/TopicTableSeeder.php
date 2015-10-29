<?php

use Illuminate\Database\Seeder;

use App\Topic;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topic = new Topic();

        $topic->group_id = 1;
        $topic->user_id = 1;
        $topic->title = '随便说点啥';
        $topic->content = '说点啥好呢';

        $topic->save();
    }
}
