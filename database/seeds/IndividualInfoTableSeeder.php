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
        $individual_info->gendor = '男';
        $individual_info->age = 20;
        $individual_info->birthday = '1994/11/21';
        $individual_info->location = '江苏省南京市';
        $individual_info->hometown = '江苏省南京市';
        $individual_info->occupation = '学生';
        $individual_info->description = '骑行爱好者';
        
        $individual_info->save();

        $individual_info = new IndividualInfo();

        $individual_info->id = 5;
        $individual_info->nickname = 'ghq';
        $individual_info->gendor = '男';
        $individual_info->age = 20;
        $individual_info->birthday = '1995/04/06';
        $individual_info->location = '江苏省南京市';
        $individual_info->hometown = '江苏省南京市';
        $individual_info->occupation = '学生';
        $individual_info->description = '宅男';

        $individual_info->save();
    }
}
