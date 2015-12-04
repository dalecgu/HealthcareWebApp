<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑呗</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/topic.css">
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
            <div class="topic-content clearfix module">
                <h4 class="title">{{ $topic->title }}</h4>
                <img src="/image/default_head.png" class="head">

                <div>
                    <p class="topic-info"><span class="author">{{ $topic->user->info->nickname }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                            class="release-time">{{ $topic->created_at }}</span>
                    </p>

                    <div class="article">
                        {{ $topic->content }}
                    </div>
                </div>
            </div>
            @if($topic->replies->filter(function($item){ return $item->agreed_by_users->count()>10; })->count()>0)
                <div class="top-comment module">
                    <h4 class="title">这些回帖亮了</h4>
                    <ul class="comment-list">
                        @foreach($topic->replies->filter(function($item){ return $item->agreed_by_users->count()>10; })->sortByDesc(function($item){ return $item->agreed_by_users->count(); }) as $reply)
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="topic-comment module">
                <ul class="comment-list">
                    @foreach($topic->replies->sortBy('created_at') as $reply)
                        @if($reply->quote==0)
                            <li class="clearfix">
                                <img src="/image/default_head.png" class="head">

                                <div>
                                    <div class="comment-header clearfix">
                                        <p class="comment-info"><span class="author">{{ $reply->user->info->nickname }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                class="release-time">{{ $reply->created_at }}</span></p>
                                        <span class="fa fa-lightbulb-o liked">{{ $reply->agreed_by_users->count() }}</span>
                                        <a href="#">亮了</a>
                                        <a href="#">回复</a>
                                    </div>
                                    <div class="comment-content">
                                        <p>{{ $reply->content }}</p>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li class="clearfix">
                                <img src="/image/default_head.png" class="head">

                                <div>
                                    <div class="comment-header clearfix">
                                        <p class="comment-info"><span class="author">{{ $reply->user->info->nickname }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                class="release-time">{{ $reply->created_at }}</span></p>
                                        <span class="fa fa-lightbulb-o liked">{{ $reply->agreed_by_users->count() }}</span>
                                        <a href="#">亮了</a>
                                        <a href="#">回复</a>
                                    </div>
                                    <div class="comment-content">
                                        <div class="quote">
                                            <p class="quote-title">引用<span>{{ App\Reply::where('id', $reply->quote)->first()->title }}</span></p>
                                            <p>{{ App\Reply::where('id', $reply->quote)->first()->content }}</p>
                                        </div>
                                        <p>{{ $reply->content }}</p>
                                    </div>
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
            <div class="reply-wrapper module">
                <img src="/image/default_head.png" class="head">

                <form action="">
                    <textarea name=""></textarea>
                    <input type="submit" value="回复">
                </form>
            </div>
        </div>
    </div>

</div>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/basic.js"></script>
</body>
</html>