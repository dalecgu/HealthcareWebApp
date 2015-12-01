<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>跑呗</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/coach.css">
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
                <a href="#" class="fa fa-cog"></a>
                <a href="#" class="fa fa-bell active"></a>
            </div>
        </nav>
        <div class="profile">
            <img src="image/default_head.png">

            <div class="basic-info">
                <a href="#">{{ Auth::user()->name }}</a>
                <a href="#">{{ Auth::user()->email }}</a>
            </div>
        </div>
    </header>

    <div class="main">
        <div class="customer-list">
            <ul>
                @foreach(Auth::user()->customers as $key=>$customer)
                    @if($key==0)
                        @if($selectedCustomer=$customer)
                        @endif
                        <li class="chosen">
                            <img src="image/default_head.png">
                            <span class="name">{{ $customer->user->info->nickname }}</span>
                            <span class="notification unvisible"></span>
                        </li>
                    @else
                        <li>
                            <img src="image/default_head.png">
                            <span class="name">{{ $customer->user->info->nickname }}</span>
                            <span class="notification">1</span>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="chat-panel">
            <div class="chat-header">
                <span class="name">{{ $selectedCustomer->user->info->nickname }}</span>
            </div>
            <div class="chat-content">
                <div class="chat-history">
                    <ul>
                        @foreach(App\Advice::all()->filter(function($item) use ($selectedCustomer) { return ($item->advisor_id==Auth::user()->id && $item->user_id==$selectedCustomer->user->id) || ($item->advisor_id==$selectedCustomer->user->id && $item->user_id==Auth::user()->id); }) as $advice)
                            @if($advice->advisor_id==Auth::user()->id)
                                <li class="me chat-item clearfix">
                                    <img src="image/default_head.png" class="head">
                                    <div class="words">
                                        <p>{{ $advice->content }}</p>
                                    </div>
                                </li>
                            @else
                                <li class="other chat-item clearfix">
                                    <img src="image/default_head.png" class="head">
                                    <div class="words">
                                        <p>{{ $advice->content }}</p>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="chat-input">
                    <nav>
                        <a href="#" class="fa fa-image"></a>
                        <a href="#" class="fa fa-smile-o"></a>
                    </nav>
                    <form method="post" action="/coachdoctor/advice" name="words" id="words">
                        <input type="integer" name="user_id" value="{{ $selectedCustomer->user->id }}" hidden>
                        <input type="submit">
                        <textarea name="content"></textarea>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="notification-window">
        <ul>
            <li>
                <img src="image/default_head.png" class="head">
                <span>王麻子已经选择你作为教练了～</span>
                <a href="#" class="to-chat">交谈</a>
            </li>
            <li>
                <img src="image/default_head.png" class="head">
                <span>王麻子已经选择你作为教练了～</span>
                <a href="#" class="to-chat">交谈</a>
            </li>
            <li>
                <img src="image/default_head.png" class="head">
                <span>王麻子已经选择你作为教练了～</span>
                <a href="#" class="to-chat">交谈</a>
            </li>
            <li>
                <img src="image/default_head.png" class="head">
                <span>王麻子已经选择你作为教练了～</span>
                <a href="#" class="to-chat">交谈</a>
            </li>
            <li>
                <img src="image/default_head.png" class="head">
                <span>王麻子已经选择你作为教练了～</span>
                <a href="#" class="to-chat">交谈</a>
            </li>
            <li>
                <img src="image/default_head.png" class="head">
                <span>王麻子已经选择你作为教练了～</span>
                <a href="#" class="to-chat">交谈</a>
            </li>
            <li>
                <img src="image/default_head.png" class="head">
                <span>王麻子已经选择你作为教练了～</span>
                <a href="#" class="to-chat">交谈</a>
            </li>
        </ul>
    </div>
    <div class="overlay"></div>
</div>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/coach.js"></script>
</body>
</html>