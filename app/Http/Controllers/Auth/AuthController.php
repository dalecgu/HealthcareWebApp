<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\IndividualInfo;
use Input;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/';
    protected $loginPath = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        Input::flash();

        $name = $data['name'];
        $email = $data['email'];
        $password = bcrypt($data['password']);
        $errors = array();
        if (User::all()->where('name', $name)->count()>0) {
            array_push($errors, AdminController::ERROR_EXIST_USERNAME);
        }
        if (User::all()->where('email', $email)->count()>0) {
            array_push($errors, AdminController::ERROR_EXIST_EMAIL);
        }
        if (count($errors)>0) {
            return view('auth.login', ['errors' => $errors]);
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
        $individual_info->birthday = '2015/12/01';
        $individual_info->location = '';
        $individual_info->email = $individual->email;
        $individual_info->qq = '';
        $individual_info->description = '';
        $individual_info->save();
        return $individual;
    }
}
