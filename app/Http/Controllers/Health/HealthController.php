<?php

namespace App\Http\Controllers\Health;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Health;

use Redirect;

class HealthController extends Controller
{
    function index(Request $request)
    {
        return view('health.index');
    }

    function postDailyData(Request $request)
    {
        $health = new Health();
        $file = $request->file('daily_health_data');
        $dailyData = simplexml_load_file($file);
        $health->user_id = $dailyData->user->id;
        $health->year = $dailyData->day->year;
        $health->month = $dailyData->day->month;
        $health->date = $dailyData->day->date;
        $health->sport = $dailyData->sport['total_length'];
        $health->sleep = $dailyData->sleep['total_time'];
        $health->blood_pressure_low = $dailyData->blood_pressure['average_low'];
        $health->blood_pressure_high = $dailyData->blood_pressure['average_high'];
        $health->heart_rate = $dailyData->heart_rate['average'];
        $health->save();
        return Redirect::back();
    }
}
