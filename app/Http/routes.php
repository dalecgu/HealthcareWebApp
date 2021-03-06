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

// 健康数据路由
Route::group(['prefix' => 'health', 'namespace' => 'Health'], function() {
    Route::get('/', 'HealthController@index');

    Route::post('daily', 'HealthController@postDailyData');
});

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

    // 添加活动
    Route::get('activity/add', 'AdminController@addActivity');
    Route::post('activity/add', 'AdminController@createActivity');
});

// 个人用户路由
Entrust::routeNeedsRole('individual*', 'individual');
Route::group(['prefix' => 'individual','namespace' => 'Individual'], function() {
    Route::get('/', 'IndividualController@index');

    Route::group(['prefix' => 'profile'], function() {
        Route::get('/', 'ProfileController@profile');

        // 修改个人信息
        Route::post('avatar', 'ProfileController@updateAvatarProfile');
        Route::put('basic', 'ProfileController@updateBasicProfile');
        Route::put('contact', 'ProfileController@updateContactProfile');

        // 添加、解雇教练
        Route::post('coach', 'ProfileController@addCoach');
        Route::delete('coach', 'ProfileController@deleteCoach');

        // 添加、解雇医生
        Route::post('doctor', 'ProfileController@addDoctor');
        Route::delete('doctor', 'ProfileController@deleteDoctor');

        Route::get('chat', 'ProfileController@getAdvice');
        Route::post('chat', 'ProfileController@postAdvice');
    });

    Route::group(['prefix' => 'health'], function() {
        Route::get('statistics', 'HealthController@statistics');
        Route::get('rank', 'HealthController@rank');
    });
});

// 活动路由
Entrust::routeNeedsRole('activity*', 'individual');
Route::group(['prefix' => 'activity','namespace' => 'Activity'], function() {
    Route::get('/', 'ActivityController@index');

    Route::post('/{id}/join', 'ActivityController@joinActivity');
    Route::post('/{id}/exit', 'ActivityController@exitActivity');
});

// 兴趣组路由
Entrust::routeNeedsRole('group*', 'individual');
Route::group(['prefix' => 'group','namespace' => 'Group'], function() {
    Route::get('/', 'GroupController@index');
    Route::post('/', 'GroupController@store');
    Route::get('/{id}', 'GroupController@show');

    Route::post('/{id}/join', 'GroupController@joinGroup');
    Route::post('/{id}/exit', 'GroupController@exitGroup');
});

// 兴趣组主题路由
Entrust::routeNeedsRole('topic*', 'individual');
Route::group(['prefix' => 'topic','namespace' => 'Topic'], function() {
    Route::get('/{id}', 'TopicController@show');
    Route::post('/', 'TopicController@store');

    Route::post('/{id}/agree', 'TopicController@agree');
    Route::post('/{id}/reply', 'TopicController@reply');
});

// 动态路由
Entrust::routeNeedsRole('moment*', 'individual');
Route::group(['prefix' => 'moment','namespace' => 'Moment'], function() {
    Route::post('/', 'MomentController@store');
    Route::post('/{id}/agree', 'MomentController@agree');
    Route::post('/{id}/reply', 'MomentController@reply');
});

// 教练、医生路由
Entrust::routeNeedsRole('coachdoctor*', array('coach', 'doctor'), null, false);
Route::group(['prefix' => 'coachdoctor','namespace' => 'CoachDoctor'], function() {
    Route::get('/', 'CoachDoctorController@index');

    Route::put('/profile', 'CoachDoctorController@updateProfile');

    Route::get('advice', 'CoachDoctorController@getAdvice');
    Route::post('advice', 'CoachDoctorController@postAdvice');
});