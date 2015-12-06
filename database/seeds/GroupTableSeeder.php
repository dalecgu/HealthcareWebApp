<?php

use Illuminate\Database\Seeder;

use App\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new Group();

        $group->name = 'Test Group';
        $group->tag = '其他';
        $group->description = 'just for test';
        $group->creator_id = 1;

        $group->save();
    }
}
