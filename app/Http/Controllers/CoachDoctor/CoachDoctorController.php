<?php

namespace App\Http\Controllers\CoachDoctor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;

use App\Advice;

class CoachDoctorController extends Controller
{

    public function index()
    {
        return view('coachdoctor.index');
    }

    public function postAdvice()
    {
        echo "ok";
        $advice = new Advice();
        $advice->user_id = $request->input('user_id');
        $advice->advisor_id = Auth::user()->id;
        $advice->content = $request->input('content');
        $advice->save();
        return Redirect::back()->withInput();
    }
}
