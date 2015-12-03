<?php

namespace App\Http\Controllers\Individual;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Response;

use App\UserInfo;
use App\UserCoach;
use App\UserDoctor;
use App\Advice;
use App\User;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('individual.profile');
    }

    public function updateBasicProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();

        $individual_info = $user->info;
        $individual_info->nickname = $request->input('nickname');
        $individual_info->truename = $request->input('truename');
        $individual_info->location = $request->input('location');
        $individual_info->gendor = $request->input('gendor');
        $individual_info->birthday = $request->input('year')
                                    . '/'
                                    . $request->input('month')
                                    . '/'
                                    . $request->input('date');
        $individual_info->description = $request->input('description');
        $individual_info->save();
        return Response::json($individual_info);
    }

    public function updateContactProfile(Request $request)
    {
        $individual_info = Auth::user()->info;
        $individual_info->email = $request->input('email');
        $individual_info->qq = $request->input('qq');
        $individual_info->save();
        return Response::json($individual_info);
    }

    public function addCoach(Request $request)
    {
        $userCoach = new UserCoach();
        $userCoach->user_id = Auth::user()->id;
        $userCoach->coach_id = $request->input('coach_id');
        $userCoach->save();
        $response = UserInfo::where('id', $request->input('coach_id'))->first();
        return Response::json($response);
    }

    public function deleteCoach()
    {
        UserCoach::where('user_id', Auth::user()->id)->delete();
        return Response::json(array('status' => 'success'));
    }

    public function addDoctor(Request $request)
    {
        $userDoctor = new UserDoctor();
        $userDoctor->user_id = Auth::user()->id;
        $userDoctor->doctor_id = $request->input('doctor_id');
        $userDoctor->save();
        $response = UserInfo::where('id', $request->input('doctor_id'))->first();
        return Response::json($response);
    }

    public function deleteDoctor()
    {
        UserDoctor::where('user_id', Auth::user()->id)->delete();
        return Response::json(array('status' => 'success'));
    }

    public function getAdvice(Request $request)
    {
        if ($request->input('type')=='coach') {
            $id = Auth::user()->coach->coach_id;
        } else if ($request->input('type')=='doctor') {
            $id = Auth::user()->doctor->doctor_id;
        }
        $advices = array();
        foreach (Advice::all()->filter(function($item) use($id) {
            return ($item->advisor_id==Auth::user()->id && $item->user_id==$id)
                || ($item->advisor_id==$id && $item->user_id==Auth::user()->id);
            }) as $key => $advice) {
            array_push($advices, $advice);
        }
        $response = array('name' => User::where('id', $id)->first()->info->nickname,'advices' => $advices);
        return Response::json($response);
    }

    public function postAdvice(Request $request)
    {
        if ($request->input('type')=='coach') {
            $id = Auth::user()->coach->coach_id;
        } else if ($request->input('type')=='doctor') {
            $id = Auth::user()->doctor->doctor_id;
        }
        $advice = new Advice();
        $advice->user_id = $id;
        $advice->advisor_id = Auth::user()->id;
        $advice->content = $request->input('content');
        $advice->save();
        return Response::json(array());
    }
}
