<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑呗</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/home.css">
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
                    <img src="/image/avatar/{{ Auth::user()->id}}.jpg" onerror="javascript:this.src='/image/default_head.png';">
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
                        <img src="/image/avatar/{{ $friend->friend_id }}.jpg" onerror="javascript:this.src='/image/default_head.png';">
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
        <img src="/image/navHeader.jpg">
        <ul>
            <li class="chosen"><a href="/individual" class="fa fa-home">首页</a></li>
            <li><a href="/activity" class="fa fa-futbol-o">活动</a></li>
            <li><a href="/group" class="fa fa-group">兴趣组</a></li>
            <li><a href="/individual/profile" class="fa fa-user">个人中心</a></li>
            <li><a href="/auth/logout" class="fa fa-sign-out">登出</a></li>
        </ul>
    </nav>

    <div class="main">
        <div class="main-wrapper">
            <div class="column right">

                <div class="module exercise-ranking">
                    <nav>
                        <a href="#rank-today" class="chosen">今日</a>
                        <a href="#rank-toweek">本周</a>
                        <a href="#rank-tomonth">本月</a>
                    </nav>
                    <div class="rank today" id="rank-today">
                        <ol>
                        </ol>
                    </div>
                    <div class="rank toweek" id="rank-toweek">
                        <ol>
                        </ol>
                    </div>
                    <div class="rank tomonth" id="rank-tomonth">
                        <ol>
                        </ol>
                    </div>
                </div>

                <div class="module exercise-count-analyze">
                    <nav>
                        <a href="#running-chart" class="chosen">运动</a>
                        <a href="#sleeping-chart">睡眠</a>
                        <a href="#blood-pressure-chart">血压</a>
                        <a href="#heart-rate-chart">心率</a>
                    </nav>
                    <div class="chart" id="running-chart"></div>
                    <div class="chart" id="sleeping-chart"></div>
                    <div class="chart" id="blood-pressure-chart"></div>
                    <div class="chart" id="heart-rate-chart"></div>
                </div>
            </div>

            <div class="column center">
                {!! Form::open(array('url'=>'/moment','method'=>'POST', 'files'=>true)) !!}
                <div class="module release">
                    <div class="release-nav">
                        <a href="#" class="fa fa-pencil"><span class="tab-current"
                                                               onclick="return false;">更新状态</span></a>
                        <a href="#" class="fa fa-camera">
                            {!! Form::file('moment_file', array('id'=>"img-upload")) !!}
                            <span>添加照片</span>
                        </a>
                    </div>
                    <div class="release-content">
                        <div class="release-words">
                            <textarea name="content" id="" spellcheck="false" placeholder="说点什么吧..."></textarea>
                            <input type="submit" value="发布">
                        </div>
                        <div class="img-preview"></div>
                    </div>
                </div>
                {!! Form::close() !!}

                <ul class="friend-dynamic">
                    @if($moments=Auth::user()->moments)
                        @foreach(Auth::user()->friends as $friend)
                            @if($moments=$moments->merge(App\User::where('id', $friend->friend_id)->first()->moments))
                            @endif
                        @endforeach
                    @endif
                    @foreach($moments->sortByDesc('created_at') as $moment)
                        <li>
                            <div class="module f-single">
                                <div class="f-single-head">
                                    <img src="/image/avatar/{{ $moment->user->id }}.jpg" onerror="javascript:this.src='/image/default_head.png';" class="head">

                                    <div class="item-detail">
                                        <a href="#" class="f-nick">{{ $moment->user->info->nickname }}</a>
                                        <span class="item-time">{{ $moment->created_at }}</span>
                                    </div>
                                </div>
                                <div class="f-item">
                                    <div class="f-info">
                                        {{ $moment->content }}
                                    </div>
                                    <div class="f-image-box">
                                        @if(file_exists('../public/image/moment/'.$moment->id.'.jpg'))
                                            <img src="/image/moment/{{ $moment->id }}.jpg">
                                        @endif
                                    </div>
                                </div>

                                <div class="f-interact">
                                    <a href="#" class="fa fa-comments">评论<span>({{ $moment->comments->count() }})</span></a>
                                    @if(App\AgreeMoment::where('user_id', Auth::user()->id)->where('moment_id', $moment->id)->count()==0)
                                        <a href="#" class="fa fa-thumbs-up agree{{ $moment->id }}">赞<span>({{ $moment->agreed_by_users->count() }})</span></a>
                                    @else
                                        <a href="#" class="fa fa-thumbs-up agree{{ $moment->id }}">已赞<span>({{ $moment->agreed_by_users->count() }})</span></a>
                                    @endif
                                </div>

                                <div class="f-comments">
                                    <div class="my-comment">
                                        {!! Form::open(['url' => '/moment/'.$moment->id.'/reply', 'method' => 'post', 'name' => 'comments', 'class' => 'comments']) !!}
                                            <div class="comment-content">
                                                <img src="/image/avatar/{{ Auth::user()->id }}.jpg" onerror="javascript:this.src='/image/default_head.png';" class="head">
                                                <textarea name="content" placeholder="写评论"></textarea>

                                                <p>按 Control + Enter 键发送</p>
                                            </div>
                                        </form>
                                    </div>


                                    <div class="comments-list">
                                        <ul>
                                            @foreach($moment->comments as $comment)
                                                <li class="comments-item">
                                                    <div class="comments-content">
                                                        <a class="name-card" href="#">{{ $comment->user->info->nickname }}</a>:{{ $comment->content }}
                                                        <div class="comments-op">
                                                            <span class="state">{{ $comment->created_at->format('H:i') }}</span>
                                                            <a class="fa fa-comments" href="#"></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/basic.js"></script>
<script src="/js/highchart/highcharts.js"></script>
<script>
    var csrf_token = "{{ csrf_token() }}";
    $(function () {
        $(".exercise-ranking > nav > a").click(function () {
            $(this).siblings("a").removeClass("chosen");
            $(this).addClass("chosen");
            var target = $(this).attr("href");
            $(target).siblings("div").css("z-index", "1");
            $(target).css("z-index", "2");
            return false;
        });

        $(".exercise-count-analyze > nav > a").click(function () {
            $(this).siblings("a").removeClass("chosen");
            $(this).addClass("chosen");
            var target = $(this).attr("href");
            $(target).siblings("div").css("z-index", "1");
            $(target).css("z-index", "2");
            return false;
        });
    });
</script>
<script src="js/friendDynamic.js"></script>
<script>
    $(function () {
        $.get(
            "/individual/health/statistics",
            function(data)
            {
                var healthRecords = eval(data);
                var sport = new Array();
                var sleep = new Array(5);
                sleep[0] = 0;
                sleep[1] = 0;
                sleep[2] = 0;
                sleep[3] = 0;
                sleep[4] = 0;
                var blood_pressure_low = new Array();
                var blood_pressure_high = new Array();
                var heart_rate = new Array();
                for (var i = 0; i < healthRecords.length; i++) {
                    var health = healthRecords[i];
                    sport[6-i] = Math.round(parseFloat(health.sport)*10)/10;
                    var sleepHour = parseFloat(health.sleep)/3600;
                    if (sleepHour>12) {
                        sleep[0] += 1;
                    } else if (sleepHour>10) {
                        sleep[1] += 1;
                    } else if (sleepHour>8) {
                        sleep[2] += 1;
                    } else if (sleepHour>6) {
                        sleep[3] += 1;
                    } else {
                        sleep[4] += 1;
                    }
                    blood_pressure_low[6-i] = Math.round(parseFloat(health.blood_pressure_low)*10)/10;
                    blood_pressure_high[6-i] = Math.round(parseFloat(health.blood_pressure_high)*10)/10;
                    heart_rate[6-i] = Math.round(parseFloat(health.heart_rate)*10)/10;
                }
                for (var i = 0; i < sleep.length; i++) {
                    sleep[i] = Math.round(sleep[i]*1.0/7*1000)/10;
                }
                $('.exercise-count-analyze #running-chart').highcharts({
                    chart: {
                        type: 'line',
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                    },
                    yAxis: {
                        title: {
                            text: '运动里程 (km)'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [{
                        name: '运动数据',
                        data: sport
                    }],
                    credits: {
                        enabled: false
                    },
                    legend: {
                        enabled: false
                    }
                });
                $('.exercise-count-analyze #sleeping-chart').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        colorByPoint: true,
                        data: [
                            {name: ">12h", y: sleep[0]},
                            {name: "10-12h", y: sleep[1]},
                            {name: "8-10h", y: sleep[2]},
                            {name: "6-8h", y: sleep[3]},
                            {name: "<6h", y: sleep[4]}]
                    }],
                    credits: {
                        enabled: false
                    }
                });
                $('.exercise-count-analyze #blood-pressure-chart').highcharts({
                    chart: {
                        type: 'line',
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                    },
                    yAxis: {
                        title: {
                            text: '血压 (mmHg)'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [{
                        name: '收缩压',
                        data: blood_pressure_high
                    },{
                        name: '伸张压',
                        data: blood_pressure_low
                    }],
                    credits: {
                        enabled: false
                    }
                });
                $('.exercise-count-analyze #heart-rate-chart').highcharts({
                    chart: {
                        type: 'line',
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                    },
                    yAxis: {
                        title: {
                            text: '心率 (次/分钟)'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [{
                        name: '心率',
                        data: heart_rate
                    }],
                    credits: {
                        enabled: false
                    },
                    legend: {
                        enabled: false
                    }
                });
            },
            'json'
        ).error(
            function()
            {
                alert("遇到了一点问题，不过没关系，忽略就好了嘛～");
            }
        );

        $.get(
            "/individual/health/rank",
            function(data)
            {
                var rank = eval(data);
                var today_rank = rank.today;
                $('#rank-today ol').children().remove();
                for (var i = 0; i < today_rank.length; i++) {
                    $('#rank-today ol').append("\
                            <li>\
                                <div class=\"rank-head\">\
                                    <img src=\"/image/avatar/" + today_rank[i].user_id + ".jpg\" onerror=\"javascript:this.src='/image/default_head.png';\">\
                                    <span>" + (i+1) + "</span>\
                                </div>\
                                <div class=\"rank-detail\">\
                                    <p class=\"rank-name\">" + today_rank[i].name + "</p>\
                                    <p class=\"rank-score fa fa-heart\">" + Math.round(today_rank[i].sport*100)/100 + "km</p>\
                                </div>\
                                <a href=\"#\" class=\"to-rank-detail\">详情</a>\
                            </li>\
                        ");
                }
                var week_rank = rank.week;
                $('#rank-toweek ol').children().remove();
                for (var i = 0; i < week_rank.length; i++) {
                    $('#rank-toweek ol').append("\
                            <li>\
                                <div class=\"rank-head\">\
                                    <img src=\"/image/avatar/" + week_rank[i].user_id + ".jpg\" onerror=\"javascript:this.src='/image/default_head.png';\">\
                                    <span>" + (i+1) + "</span>\
                                </div>\
                                <div class=\"rank-detail\">\
                                    <p class=\"rank-name\">" + week_rank[i].name + "</p>\
                                    <p class=\"rank-score fa fa-heart\">" + Math.round(week_rank[i].sport*100)/100 + "km</p>\
                                </div>\
                                <a href=\"#\" class=\"to-rank-detail\">详情</a>\
                            </li>\
                        ");
                }
                var month_rank = rank.month;
                $('#rank-tomonth ol').children().remove();
                for (var i = 0; i < month_rank.length; i++) {
                    $('#rank-tomonth ol').append("\
                            <li>\
                                <div class=\"rank-head\">\
                                    <img src=\"/image/avatar/" + month_rank[i].user_id + ".jpg\" onerror=\"javascript:this.src='/image/default_head.png';\">\
                                    <span>" + (i+1) + "</span>\
                                </div>\
                                <div class=\"rank-detail\">\
                                    <p class=\"rank-name\">" + month_rank[i].name + "</p>\
                                    <p class=\"rank-score fa fa-heart\">" + Math.round(month_rank[i].sport*100)/100 + "km</p>\
                                </div>\
                                <a href=\"#\" class=\"to-rank-detail\">详情</a>\
                            </li>\
                        ");
                }
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