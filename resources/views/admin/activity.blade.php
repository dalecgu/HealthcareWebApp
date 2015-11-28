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
                    <li><a href="/admin/doctor" class="fa fa-hospital-o">医生</a></li>
                    <li class="chosen"><a href="#" class="fa fa-futbol-o">活动</a></li>
                    <li><a href="/auth/logout" class="fa fa-sign-out">登出</a></li>
                </ul>
            </aside>
            <div class="content">
                <div class="title">
                    <h3>活动列表</h3>
                    <a href="#">添加活动</a>
                </div>
                <ul class="activity-list">
                    <li>
                        <img src="/image/tmp/ac1.jpeg" class="activity-cover">
                        <div class="activity-info">
                            <a href="#" class="activity-name">跑酷济南</a>
                            <p class="activity-time">10月01日 00:00-10月07日 23:59</p>
                            <p class="activity-intro">怪兽来了</p>
                        </div>
                        <div class="activity-status">
                            <p class="activity-progress">已结束</p>
                            <p class="activity-member-num"><span>2376</span>人参与</p>
                        </div>
                    </li>
                    <li>
                        <img src="/image/tmp/ac2.jpeg" class="activity-cover">
                        <div class="activity-info">
                            <a href="#" class="activity-name">吴中环太湖公益行</a>
                            <p class="activity-time">09月14日 10:15-09月30日 23:59</p>
                            <p class="activity-intro">吴中环太湖公益行</p>
                        </div>
                        <div class="activity-status">
                            <p class="activity-progress">已结束</p>
                            <p class="activity-member-num"><span>2782</span>人参与</p>
                        </div>
                    </li>
                    <li>
                        <img src="/image/tmp/ac3.jpeg" class="activity-cover">
                        <div class="activity-info">
                            <a href="#" class="activity-name">吉利帝豪·向上马拉松</a>
                            <p class="activity-time">07月27日 00:00-09月20日 00:00</p>
                            <p class="activity-intro">吉利帝豪·向上马拉松</p>
                        </div>
                        <div class="activity-status">
                            <p class="activity-progress">已结束</p>
                            <p class="activity-member-num"><span>143</span>人参与</p>
                        </div>
                    </li>
                    <li>
                        <img src="/image/tmp/ac4.jpeg" class="activity-cover">
                        <div class="activity-info">
                            <a href="#" class="activity-name">跑酷南京</a>
                            <p class="activity-time">09月14日 00:39-10月20日 11:59</p>
                            <p class="activity-intro">一起来跑酷南京吧.</p>
                        </div>
                        <div class="activity-status">
                            <p class="activity-progress">已结束</p>
                            <p class="activity-member-num"><span>4038</span>人参与</p>
                        </div>
                    </li>
                    <li>
                        <img src="/image/tmp/ac5.jpeg" class="activity-cover">
                        <div class="activity-info">
                            <a href="#" class="activity-name">约跑·纽约</a>
                            <p class="activity-time">08月20日 11:03-09月10日 23:59</p>
                            <p class="activity-intro">约跑·纽约</p>
                        </div>
                        <div class="activity-status">
                            <p class="activity-progress">已结束</p>
                            <p class="activity-member-num"><span>4937</span>人参与</p>
                        </div>
                    </li>

                </ul>
                <ol class="page-switcher">
                    <li class="fa fa-angle-left disable"></li>
                    <li class="selected">1</li>
                    <li>2</li>
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