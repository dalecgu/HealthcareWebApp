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
                <li>
                    <img src="/image/default_head.png">
                    <a href="#">詹姆斯哈登</a>
                </li>
                <li>
                    <img src="/image/default_head.png">
                    <a href="#">德怀特霍华德</a>
                </li>
                <li>
                    <img src="/image/default_head.png">
                    <a href="#">科比布莱恩特</a>
                </li>
                <li>
                    <img src="/image/default_head.png">
                    <a href="#">歪脖子</a>
                </li>
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
                <li>
                    <img src="/image/award/a1.png" class="group-cover">
                    <div class="group-info">
                        <a href="#" class="group-name">神经病研究中心</a>
                        <p class="group-description">这里是神经病聚集地,一起来疯.</p>
                    </div>
                </li>
                <li>
                    <img src="/image/award/a2.png" class="group-cover">
                    <div class="group-info">
                        <a href="#" class="group-name">我们都是吐槽控</a>
                        <p class="group-description">看不惯的,就要吐槽,不吐不快乐,吐吐更健康.</p>
                    </div>
                </li>
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
            <li><a href="activity.html" class="fa fa-futbol-o">活动</a></li>
            <li><a href="group.html" class="fa fa-group">兴趣组</a></li>
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
                            <li>
                                <div class="rank-head">
                                    <img src="/image/default_head.png">
                                    <span>1</span>
                                </div>
                                <div class="rank-detail">
                                    <p class="rank-name">詹姆斯哈登</p>
                                    <p class="rank-score fa fa-heart">8.3km</p>
                                </div>
                                <a href="#" class="to-rank-detail">详情</a>
                            </li>
                            <li>
                                <div class="rank-head">
                                    <img src="/image/default_head.png">
                                    <span>2</span>
                                </div>
                                <div class="rank-detail">
                                    <p class="rank-name">德怀特霍华德</p>
                                    <p class="rank-score fa fa-heart">7.6km</p>
                                </div>
                                <a href="#" class="to-rank-detail">详情</a>
                            </li>
                            <li>
                                <div class="rank-head">
                                    <img src="/image/default_head.png">
                                    <span>3</span>
                                </div>
                                <div class="rank-detail">
                                    <p class="rank-name">科比布莱恩特</p>
                                    <p class="rank-score fa fa-heart">7.5km</p>
                                </div>
                                <a href="#" class="to-rank-detail">详情</a>
                            </li>
                            <li>
                                <div class="rank-head">
                                    <img src="/image/default_head.png">
                                    <span>4</span>
                                </div>
                                <div class="rank-detail">
                                    <p class="rank-name">歪脖子</p>
                                    <p class="rank-score fa fa-heart">7.2km</p>
                                </div>
                                <a href="#" class="to-rank-detail">详情</a>
                            </li>

                        </ol>
                    </div>
                    <div class="rank toweek" id="rank-toweek">
                        <ol>
                            <li>
                                <div class="rank-head">
                                    <img src="/image/default_head.png">
                                    <span>1</span>
                                </div>
                                <div class="rank-detail">
                                    <p class="rank-name">科比布莱恩特</p>
                                    <p class="rank-score fa fa-heart">47.5km</p>
                                </div>
                                <a href="#" class="to-rank-detail">详情</a>
                            </li>
                            <li>
                                <div class="rank-head">
                                    <img src="/image/default_head.png">
                                    <span>2</span>
                                </div>
                                <div class="rank-detail">
                                    <p class="rank-name">詹姆斯哈登</p>
                                    <p class="rank-score fa fa-heart">42.3km</p>
                                </div>
                                <a href="#" class="to-rank-detail">详情</a>
                            </li>
                            <li>
                                <div class="rank-head">
                                    <img src="/image/default_head.png">
                                    <span>3</span>
                                </div>
                                <div class="rank-detail">
                                    <p class="rank-name">德怀特霍华德</p>
                                    <p class="rank-score fa fa-heart">42.1km</p>
                                </div>
                                <a href="#" class="to-rank-detail">详情</a>
                            </li>

                            <li>
                                <div class="rank-head">
                                    <img src="/image/default_head.png">
                                    <span>4</span>
                                </div>
                                <div class="rank-detail">
                                    <p class="rank-name">歪脖子</p>
                                    <p class="rank-score fa fa-heart">39.2km</p>
                                </div>
                                <a href="#" class="to-rank-detail">详情</a>
                            </li>

                        </ol>
                    </div>
                    <div class="rank tomonth" id="rank-tomonth">
                        <ol>
                            <li>
                                <div class="rank-head">
                                    <img src="/image/default_head.png">
                                    <span>1</span>
                                </div>
                                <div class="rank-detail">
                                    <p class="rank-name">德怀特霍华德</p>
                                    <p class="rank-score fa fa-heart">227.6km</p>
                                </div>
                                <a href="#" class="to-rank-detail">详情</a>
                            </li>
                            <li>
                                <div class="rank-head">
                                    <img src="/image/default_head.png">
                                    <span>2</span>
                                </div>
                                <div class="rank-detail">
                                    <p class="rank-name">詹姆斯哈登</p>
                                    <p class="rank-score fa fa-heart">218.3km</p>
                                </div>
                                <a href="#" class="to-rank-detail">详情</a>
                            </li>
                            <li>
                                <div class="rank-head">
                                    <img src="/image/default_head.png">
                                    <span>3</span>
                                </div>
                                <div class="rank-detail">
                                    <p class="rank-name">歪脖子</p>
                                    <p class="rank-score fa fa-heart">217.2km</p>
                                </div>
                                <a href="#" class="to-rank-detail">详情</a>
                            </li>
                            <li>
                                <div class="rank-head">
                                    <img src="/image/default_head.png">
                                    <span>4</span>
                                </div>
                                <div class="rank-detail">
                                    <p class="rank-name">科比布莱恩特</p>
                                    <p class="rank-score fa fa-heart">212.5km</p>
                                </div>
                                <a href="#" class="to-rank-detail">详情</a>
                            </li>
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
                <div class="module release">
                    <div class="release-nav">
                        <a href="#" class="fa fa-pencil"><span class="tab-current"
                                                               onclick="return false;">更新状态</span></a>
                        <a href="#" class="fa fa-camera">
                            <input type="file" id="img-upload" multiple="multiple">
                            <span>添加照片</span>
                        </a>
                    </div>
                    <div class="release-content">
                        <div class="release-words">
                            <textarea name="" id="" spellcheck="false" placeholder="说点什么吧..."></textarea>
                            <input type="submit" value="发布">
                        </div>
                        <div class="img-preview"></div>
                    </div>
                </div>

                <div class="module tmp">好友动态</div>
                <div class="module tmp">好友动态</div>
                <div class="module tmp">好友动态</div>
                <div class="module tmp">好友动态</div>
                <div class="module tmp">好友动态</div>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/basic.js"></script>
<script src="/js/highchart/highcharts.js"></script>
<script>
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

<script>
    $(function () {
        $('.exercise-count-analyze #running-chart').highcharts({
            chart: {
                type: 'line',
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Aug']
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
                data: [4.3, 2.6, 3.8, 5.1, 3.4, 3.2, 2.8]
            }],
            credits: {
                enabled: false
            },
            legend: {
                enabled: false
            }
        });
    });


    $(function () {

        $(document).ready(function () {

            // Build the chart
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
                    name: "Brands",
                    colorByPoint: true,
                    data: [
                        {name: ">10h", y: 56.33},
                        {name: "8-10h", y: 24.03},
                        {name: "7-8h", y: 10.38},
                        {name: "6-7h", y: 4.77},
                        {name: "<6h", y: 1.11}]
                }],
                credits: {
                    enabled: false
                }
            });
        });
    });

    $(function () {
        $('.exercise-count-analyze #blood-pressure-chart').highcharts({
            chart: {
                type: 'line',
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Aug']
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
                data: [106, 104, 108, 108, 112, 105, 107]
            },{
                name: '伸张压',
                data: [68, 72, 70, 72, 74, 69, 71]
            }],
            credits: {
                enabled: false
            }
        });
    });

    $(function () {
        $('.exercise-count-analyze #heart-rate-chart').highcharts({
            chart: {
                type: 'line',
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Aug']
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
                data: [64, 63, 65, 67, 68, 64, 65]
            }],
            credits: {
                enabled: false
            },
            legend: {
                enabled: false
            }
        });
    });


</script>

</body>
</html>