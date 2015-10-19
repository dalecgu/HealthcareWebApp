<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $individual = new User();
        $individual->name = 'individual';
        $individual->email = 'individual@example.com';
        $individual->password = bcrypt('individual');
        $individual->remember_token = str_random(10);
        $individual->save();

        $individual->attachRole(Role::where('name', '=', 'individual')->first());

        $coach = new User();
        $coach->name = 'coach';
        $coach->email = 'coach@example.com';
        $coach->password = bcrypt('coach');
        $coach->remember_token = str_random(10);
        $coach->save();

        $coach->attachRole(Role::where('name', '=', 'coach')->first());

        $doctor = new User();
        $doctor->name = 'doctor';
        $doctor->email = 'doctor@example.com';
        $doctor->password = bcrypt('doctor');
        $doctor->remember_token = str_random(10);
        $doctor->save();

        $doctor->attachRole(Role::where('name', '=', 'doctor')->first());

        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->remember_token = str_random(10);
        $admin->save();

        $admin->attachRole(Role::where('name', '=', 'admin')->first());

        $individual2 = new User();
        $individual2->name = 'individual2';
        $individual2->email = 'individual2@example.com';
        $individual2->password = bcrypt('individual');
        $individual2->remember_token = str_random(10);
        $individual2->save();

        $individual2->attachRole(Role::where('name', '=', 'individual')->first());

    }
}
