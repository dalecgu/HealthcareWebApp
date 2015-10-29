<?php

use Illuminate\Database\Seeder;

use App\AgreeMoment;

class AgreeMomentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agreeMoment = new AgreeMoment();

        $agreeMoment->user_id = 5;
        $agreeMoment->moment_id = 1;

        $agreeMoment->save();
    }
}
