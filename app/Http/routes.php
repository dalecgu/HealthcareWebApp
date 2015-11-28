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
    }
    return view('auth.index');
});

// 认证路由
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由
Route::post('auth/register', 'Auth\AuthController@postRegister');

// 管理路由
Entrust::routeNeedsRole('admin/*', 'admin');
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

// 动态管理路由
Entrust::routeNeedsRole('individual/*', 'individual');
Route::group(['prefix' => 'individual','namespace' => 'Individual'], function() {
    Route::get('/', 'IndividualController@index');
    Route::get('profile', 'IndividualController@profile');

    // 修改个人信息
    Route::put('profile/basic', 'IndividualController@updateBasicProfile');
    Route::put('profile/contact', 'IndividualController@updateContactProfile');

    // 解雇
    
});
Route::resource('moment', 'Moment\MomentController');

// 兴趣组管理路由
Route::resource('group', 'Group\GroupController');

// 主题管理路由
Route::resource('topic', 'Topic\TopicController');