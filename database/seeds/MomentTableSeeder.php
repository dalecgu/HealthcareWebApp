<?php

use Illuminate\Database\Seeder;

use App\Moment;

class MomentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moment = new Moment();
        
        $moment->user_id = 1;
        $moment->content = '我是动态';

        $moment->save();
    }
}
