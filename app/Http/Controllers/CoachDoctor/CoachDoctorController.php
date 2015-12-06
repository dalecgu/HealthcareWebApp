<?php

namespace App\Http\Controllers\CoachDoctor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;
use Response;
use Auth;

use App\Advice;

class CoachDoctorController extends Controller
{

    public function index()
    {
        return view('coachdoctor.index');
    }

    public function getAdvice(Request $request)
    {
        $advices = array();
        foreach (Advice::all()->filter(function($item) use($request) {
            return ($item->advisor_id==Auth::user()->id && $item->user_id==$request->input('user_id'))
                || ($item->advisor_id==$request->input('user_id') && $item->user_id==Auth::user()->id);
            }) as $key => $advice) {
            array_push($advices, $advice);
        }
        $response = array('advices' => $advices);
        return Response::json($response);
    }

    public function postAdvice(Request $request)
    {
        $advice = new Advice();
        $advice->user_id = $request->input('user_id');
        $advice->advisor_id = Auth::user()->id;
        $advice->content = $request->input('content');
        $advice->save();
        $advices = array();
        foreach (Advice::all()->filter(function($item) use($request) {
            return ($item->advisor_id==Auth::user()->id && $item->user_id==$request->input('user_id'))
                || ($item->advisor_id==$request->input('user_id') && $item->user_id==Auth::user()->id);
            }) as $key => $a) {
            array_push($advices, $a);
        }
        $response = array('advices' => $advices);
        return Response::json($response);
    }

    public function updateProfile(Request $request)
    {
        $user_info = Auth::user()->info;
        $user_info->nickname = $request->input('nickname');
        $user_info->gendor = $request->input('gendor');
        $user_info->age = $request->input('age');
        $user_info->location = $request->input('location');
        $user_info->company = $request->input('company');
        $user_info->description = $request->input('description');
        $user_info->save();
        return Response::json($user_info);
    }
}
