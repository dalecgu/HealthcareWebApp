<?php

use Illuminate\Database\Seeder;

use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $createUser = new Permission();
        $createUser->name = 'create-user';
        $createUser->display_name = '创建用户';
        $createUser->description = '创建用户';
        $createUser->save();

        $updateUser = new Permission();
        $updateUser->name = 'update-user';
        $updateUser->display_name = '修改用户';
        $updateUser->description = '修改用户';
        $updateUser->save();

        $deleteUser = new Permission();
        $deleteUser->name = 'delete-user';
        $deleteUser->display_name = '删除用户';
        $deleteUser->description = '删除用户';
        $deleteUser->save();

        $createAdvice = new Permission();
        $createAdvice->name = 'create-advice';
        $createAdvice->display_name = '创建建议';
        $createAdvice->description = '创建建议';
        $createAdvice->save();

        $updateAdvice = new Permission();
        $updateAdvice->name = 'update-advice';
        $updateAdvice->display_name = '修改建议';
        $updateAdvice->description = '修改建议';
        $updateAdvice->save();

        $deleteAdvice = new Permission();
        $deleteAdvice->name = 'delete-advice';
        $deleteAdvice->display_name = '删除建议';
        $deleteAdvice->description = '删除建议';
        $deleteAdvice->save();
    }
}
