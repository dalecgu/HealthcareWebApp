<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $individual = new Role();
        $individual->name = 'individual';
        $individual->display_name = '个人用户';
        $individual->description = '个人用户';
        $individual->save();

        $coach = new Role();
        $coach->name = 'coach';
        $coach->display_name = '教练';
        $coach->description = '教练';
        $coach->save();

        $coach->attachPermissions(Permission::where('name', 'like', '%-advice')->get());

        $doctor = new Role();
        $doctor->name = 'doctor';
        $doctor->display_name = '医生';
        $doctor->description = '医生';
        $doctor->save();

        $doctor->attachPermissions(Permission::where('name', 'like', '%-advice')->get());

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = '系统管理员';
        $admin->description = '系统管理员';
        $admin->save();

        $admin->attachPermissions(Permission::where('name', 'like', '%-user')->get());
    }
}
