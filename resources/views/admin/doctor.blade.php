<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/adCommon.css">
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
                    <li class="chosen"><a href="#" class="fa fa-hospital-o">医生</a></li>
                    <li><a href="/admin/activity" class="fa fa-futbol-o">活动</a></li>
                    <li><a href="/auth/logout" class="fa fa-sign-out">登出</a></li>
                </ul>
            </aside>
            <div class="content">
                <div class="title">
                    <h3>医生列表</h3>
                    <a href="/admin/doctor/add">添加医生</a>
                </div>
                <div class="user-list">
                    <table>
                        <tr>
                            <th>用户名</th>
                            <th>昵称</th>
                            <th>邮箱</th>
                            <th>认证</th>
                            <th>客户数</th>
                            <th>状态</th>
                            <th></th>
                        </tr>
                        @foreach(App\User::all()->filter(function($item) {return $item->hasRole('doctor');}) as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->info->nickname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->info->company }}</td>
                                @if($user->customers)
                                    <td>{{ $user->customers->count() }}</td>
                                @else
                                    <td>0</td>
                                @endif
                                <td>{{ $user->status }}</td>
                                <td><a href="#" class="to-delete">删除</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
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