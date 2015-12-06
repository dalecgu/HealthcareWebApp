<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑呗</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/coach.css">
</head>
<body>
<div class="content">
    <header>
        <nav>
            <span class="logo fa fa-codepen"></span>

            <div class="sb-search">
                <form>
                    <input class="sb-search-input" placeholder="Search" type="text" value="" name="search">
                    <input class="sb-search-submit" type="submit" value="">
                    <span class="fa fa-search"></span>
                </form>
            </div>

            <div class="right group">
                <a href="#" class="fa fa-bell active"></a>
            </div>
        </nav>
        <div class="profile">
            <img src="/image/avatar/{{ Auth::user()->id}}.jpg" onerror="javascript:this.src='/image/default_head.png';">

            <div class="basic-info">

                <a href="#" class="user-name">{{ Auth::user()->name }}</a>
                <div class="menu">
                    <a href="#" class="fa fa-caret-down to-conf"></a>
                    <ul class="submenu">
                        <li><a href="#" class="to-edit-profile">修改资料</a></li>
                        <li><a href="/auth/logout">登出</a></li>
                    </ul>
                </div>
                <a href="#" class="user-email">{{ Auth::user()->email }}</a>
            </div>
        </div>
    </header>

    <div class="main">
        <div class="customer-list">
            <ul>
                @if(Auth::user()->customers->count()!=0)
                    @foreach(Auth::user()->customers as $key=>$customer)
                        @if($key==0)
                            @if($selectedCustomer=$customer)
                            @endif
                            <li class="chosen" id="customer{{ $customer->user_id }}">
                                <img src="/image/avatar/{{ $customer->user_id}}.jpg" onerror="javascript:this.src='/image/default_head.png';">
                                <span class="name">{{ $customer->user->info->nickname }}</span>
                                <span class="notification unvisible"></span>
                            </li>
                        @else
                            <li id="customer{{ $customer->user_id }}">
                                <img src="/image/avatar/{{ $customer->user_id}}.jpg" onerror="javascript:this.src='/image/default_head.png';">
                                <span class="name">{{ $customer->user->info->nickname }}</span>
                                <span class="notification unvisible"></span>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="chat-panel">
            <div class="chat-header">
                <span class="name">
                    @if(Auth::user()->customers->count()!=0)
                        {{ $selectedCustomer->user->info->nickname }}
                    @endif
                </span>
            </div>
            <div class="chat-content">
                <div class="chat-history">
                    <ul>
                        @if(Auth::user()->customers->count()!=0)
                            @foreach(App\Advice::all()->filter(function($item) use ($selectedCustomer) { return ($item->advisor_id==Auth::user()->id && $item->user_id==$selectedCustomer->user->id) || ($item->advisor_id==$selectedCustomer->user->id && $item->user_id==Auth::user()->id); }) as $advice)
                                @if($advice->advisor_id==Auth::user()->id)
                                    <li class="me chat-item clearfix">
                                        <img src="/image/default_head.png" class="head">
                                        <div class="words">
                                            <p>{{ $advice->content }}</p>
                                        </div>
                                    </li>
                                @else
                                    <li class="other chat-item clearfix">
                                        <img src="/image/default_head.png" class="head">
                                        <div class="words">
                                            <p>{{ $advice->content }}</p>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="chat-input">
                    <nav>
                        <a href="#" class="fa fa-image"></a>
                        <a href="#" class="fa fa-smile-o"></a>
                    </nav>
                    {!! Form::open(['url' => '/coachdoctor/advice', 'method' => 'post', 'name' => 'words', 'id' => 'words']) !!}
                        <textarea name="content"></textarea>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="notification-window">
        <ul>
            <li>
                <img src="/image/default_head.png" class="head">
                <span>王麻子已经选择你作为教练了～</span>
                <a href="#" class="to-chat">交谈</a>
            </li>
        </ul>
    </div>

    <div class="profile-edit-window">
        <div class="basic-profile-info">
        {!! Form::open(['url' => '/coachdoctor/profile', 'method' => 'put', 'name' => 'profile']) !!}
            <div class="pf-head">
                <h3 class="pf-head-title">基本资料</h3>
                <a href="#" class="pf-head-edit">编辑</a>
            </div>
            <ul class="pf-items">
                <li>
                    <h4 class="pf-item-title">昵称</h4>

                    <p class="pf-item-value">{{ Auth::user()->info->nickname }}</p>
                    <input type="text" name="nickname" value="{{ Auth::user()->info->nickname }}" class="pf-item-editable">
                </li>
                <li>
                    <h4 class="pf-item-title">性别</h4>

                    <p class="pf-item-value">{{Auth::user()->info->gendor}}</p>

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
                    <h4 class="pf-item-title">年龄</h4>

                    <p class="pf-item-value">{{ Auth::user()->info->age }}</p>
                    <input type="text" name="age" value="{{ Auth::user()->info->age }}" class="pf-item-editable">
                </li>
                <li>
                    <h4 class="pf-item-title">所在地</h4>

                    <p class="pf-item-value">{{ Auth::user()->info->location }}</p>
                    <input type="text" name="location" value="{{ Auth::user()->info->location }}" class="pf-item-editable">
                </li>
                <li>
                    <h4 class="pf-item-title">职务</h4>

                    <p class="pf-item-value">{{ Auth::user()->info->company }}</p>
                    <input type="text" name="company" value="{{ Auth::user()->info->company }}" class="pf-item-editable">
                </li>
                <li>
                    <h4 class="pf-item-title">简介</h4>

                    <p class="pf-item-value area">{{ Auth::user()->info->description }}</p>
                    <textarea name="description" class="pf-item-editable">{{ Auth::user()->info->description }}</textarea>
                </li>
            </ul>
            {!! Form::close() !!}
        </div>
    </div>
    
    <div class="overlay"></div>
</div>
<script src="/js/jquery-2.1.4.min.js"></script>
<script>
    var auth_user_id = {{ Auth::user()->id }};
    var selected_customer_id = $(".customer-list .chosen").attr("id").substr(8);;
</script>
<script src="/js/coach.js"></script>
</body>
</html>