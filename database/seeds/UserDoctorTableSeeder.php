<?php

use Illuminate\Database\Seeder;

use App\UserDoctor;

class UserDoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_doctor = new UserDoctor();

        $user_doctor->user_id = 1;
        $user_doctor->doctor_id = 3;

        $user_doctor->save();
    }
}
