<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑呗</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/profile.css">
</head>
<body>

<div class="container">
    <header>
        <div class="header-wrapper">
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
                        <img src="/image/avatar/{{ $friend->friend_id}}.jpg" onerror="javascript:this.src='/image/default_head.png';">
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
            <li><a href="/group" class="fa fa-group">兴趣组</a></li>
            <li class="chosen"><a href="/individual/profile" class="fa fa-user">个人中心</a></li>
            <li><a href="/auth/logout" class="fa fa-sign-out">登出</a></li>
        </ul>
    </nav>

    <div class="main">
        <div class="main-wrapper clearfix">
            <div class="column right">
                <div class="module profile-head-info">
                    <img src="/image/avatar/{{ Auth::user()->id}}.jpg" onerror="javascript:this.src='/image/default_head.png';">

                    <h3>{{ Auth::user()->info->nickname }}<span>{{ Auth::user()->email }}</span></h3>
                </div>
                <div class="module personal-cd-intro">
                    <nav>
                        <a href="#my-coach-panel" class="chosen">教练</a>
                        <a href="#my-doctor-panel">医生</a>
                    </nav>
                    <div id="my-coach-panel" class="cd-panel">
                        @if(Auth::user()->coach && $coach_info = App\User::find(Auth::user()->coach->coach_id)->info)
                            <div class="normal">
                                <img src="/image/avatar/{{ $coach_info->id}}.jpg" onerror="javascript:this.src='/image/default_head.png';">
                                <div class="intro">
                                        <h3>{{ $coach_info->nickname }}</h3>

                                        <p>{{ $coach_info->description }}</p>
                                </div>
                                <div class="my-cd-nav">
                                    <a href="#" class="to-cd-chat">会话</a>
                                    <a href="#" class="cd-layoff">解雇</a>
                                </div>
                            </div>
                        @else
                            <div class="none">
                                <p>你还没有教练，快去找一个教练吧～</p>

                                <div class="my-cd-nav">
                                    <a href="#" class="to-find-cd">查看</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div id="my-doctor-panel" class="cd-panel">
                        @if(Auth::user()->doctor && $doctor_info = App\User::find(Auth::user()->doctor->doctor_id)->info)
                            <div class="normal">
                                <img src="/image/avatar/{{ $doctor_info->id}}.jpg" onerror="javascript:this.src='/image/default_head.png';">
                                <div class="intro">
                                        <h3>{{ $doctor_info->nickname }}</h3>

                                        <p>{{ $doctor_info->description }}</p>
                                </div>
                                <div class="my-cd-nav">
                                    <a href="#" class="to-cd-chat">会话</a>
                                    <a href="#" class="cd-layoff">解雇</a>
                                </div>
                            </div>
                        @else
                            <div class="none">
                                <p>你还没有医生，快去找一个医生吧～</p>

                                <div class="my-cd-nav">
                                    <a href="#" class="to-find-cd">查看</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="module personal-awards">
                    <h3>个人勋章</h3>
                    <ul class="award-list">
                        <li><img src="/image/award/a1.png" title="a1"></li>
                        <li><img src="/image/award/a2.png" title="a2"></li>
                        <li><img src="/image/award/a3.png" title="a3"></li>
                    </ul>
                </div>
                <div class="module profile-completion">
                    <h3>资料完成度</h3>

                    <div class="completion-content">
                        <div class="completion-percent-base"></div>
                        <div class="completion-percent"></div>
                    </div>
                    <span class="completion-label">66%</span>

                    <div class="profile-completion-nav">
                        <a href="#" class="to-complete-profile">完善资料</a>
                    </div>
                </div>
            </div>
            <div class="column center">
                <ul class="my-release-panel">
                    @foreach(Auth::user()->moments->sortByDesc('created_at') as $moment)
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
                <div class="personal-cd">
                    <div class="module cd-chat-panel">
                        <div class="chat-header">
                            <span class="name">姓名</span>
                        </div>
                        <div class="chat-content">
                            <div class="chat-history">
                                <ul>
                                    
                                </ul>
                            </div>
                            <div class="chat-input">
                                <nav>
                                    <a href="#" class="fa fa-image"></a>
                                    <a href="#" class="fa fa-smile-o"></a>
                                </nav>
                                <form action="/individual/profile/chat" id="words">
                                    <textarea id="chat-message"></textarea>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="personal-profile">
                    <div class="module profile-check-panel">
                        <div class="head-info pf">
                            <div class="pf-head">
                                <h3 class="pf-head-title">个人头像</h3>
                                <a href="#" class="pf-head-edit">编辑</a>
                            </div>
                            <img src="/image/avatar/{{ Auth::user()->id}}.jpg" onerror="javascript:this.src='/image/default_head.png';" class="head">

                            <div class="upload">
                                {!! Form::open(['url' => '/individual/profile/avatar', 'method' => 'post', 'id' => 'avatar', 'files' => true]) !!}
                                    <div class="upload-nav">
                                        <a href="#" class="fa fa-camera">
                                            <input type="file" name="avatar_file" id="img-upload">
                                            <span>上传头像</span>
                                        </a>
                                    </div>
                                    <div class="head-preview"></div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="module profile-check-panel">
                        <div class="basic-profile-info pf">
                            {!! Form::open(['url' => '/individual/profile/basic', 'method' => 'put', 'name' => 'basic']) !!}
                                <div class="pf-head">
                                    <h3 class="pf-head-title">基本资料</h3>
                                    <a href="#" id="basic" class="pf-head-edit">编辑</a>
                                </div>
                                <ul class="pf-items">
                                <li>
                                    <h4 class="pf-item-title">登陆名</h4>

                                    <p class="pf-item-value">{{ Auth::user()->name }}</p>
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="pf-item-editable">
                                </li>
                                <li>
                                    <h4 class="pf-item-title">昵称</h4>

                                    <p class="pf-item-value">{{ Auth::user()->info->nickname }}</p>
                                    <input type="text" name="nickname" value="{{ Auth::user()->info->nickname }}" class="pf-item-editable">
                                </li>
                                <li>
                                    <h4 class="pf-item-title">真实姓名</h4>

                                    <p class="pf-item-value">{{ Auth::user()->info->truename }}</p>
                                    <input type="text" name="truename" value="{{ Auth::user()->info->truename }}" class="pf-item-editable">
                                </li>
                                <li>
                                    <h4 class="pf-item-title">所在地</h4>

                                    <p class="pf-item-value">{{ Auth::user()->info->location }}</p>
                                    <input type="text" name="location" value="{{ Auth::user()->info->location }}" class="pf-item-editable">
                                </li>
                                <li>
                                    <h4 class="pf-item-title">性别</h4>

                                    <p class="pf-item-value">{{ Auth::user()->info->gendor }}</p>

                                    <div class="pf-item-editable selects">
                                        <select name="gendor" id="pf-sex">
                                            @if(Auth::user()->info->gendor=='男')
                                                <option value="男" selected="selected">男</option>
                                                <option value="女">女</option>
                                            @else
                                                <option value="男">男</option>
                                                <option value="女" selected="selected">女</option>
                                            @endif
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <h4 class="pf-item-title">生日</h4>

                                    <p class="pf-item-value">{{ Auth::user()->info->birthday }}</p>

                                    <div class="pf-item-editable selects">
                                        <select name="year" id="birth-year">
                                            <option value="----">----</option>
                                        </select>
                                        年
                                        <select name="month" id="birth-month">
                                            <option value="--">--</option>
                                        </select>
                                        月
                                        <select name="date" id="birth-date">
                                            <option value="--">--</option>
                                        </select>
                                        日
                                    </div>
                                </li>
                                <li>
                                    <h4 class="pf-item-title">简介</h4>

                                    <p class="pf-item-value area">{{ Auth::user()->info->description }}</p>
                                    <textarea name="description" id="" class="pf-item-editable">{{ Auth::user()->info->description }}</textarea>
                                </li>
                                </ul>
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="module profile-check-panel">
                        <div class="contact-info pf">
                            {!! Form::open(['url' => '/individual/profile/contact', 'method' => 'put', 'name' => 'contact']) !!}
                                <div class="pf-head">
                                    <h3 class="pf-head-title">联系信息</h3>
                                    <a href="#" id="contact" class="pf-head-edit">编辑</a>
                                </div>
                                <ul class="pf-items">
                                    <li>
                                        <h4 class="pf-item-title">邮箱</h4>

                                        <p class="pf-item-value">{{ Auth::user()->info->email }}</p>
                                        <input type="text" name="email" value="{{ Auth::user()->info->email }}" class="pf-item-editable">
                                    </li>
                                    <li>
                                        <h4 class="pf-item-title">QQ</h4>

                                        <p class="pf-item-value">{{ Auth::user()->info->qq }}</p>
                                        <input type="text" name="qq" value="{{ Auth::user()->info->qq }}" class="pf-item-editable">
                                    </li>
                                </ul>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="layoff-cd-window">
        {!! Form::open(['url' => '/individual/profile/coach', 'method' => 'delete', 'name' => 'deleteCoach']) !!}
        {!! Form::close() !!}
        {!! Form::open(['url' => '/individual/profile/doctor', 'method' => 'delete', 'name' => 'deleteDoctor']) !!}
        {!! Form::close() !!}
            <p class="fa fa-question-circle">你确定要解雇此人吗?</p>

            <div class="layoff-cd-choice">
                <a href="#" onclick="fire();" class="confirm">确定</a>
                <a href="#" class="cancel">取消</a>
            </div>
    </div>

    <div class="cd-list-window" id="coach-list-window">
        <div class="cd-list-panel">
            <nav class="clearfix">
                <form class="search">
                    <input class="search-input" placeholder="Search" type="text" value="" name="search">
                    <input class="search-submit" type="submit" value="">
                    <span class="fa fa-search"></span>
                </form>
                <a href="#" class="fa fa-close cancel"></a>
            </nav>
            <div class="cd-list-content">
                <ul class="cd-list">
                    @foreach(App\User::all()->filter(function($item) { return $item->hasRole('coach'); }) as $coach)
                        <li>
                            <img src="/image/avatar/{{ $coach->id }}.jpg" onerror="javascript:this.src='/image/default_head.png';">

                            <div class="cd-detail" id="cd-detail-{{ $coach->id }}">
                                <a href="#" onclick="cdid={{ $coach->id }};" class="cd-name">{{ $coach->info->nickname }}</a>

                                <p class="cd-info fa fa-info-circle">{{ $coach->info->company }}</p>

                                <p class="cd-liking fa fa-heart">
                                    @if($coach->customers)
                                        {{ $coach->customers->count() }}
                                    @else
                                        0
                                    @endif
                                </p>
                            </div>
                            {!! Form::open(['url' => '/individual/profile/coach', 'method' => 'post', 'name' => 'addCoachList'.$coach->id]) !!}
                                <input type="integer" name="coach_id" value="{{$coach->id}}" hidden>
                                <a href="#" onclick="form_used={{ 'addCoachList'.$coach->id }};addCoach();" class="to-rank-detail fa fa-plus">添加</a>
                            {!! Form::close() !!}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @foreach(App\User::all()->filter(function($item) { return $item->hasRole('coach'); }) as $coach) 
            <div class="cd-info-panel unvisible" id="cd-info-{{ $coach->id }}">
                <a href="#" class="fa fa-arrow-left back"></a>
                <img src="/image/avatar/{{ $coach->id }}.jpg" onerror="javascript:this.src='/image/default_head.png';">
                <div class="brief-info">
                    <p class="nickname">{{ $coach->info->nickname }}</p>
                    <p class="company fa fa-info-circle">{{ $coach->info->company }}</p>
                    <p class="liking fa fa-heart">
                        @if($coach->customers)
                            {{ $coach->customers->count() }}
                        @else
                            0
                        @endif
                    </p>
                </div>
                {!! Form::open(['url' => '/individual/profile/coach', 'method' => 'post', 'name' => 'addCoachDetail'.$coach->id]) !!}
                    <input type="integer" name="coach_id" value="{{$coach->id}}" hidden>
                    <a href="#" onclick="form_used={{ 'addCoachDetail'.$coach->id }};addCoach();" class="fa fa-plus">添加</a>
                {!! Form::close() !!}
                <div class="detail-info">
                    <ul>
                        <li>
                            <h4 class="item-title">性别</h4>
                            <p class="gender item-value">{{ $coach->info->gendor }}</p>
                        </li>
                        <li>
                            <h4 class="item-title">年龄</h4>
                            <p class="gender item-value">{{ $coach->info->age }}</p>
                        </li>
                        <li>
                            <h4 class="item-title">描述</h4>
                            <p class="gender item-value">
                                {{ $coach->info->description }}
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>

    <div class="cd-list-window" id="doctor-list-window">
        <div class="cd-list-panel">
            <nav class="clearfix">
                <form class="search">
                    <input class="search-input" placeholder="Search" type="text" value="" name="search">
                    <input class="search-submit" type="submit" value="">
                    <span class="fa fa-search"></span>
                </form>
                <a href="#" class="fa fa-close cancel"></a>
            </nav>
            <div class="cd-list-content">
                <ul class="cd-list">
                    @foreach(App\User::all()->filter(function($item) { return $item->hasRole('doctor'); }) as $doctor)
                        <li>
                            <img src="/image/avatar/{{ $doctor->id }}.jpg" onerror="javascript:this.src='/image/default_head.png';">

                            <div class="cd-detail" id="cd-detail-{{ $doctor->id }}">
                                <a href="#" onclick="cdid={{ $doctor->id }};" class="cd-name">{{ $doctor->info->nickname }}</a>

                                <p class="cd-info fa fa-info-circle">{{ $doctor->info->company }}</p>

                                <p class="cd-liking fa fa-heart">
                                    @if($doctor->customers)
                                        {{ $doctor->customers->count() }}
                                    @else
                                        0
                                    @endif
                                </p>
                            </div>
                            {!! Form::open(['url' => '/individual/profile/doctor', 'method' => 'post', 'name' => 'addDoctorList'.$doctor->id]) !!}
                                <input type="integer" name="doctor_id" value="{{$doctor->id}}" hidden>
                                <a href="#" onclick="form_used={{ 'addDoctorList'.$doctor->id }};addDoctor();" class="to-rank-detail fa fa-plus">添加</a>
                            {!! Form::close() !!}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @foreach(App\User::all()->filter(function($item) { return $item->hasRole('doctor'); }) as $doctor) 
            <div class="cd-info-panel unvisible" id="cd-info-{{ $doctor->id }}">
                <a href="#" class="fa fa-arrow-left back"></a>
                <img src="/image/avatar/{{ $doctor->id}}.jpg" onerror="javascript:this.src='/image/default_head.png';">
                <div class="brief-info">
                    <p class="nickname">{{ $doctor->info->nickname }}</p>
                    <p class="company fa fa-info-circle">{{ $doctor->info->company }}</p>
                    <p class="liking fa fa-heart">
                        @if($doctor->customers)
                            {{ $doctor->customers->count() }}
                        @else
                            0
                        @endif
                    </p>
                </div>
                {!! Form::open(['url' => '/individual/profile/doctor', 'method' => 'post', 'name' => 'addDoctorDetail'.$doctor->id]) !!}
                    <input type="integer" name="doctor_id" value="{{$doctor->id}}" hidden>
                    <a href="#" onclick="form_used={{ 'addDoctorDetail'.$doctor->id }};addDoctor();" class="fa fa-plus">添加</a>
                {!! Form::close() !!}
                <div class="detail-info">
                    <ul>
                        <li>
                            <h4 class="item-title">性别</h4>
                            <p class="gender item-value">{{ $doctor->info->gendor }}</p>
                        </li>
                        <li>
                            <h4 class="item-title">年龄</h4>
                            <p class="gender item-value">{{ $doctor->info->age }}</p>
                        </li>
                        <li>
                            <h4 class="item-title">描述</h4>
                            <p class="gender item-value">
                                {{ $doctor->info->description }}
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>

    <div class="overlay"></div>
</div>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/basic.js"></script>
<script>
    var year_now = {{ explode('/', Auth::user()->info->birthday)[0] }};
    var month_now = {{ explode('/', Auth::user()->info->birthday)[1] }};
    var date_now = {{ explode('/', Auth::user()->info->birthday)[2] }};
    var cdid;
    var form_used;
    var csrf_token = "{{ csrf_token() }}";
    var auth_user_id = {{ Auth::user()->id }};
    var type;
</script>
<script src="/js/friendDynamic.js"></script>
<script src="/js/profile.js"></script>
</body>
</html>