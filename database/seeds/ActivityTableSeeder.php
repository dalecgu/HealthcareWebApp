<?php

use Illuminate\Database\Seeder;

use App\Activity;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activity = new Activity();

        $activity->title = '活动一';
        $activity->description = '一起来玩';
        $activity->begin_time = '2015-10-2';
        $activity->end_time = '2015-10-25';

        $activity->save();
    }
}
