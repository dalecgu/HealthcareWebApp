<?php

namespace App\Http\Controllers\Individual;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Response;

use App\Health;
use App\User;

class HealthController extends Controller
{
    public function statistics()
    {
        $response = array();
        foreach(Health::all()
            ->where('user_id', Auth::user()->id)
            ->sortByDesc(function($item) { return $item->year*10000+$item->month*100+$item->date; })
            ->take(7) as $health) {
            array_push($response, $health);
        }
        return Response::json($response);
    }

    public function rank()
    {
        $groupedHealth = Health::all()->groupBy('user_id');

        $today_rank = [];
        foreach ($groupedHealth as $user_id => $group) {
            $health = $group->sortByDesc(function($item) {
                                    return $item->year*10000+$item->month*100+$item->date;
                                })->take(1);
            $sport = 0;
            foreach ($health as $h) {
                $sport += $h->sport;
            }
            $today_rank[$user_id] = $sport;
        }
        arsort($today_rank);
        $i = 0;
        $today = array();
        foreach (array_slice($today_rank, 0, 3, true) as $key => $value) {
            if ($i == 3) {
                break;
            }
            array_push($today, array(
                'user_id'=>$key,
                'sport'=>$value,
                'name'=>User::where('id', $key)->first()->info->nickname));
            $i++;
        }

        $week_rank = [];
        foreach ($groupedHealth as $user_id => $group) {
            $health = $group->sortByDesc(function($item) {
                                    return $item->year*10000+$item->month*100+$item->date;
                                })->take(7);
            $sport = 0;
            foreach ($health as $h) {
                $sport += $h->sport;
            }
            $week_rank[$user_id] = $sport;
        }
        arsort($week_rank);
        $i = 0;
        $week = array();
        foreach (array_slice($week_rank, 0, 3, true) as $key => $value) {
            if ($i == 3) {
                break;
            }
            array_push($week, array(
                'user_id'=>$key,
                'sport'=>$value,
                'name'=>User::where('id', $key)->first()->info->nickname));
            $i++;
        }

        $month_rank = [];
        foreach ($groupedHealth as $user_id => $group) {
            $health = $group->sortByDesc(function($item) {
                                    return $item->year*10000+$item->month*100+$item->date;
                                })->take(31);
            $sport = 0;
            foreach ($health as $h) {
                $sport += $h->sport;
            }
            $month_rank[$user_id] = $sport;
        }
        arsort($month_rank);
        $i = 0;
        $month = array();
        foreach (array_slice($month_rank, 0, 3, true) as $key => $value) {
            if ($i == 3) {
                break;
            }
            array_push($month, array(
                'user_id'=>$key,
                'sport'=>$value,
                'name'=>User::where('id', $key)->first()->info->nickname));
            $i++;
        }

        return Response::json(array(
            'today' => $today,
            'week' => $week,
            'month' => $month
            ));

    }
}
