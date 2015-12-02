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
}
