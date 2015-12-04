<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑呗</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/activity.css">
</head>
<body>

<div class="container">
    <header>
        <div class="header-wrapper clearfix">
            <div class="group left">
                <a href="#" class="fa fa-navicon nav"></a>
                <a href="/individual" class="fa fa-codepen web-icon">跑呗</a>
            </div>
            <div class="group right">
                <a href="#" class="fa fa-bell"></a>
                <a href="#" class="fa fa-users"></a>
            </div>
            <div class="group center">
                <a href="/individual/profile" class="sns-link">
                    <img src="image/default_head.png">
                    <span>{{ Auth::user()->info->nickname }}</span>
                </a>
                <a href="/individual">主页</a>
            </div>
        </div>
    </header>
    <aside class="social-connection">
        <nav>
            <a href="#my-attention" class="chosen">我的关注</a>
            <a href="#my-interest-group">兴趣组</a>
        </nav>
        <div class="panel" id="my-attention">
            <ul>
                @foreach(Auth::user()->friends as $friend)
                    <li>
                        <img src="image/default_head.png">
                        <a href="#">{{ App\User::where('id', $friend->friend_id)->first()->info->nickname  }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="sc-nav">
                <form class="search">
                    <input class="search-input" placeholder="Search" type="text" value="" name="search">
                    <input class="search-submit" type="submit" value="">
                    <span class="fa fa-search"></span>
                </form>
            </div>
        </div>
        <div class="panel" id="my-interest-group">

            <ul>
                @foreach(Auth::user()->groups as $group)
                    <li>
                        <img src="image/award/a1.png" class="group-cover">
                        <div class="group-info">
                            <a href="/group/{{ $group->id }}" class="group-name">{{ $group->name }}</a>
                            <p class="group-description">{{ $group->description }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="sc-nav">
                <form class="search">
                    <input class="search-input" placeholder="Search" type="text" value="" name="search">
                    <input class="search-submit" type="submit" value="">
                    <span class="fa fa-search"></span>
                </form>
            </div>

        </div>
    </aside>
    <nav class="side-nav">
        <img src="image/navHeader.jpg">
        <ul>
            <li><a href="/individual" class="fa fa-home">首页</a></li>
            <li class="chosen"><a href="/activity" class="fa fa-futbol-o">活动</a></li>
            <li><a href="/group" class="fa fa-group">兴趣组</a></li>
            <li><a href="/individual/profile" class="fa fa-user">个人中心</a></li>
            <li><a href="/auth/logout" class="fa fa-sign-out">登出</a></li>
        </ul>
    </nav>
    <div class="main">
        <div class="main-wrapper">
            <nav class="activity-menu">
                <ul>
                    <li><a href="#all-activity" class="fa fa-list chosen">活动列表</a></li>
                    <li><a href="#my-activity" class="fa fa-star">我的活动</a></li>
                </ul>
            </nav>
            <div class="activity-panel">
                <div class="my-activity" id="my-activity">
                    <ul class="activity-list">
                        <li>
                            <img src="image/tmp/ac5.jpeg" class="activity-cover">
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
                        <li>
                            <img src="image/tmp/ac2.jpeg" class="activity-cover">
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
                            <img src="image/tmp/ac1.jpeg" class="activity-cover">
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
                            <img src="image/tmp/ac3.jpeg" class="activity-cover">
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
                            <img src="image/tmp/ac4.jpeg" class="activity-cover">
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


                    </ul>
                    <ol class="page-switcher">
                        <li class="fa fa-angle-left disable"></li>
                        <li class="selected">1</li>
                        <li>2</li>
                        <li class="fa fa-angle-right"></li>
                    </ol>
                </div>
                <div class="all-activity" id="all-activity">
                    <ul class="activity-list">
                        <li>
                            <img src="image/tmp/ac1.jpeg" class="activity-cover">
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
                            <img src="image/tmp/ac2.jpeg" class="activity-cover">
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
                            <img src="image/tmp/ac3.jpeg" class="activity-cover">
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
                            <img src="image/tmp/ac4.jpeg" class="activity-cover">
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
                            <img src="image/tmp/ac5.jpeg" class="activity-cover">
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
</div>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/basic.js"></script>
<script>
    $(function () {
        $(".activity-menu .fa").click(function () {
            $(".activity-menu .fa").removeClass("chosen");
            $(this).addClass("chosen");
            $(".activity-panel > div").hide();
            $(".activity-panel > " + "." + $(this).attr("href").substr(1)).show();
            return false;
        });
    })
</script>
</body>
</html>