<?php

namespace App\Http\Controllers\Individual;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Redirect;

use App\IndividualInfo;
use App\UserCoach;
use App\UserDoctor;

class IndividualController extends Controller
{

    public function index()
    {
        return view('individual.index');
    }

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

        return Redirect::back();
    }

    public function updateContactProfile(Request $request)
    {
        $individual_info = Auth::user()->info;
        $individual_info->email = $request->input('email');
        $individual_info->qq = $request->input('qq');
        $individual_info->save();

        return Redirect::back();
    }

    public function addCoach(Request $request)
    {
        $userCoach = new UserCoach();
        $userCoach->user_id = Auth::user()->id;
        $userCoach->coach_id = $request->input('coach_id');
        $userCoach->save();
        return Redirect::to('/individual/profile');
    }

    public function deleteCoach()
    {
        UserCoach::where('user_id', Auth::user()->id)->delete();
        return Redirect::to('/individual/profile');
    }

    public function addDoctor(Request $request)
    {
        $userDoctor = new UserDoctor();
        $userDoctor->user_id = Auth::user()->id;
        $userDoctor->doctor_id = $request->input('doctor_id');
        $userDoctor->save();
        return Redirect::to('/individual/profile');
    }

    public function deleteDoctor()
    {
        UserDoctor::where('user_id', Auth::user()->id)->delete();
        return Redirect::to('/individual/profile');
    }
}
