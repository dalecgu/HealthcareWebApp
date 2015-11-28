<?php

use Illuminate\Database\Seeder;

use App\IndividualInfo;

class IndividualInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $individual_info = new IndividualInfo();

        $individual_info->id = 1;
        $individual_info->nickname = 'lance';
        $individual_info->truename = '罗会祥';
        $individual_info->gendor = '男';
        $individual_info->age = 20;
        $individual_info->birthday = '1994/11/21';
        $individual_info->location = '江苏省南京市';
        $individual_info->email = '2437844933@qq.com';
        $individual_info->qq = '2437844933';
        $individual_info->description = '人之患，在好为人师。';
        
        $individual_info->save();

        $individual_info = new IndividualInfo();

        $individual_info->id = 5;
        $individual_info->nickname = 'ghq';
        $individual_info->truename = '顾恒清';
        $individual_info->gendor = '男';
        $individual_info->age = 20;
        $individual_info->birthday = '1995/04/06';
        $individual_info->location = '江苏省南京市';
        $individual_info->email = '1677160278@qq.com';
        $individual_info->qq = '1677160278';
        $individual_info->description = '技术宅';

        $individual_info->save();
    }
}
