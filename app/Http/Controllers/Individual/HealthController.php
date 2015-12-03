<?php

namespace App\Http\Controllers\Individual;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Health;

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
        $content = file_get_contents($file);
        return $content;
    }
}
