<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(IndividualInfoTableSeeder::class);
        $this->call(UserInfoTableSeeder::class);
        $this->call(FriendTableSeeder::class);
        $this->call(UserDoctorTableSeeder::class);
        $this->call(UserCoachTableSeeder::class);
        $this->call(MomentTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
        $this->call(UserActivitiesTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(UserGroupsTableSeeder::class);
        $this->call(AgreeMomentsTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(TopicTableSeeder::class);
        $this->call(ReplyTableSeeder::class);
        $this->call(AdviceTableSeeder::class);

        Model::reguard();
    }
}
