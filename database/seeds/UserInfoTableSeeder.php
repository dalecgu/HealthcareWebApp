<?php

use Illuminate\Database\Seeder;

use App\UserInfo;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_info = new UserInfo();

        $user_info->id = 2;
        $user_info->nickname = 'CoachBot';
        $user_info->gendor = '男';
        $user_info->age = 39;
        $user_info->location = '江苏省南京市';
        $user_info->company = 'XX健身俱乐部';
        $user_info->description = '教练';
        
        $user_info->save();

        $user_info = new UserInfo();

        $user_info->id = 3;
        $user_info->nickname = 'DoctorBot';
        $user_info->gendor = '男';
        $user_info->age = 40;
        $user_info->location = '江苏省南京市';
        $user_info->company = '鼓楼医院';
        $user_info->description = '主任';
        
        $user_info->save();
    }
}
