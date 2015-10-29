<?php

use Illuminate\Database\Seeder;

use App\Advice;

class AdviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advice = new Advice();

        $advice->user_id = 1;
        $advice->advisor_id = 2;
        $advice->content = '多喝热水';

        $advice->save();
    }
}
