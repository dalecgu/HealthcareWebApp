<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// 根路由
Route::get('/', function () {
    if (Auth::user()) {
        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/user');
        }
        if (Auth::user()->hasRole('individual')) {
            return redirect('individual');
        }
        if (Auth::user()->hasRole('coach') || Auth::user()->hasRole('doctor')) {
            return redirect('coachdoctor');
        }
    }
    return view('auth.index');
});

// 认证路由
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// 注册路由
Route::post('auth/register', 'Auth\AuthController@postRegister');

// 管理员路由
Entrust::routeNeedsRole('admin*', 'admin');
Route::group(['prefix' => 'admin','namespace' => 'Admin'], function() {
    Route::get('user', 'AdminController@user');
    Route::get('coach', 'AdminController@coach');
    Route::get('doctor', 'AdminController@doctor');
    Route::get('activity', 'AdminController@activity');

    // 添加个人用户
    Route::get('user/add', 'AdminController@addUser');
    Route::post('user/add', 'AdminController@createUser');

    // 添加教练
    Route::get('coach/add', 'AdminController@addCoach');
    Route::post('coach/add', 'AdminController@createCoach');

    // 添加医生
    Route::get('doctor/add', 'AdminController@addDoctor');
    Route::post('doctor/add', 'AdminController@createDoctor');
});

// 个人用户路由
Entrust::routeNeedsRole('individual*', 'individual');
Route::group(['prefix' => 'individual','namespace' => 'Individual'], function() {
    Route::get('/', 'IndividualController@index');
    Route::get('profile', 'IndividualController@profile');

    // 修改个人信息
    Route::put('profile/basic', 'IndividualController@updateBasicProfile');
    Route::put('profile/contact', 'IndividualController@updateContactProfile');

    // 添加、解雇教练
    Route::post('profile/coach', 'IndividualController@addCoach');
    Route::delete('profile/coach', 'IndividualController@deleteCoach');

    // 添加、解雇医生
    Route::post('profile/doctor', 'IndividualController@addDoctor');
    Route::delete('profile/doctor', 'IndividualController@deleteDoctor');
});

// 教练、医生路由
Entrust::routeNeedsRole('coachdoctor*', 'coach');
Route::group(['prefix' => 'coachdoctor','namespace' => 'CoachDoctor'], function() {
    Route::get('/', 'CoachDoctorController@index');

    Route::post('advice', 'CoachDoctorController@index');
});

Route::resource('moment', 'Moment\MomentController');
Route::resource('group', 'Group\GroupController');
Route::resource('topic', 'Topic\TopicController');