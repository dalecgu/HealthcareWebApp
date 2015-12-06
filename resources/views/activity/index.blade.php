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
                        @foreach(App\Activity::all() as $activity)
                            @if(App\UserJoinActivities::where('user_id', Auth::user()->id)->where('activity_id', $activity->id)->count()>0)
                            <li>
                                <img src="/image/activity/{{$activity->id}}.jpg" onerror="javascript:this.src='/image/tmp/ac1.jpeg';" class="activity-cover">
                                <div class="activity-info">
                                    <a href="#" class="activity-name">{{ $activity->title }}</a>
                                    @if(App\UserJoinActivities::where('user_id', Auth::user()->id)->where('activity_id', $activity->id)->count()>0 && strcmp(Carbon\Carbon::now()->format('m月d日 H:i'), $activity->begin_time)>=0 && strcmp(Carbon\Carbon::now()->format('m月d日 H:i'), $activity->end_time)<0)
                                        <a href="#" class="to-join exit_activity activity{{$activity->id}}">退出</a>
                                    @endif
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
                            @endif
                        @endforeach
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
                        @foreach(App\Activity::all() as $activity)
                            <li>
                                <img src="/image/activity/{{$activity->id}}.jpg" onerror="javascript:this.src='/image/tmp/ac1.jpeg';" class="activity-cover">
                                <div class="activity-info">
                                    <a href="#" class="activity-name">{{ $activity->title }}</a>
                                    @if(App\UserJoinActivities::where('user_id', Auth::user()->id)->where('activity_id', $activity->id)->count()==0 && strcmp(Carbon\Carbon::now()->format('m月d日 H:i'), $activity->begin_time)>=0 && strcmp(Carbon\Carbon::now()->format('m月d日 H:i'), $activity->end_time)<0)
                                        <a href="#" class="to-join join_activity activity{{$activity->id}}">参与</a>
                                    @endif
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

    $(document).on("click", ".join_activity", function () {
        $.post(
            '/activity/'+$(this).attr('class').substr(30)+'/join',
            {
                "_token": "{{ csrf_token() }}"
            },
            function(data)
            {
                location.reload();
            },
            'json'
        ).error(
            function()
            {
                alert("遇到了一点问题，不过没关系，忽略就好了嘛～");
            }
        );
    });

    $(document).on("click", ".exit_activity", function () {
        $.post(
            '/activity/'+$(this).attr('class').substr(30)+'/exit',
            {
                "_token": "{{ csrf_token() }}"
            },
            function(data)
            {
                location.reload();
            },
            'json'
        ).error(
            function()
            {
                alert("遇到了一点问题，不过没关系，忽略就好了嘛～");
            }
        );
    });
</script>
</body>
</html>