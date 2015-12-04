<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑呗</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/groupInner.css">
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
                    <img src="/image/default_head.png">
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
                        <img src="/image/default_head.png">
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
                        <img src="/image/award/a1.png" class="group-cover">
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
            <li><a href="/individual" class="fa fa-home">首页</a></li>
            <li><a href="/activity" class="fa fa-futbol-o">活动</a></li>
            <li class="chosen"><a href="/group" class="fa fa-group">兴趣组</a></li>
            <li><a href="/individual/profile" class="fa fa-user">个人中心</a></li>
            <li><a href="/auth/logout" class="fa fa-sign-out">登出</a></li>
        </ul>
    </nav>
    <div class="main">
        <div class="main-wrapper">
            <div class="group-profile">
                <div class="group-header module">
                    <img src="/image/award/a1.png" class="cover-image">
                    <h4 class="group-name">{{ $group->name }}</h4>
                    @if(Auth::user()->groups->where('id', $group->id)->count()==0)
                        <a href="#" id="join-group" class="to-join btn">加入</a>
                    @else
                        <a href="#" id="exit-group" class="to-join btn">退出</a>
                    @endif
                </div>
                <div class="group-intro module">
                    <p class="create-info">创建于<span>{{ $group->created_at }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;组长：<span>{{ $group->creator->info->nickname }}</span></p>
                    <p>
                        {{ $group->description }}
                    </p>
                </div>
            </div>
            <div class="group-topic module">
                <div class="topic-header">
                    <h4>最新话题</h4>
                    <a href="#" class="to-release btn fa fa-plus">发新帖</a>
                </div>
                 <!-- 一页放15条记录 -->
                <table class="topic-list">
                    <tr>
                        <th>主题</th>
                        <th>作者</th>
                        <th>回复</th>
                        <th>最后回复</th>
                    </tr>
                    @foreach($group->topics->sortByDesc(function($item) { return $item->replies->sortByDesc('created_at')->first()->created_at; }) as $topic)
                        <tr>
                            <td><a href="/topic/{{$topic->id}}">{{ $topic->title }}</a></td>
                            <td>{{ $topic->user->info->nickname }}</td>
                            <td>{{ $topic->replies->count() }}</td>
                            <td>{{ $topic->replies->sortByDesc('created_at')->first()->created_at }}</td>
                        </tr>
                    @endforeach
                </table>
                <ol class="page-switcher">
                    <li class="fa fa-angle-left disable"></li>
                    <li class="selected">1</li>
                    <li>2</li>
                    <li class="fa fa-angle-right"></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="new-topic-window">
        <header class="clearfix">
            <h4>发新帖</h4>
            <a href="#" class="fa fa-close cancel"></a>
        </header>
        <form action="">
            <p>
                <label for="my-topic-title">标题</label><br/>
                <input type="text" name="title" id="my-topic-title">
            </p>
            <p>
                <label for="my-topic-content">正文内容</label><br/>
                <textarea name="content" id="my-topic-content"></textarea>
            </p>
            <input type="submit">
        </form>
    </div>
    <div class="overlay"></div>
</div>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/basic.js"></script>
<script>
    $(".topic-header .to-release").click(function () {
        var $window = $(".new-topic-window");
        $(".overlay").show();
        $window.css("top", ($("body").scrollTop() + 100) + "px");
        $window.slideDown(500);
        $("body").css("overflow", "hidden");
        event.stopPropagation();
        return false;
    });

    $(".new-topic-window .cancel").click(function () {
        $(this).parent().parent().slideUp(500, function () {
            $(".overlay").hide();
        });
        $("body").css("overflow", "auto");
        return false;
    });

    $(document).on("click", "#join-group", function () {
        $.post(
            '/group/{{ $group->id }}/join',
            {
                "_token": "{{ csrf_token() }}"
            },
            function(data)
            {
            },
            'json'
        ).error(
            function()
            {
                alert("遇到了一点问题，不过没关系，忽略就好了嘛～");
            }
        );
    });

    $(document).on("click", "#exit-group", function () {
        $.post(
            '/group/{{ $group->id }}/exit',
            {
                "_token": "{{ csrf_token() }}"
            },
            function(data)
            {
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