<?php

namespace App\Http\Controllers\Activity;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UserJoinActivities;

use Auth;
use Response;

class ActivityController extends Controller
{
    public function index()
    {
        return view('activity.index');
    }

    public function joinActivity($id)
    {
        $userJoinActivitys = new UserJoinActivities();
        $userJoinActivitys->user_id = Auth::user()->id;
        $userJoinActivitys->activity_id = $id;
        $userJoinActivitys->save();
        return Response::json(array());
    }

    public function exitActivity($id)
    {
        UserJoinActivities::where('user_id', Auth::user()->id)
            ->where('activity_id', $id)
            ->delete();
        return Response::json(array());
    }
}
