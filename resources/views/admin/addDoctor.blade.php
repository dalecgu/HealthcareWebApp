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
                    <li><a href="#">添加活动</a></li>
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
                    <li class="chosen"><a href="/admin/doctor" class="fa fa-hospital-o">医生</a></li>
                    <li><a href="/admin/activity" class="fa fa-futbol-o">活动</a></li>
                    <li><a href="/auth/logout" class="fa fa-sign-out">登出</a></li>
                </ul>
            </aside>
            <div class="content">
                <div class="title">
                    <h3>添加医生</h3>
                </div>
                <form name="addDoctor" method="post" action="/admin/doctor/add">
                    {!! csrf_field() !!}
                    <ul class="pf-items">
                        <li>
                            <h4 class="pf-item-title">用户名</h4>
                            <input name="name" type="text" value="{{ old('name') }}">
                            @foreach($errors as $error)
                                @if($error===App\Http\Controllers\Admin\AdminController::ERROR_EXIST_USERNAME)
                                    用户名已被使用
                                @endif
                            @endforeach
                        </li>
                        <li>
                            <h4 class="pf-item-title">密码</h4>
                            <input name="password" type="password">
                        </li>
                        <li>
                            <h4 class="pf-item-title">重复密码</h4>
                            <input name="confirm-password" type="password">
                        </li>
                        <li>
                            <h4 class="pf-item-title">邮箱</h4>
                            <input name="email" type="text" value="{{ old('email') }}">
                            @foreach($errors as $error)
                                @if($error===App\Http\Controllers\Admin\AdminController::ERROR_EXIST_EMAIL)
                                    邮箱已被使用
                                @endif
                            @endforeach
                        </li>
                    </ul>
                </form>
                <div class="action">
                    <a href="javascript:void(0)" onclick="document.addDoctor.submit();">完成</a>
                    <a href="/admin/doctor" class="cancel">取消</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/adminBasic.js"></script>
</body>
</html>