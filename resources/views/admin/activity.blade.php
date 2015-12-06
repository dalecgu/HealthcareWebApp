<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/adActivity.css">
</head>
<body>

<div class="container">

    <header>
        <ul class="cbp-tm-menu">
            <li>
                <a href="#" class="fa fa-codepen web-icon">跑呗</a>
            </li>
            <li>
                <a href="#" class="fa fa-plus">添加</a>
                <ul class="cbp-tm-submenu">
                    <li><a href="/admin/user/add">添加用户</a></li>
                    <li><a href="/admin/coach/add">添加教练</a></li>
                    <li><a href="/admin/doctor/add">添加医生</a></li>
                    <li><a href="/admin/activity/add">添加活动</a></li>
                </ul>
            </li>
        </ul>
    </header>

    <div class="main">
        <div class="main-wrapper">
            <aside class="nav">
                <ul>
                    <li><a href="/admin/user" class="fa fa-users">用户</a></li>
                    <li><a href="/admin/coach" class="fa fa-clipboard">教练</a></li>
                    <li><a href="/admin/doctor" class="fa fa-hospital-o">医生</a></li>
                    <li class="chosen"><a href="#" class="fa fa-futbol-o">活动</a></li>
                    <li><a href="/auth/logout" class="fa fa-sign-out">登出</a></li>
                </ul>
            </aside>
            <div class="content">
                <div class="title">
                    <h3>活动列表</h3>
                    <a href="/admin/activity/add">添加活动</a>
                </div>
                <ul class="activity-list">
                    @foreach(App\Activity::all() as $activity)
                        <li>
                            <img src="/image/activity/{{$activity->id}}.jpg" onerror="javascript:this.src='/image/tmp/ac1.jpeg';" class="activity-cover">
                            <div class="activity-info">
                                <a href="#" class="activity-name">{{ $activity->title }}</a>
                                <p class="activity-time">{{ $activity->begin_time }}-{{ $activity->end_time }}</p>
                                <p class="activity-intro">{{ $activity->description }}</p>
                            </div>
                            <div class="activity-status">
                                <p class="activity-progress">
                                    @if(strcmp(Carbon\Carbon::now()->format('m月d日 H:i'), $activity->begin_time)<0)
                                        未开始
                                    @elseif(strcmp(Carbon\Carbon::now()->format('m月d日 H:i'), $activity->end_time)<0)
                                        进行中
                                    @else
                                        已结束
                                    @endif
                                </p>
                                <p class="activity-member-num"><span>{{ $activity->users->count() }}</span>人参与</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <ol class="page-switcher">
                    <li class="fa fa-angle-left disable"></li>
                    <li class="selected">1</li>
                    <li class="fa fa-angle-right"></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/adminBasic.js"></script>
</body>
</html>