<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;
use Input;

use App\User;
use App\Role;
use App\UserInfo;
use App\IndividualInfo;

class AdminController extends Controller
{
    const ERROR_EXIST_USERNAME = 0;
    const ERROR_EXIST_EMAIL = 1;
    const ERROR_EASY_PASSWORD = 2;

    public function user()
    {
        return view('admin.user');
    }

    public function coach()
    {
        return view('admin.coach');
    }

    public function doctor()
    {
        return view('admin.doctor');
    }

    public function activity()
    {
        return view('admin.activity');
    }

    public function addUser()
    {
        return view('admin.addUser');
    }

    public function createUser(Request $request)
    {
        Input::flash();

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $errors = array();
        if (User::all()->where('name', $name)->count()>0) {
            array_push($errors, AdminController::ERROR_EXIST_USERNAME);
        }
        if (User::all()->where('email', $email)->count()>0) {
            array_push($errors, AdminController::ERROR_EXIST_EMAIL);
        }
        if (count($errors)>0) {
            return view('admin.addUser', ['errors' => $errors]);
        }

        $individual = new User();
        $individual->name = $name;
        $individual->email = $email;
        $individual->password = bcrypt($password);
        $individual->status = User::OFFLINE;
        $individual->save();

        $individual->attachRole(Role::where('name', '=', 'individual')->first());

        $individual_info = new IndividualInfo();
        $individual_info->id = $individual->id;
        $individual_info->nickname = $name;
        $individual_info->truename = '';
        $individual_info->gendor = '';
        $individual_info->age = 0;
        $individual_info->birthday = '';
        $individual_info->location = '';
        $individual_info->email = $individual->email;
        $individual_info->qq = '';
        $individual_info->description = '';
        $individual_info->save();

        return Redirect::to('/admin/user');
    }

    public function addCoach()
    {
        return view('admin.addCoach');
    }

    public function createCoach(Request $request)
    {
        Input::flash();

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $errors = array();
        if (User::all()->where('name', $name)->count()>0) {
            array_push($errors, AdminController::ERROR_EXIST_USERNAME);
        }
        if (User::all()->where('email', $email)->count()>0) {
            array_push($errors, AdminController::ERROR_EXIST_EMAIL);
        }
        if (count($errors)>0) {
            return view('admin.addCoach', ['errors' => $errors]);
        }

        $coach = new User();
        $coach->name = $name;
        $coach->email = $email;
        $coach->password = bcrypt($password);
        $coach->status = User::OFFLINE;
        $coach->save();

        $coach->attachRole(Role::where('name', '=', 'coach')->first());

        $user_info = new UserInfo();
        $user_info->id = $coach->id;
        $user_info->nickname = $name;
        $user_info->gendor = '';
        $user_info->age = 0;
        $user_info->location = '';
        $user_info->company = '';
        $user_info->description = '';      
        $user_info->save();

        return Redirect::to('/admin/coach');
    }

    public function addDoctor()
    {
        return view('admin.addDoctor');
    }

    public function createDoctor(Request $request)
    {
        Input::flash();
        
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $errors = array();
        if (User::all()->where('name', $name)->count()>0) {
            array_push($errors, AdminController::ERROR_EXIST_USERNAME);
        }
        if (User::all()->where('email', $email)->count()>0) {
            array_push($errors, AdminController::ERROR_EXIST_EMAIL);
        }
        if (count($errors)>0) {
            return view('admin.addDoctor', ['errors' => $errors]);
        }

        $doctor = new User();
        $doctor->name = $name;
        $doctor->email = $email;
        $doctor->password = bcrypt($password);
        $doctor->status = User::OFFLINE;
        $doctor->save();

        $doctor->attachRole(Role::where('name', '=', 'doctor')->first());

        $user_info = new UserInfo();
        $user_info->id = $doctor->id;
        $user_info->nickname = $name;
        $user_info->gendor = '';
        $user_info->age = 0;
        $user_info->location = '';
        $user_info->company = '';
        $user_info->description = '';      
        $user_info->save();

        return Redirect::to('/admin/doctor');
    }
}
