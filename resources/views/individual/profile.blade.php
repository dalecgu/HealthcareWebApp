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
            <li><a href="/individual" class="fa fa-home">首页</a></li>
            <li><a href="activity.html" class="fa fa-futbol-o">活动</a></li>
            <li><a href="group.html" class="fa fa-group">兴趣组</a></li>
            <li class="chosen"><a href="/individual/profile" class="fa fa-user">个人中心</a></li>
            <li><a href="/auth/logout" class="fa fa-sign-out">登出</a></li>
        </ul>
    </nav>

    <div class="main">
        <div class="main-wrapper clearfix">
            <div class="column right">
                <div class="module profile-head-info">
                    <img src="/image/default_head.png">

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
                                <img src="/image/default_head.png">
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
                                <img src="/image/default_head.png">
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
                <div class="my-release-panel">
                    <div class="module tmp1">
                        我的动态
                    </div>
                    <div class="module tmp1">
                        我的动态
                    </div>
                    <div class="module tmp1">
                        我的动态
                    </div>
                    <div class="module tmp1">
                        我的动态
                    </div>
                    <div class="module tmp1">
                        我的动态
                    </div>
                    <div class="module tmp1">
                        我的动态
                    </div>
                </div>
                <div class="personal-cd">
                    <div class="module cd-chat-panel">
                        <div class="chat-header">
                            <span class="name">姓名</span>
                        </div>
                        <div class="chat-content">
                            <div class="chat-history"></div>
                            <div class="chat-input">
                                <nav>
                                    <a href="#" class="fa fa-image"></a>
                                    <a href="#" class="fa fa-smile-o"></a>
                                </nav>
                                <textarea name="" id="chat-message"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="personal-profile">
                    <div class="module profile-check-panel">
                        <div class="basic-profile-info">
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
                        <div class="contact-info">
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
        <p class="fa fa-question-circle">你确定要解雇此人吗?</p>

        <div class="layoff-cd-choice">
            <a href="#" class="confirm">确定</a>
            <a href="#" class="cancel">取消</a>
        </div>
    </div>

    <div class="cd-list-window">
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
                    <li>
                        <img src="/image/default_head.png">

                        <div class="cd-detail">
                            <a href="#" class="cd-name">张医生</a>

                            <p class="cd-info fa fa-info-circle">协和医院主治医生</p>

                            <p class="cd-liking fa fa-heart">173</p>
                        </div>
                        <a href="#" class="to-rank-detail fa fa-plus">添加</a>
                    </li>
                    <li>
                        <img src="/image/default_head.png">

                        <div class="cd-detail">
                            <a href="#" class="cd-name">张医生</a>

                            <p class="cd-info fa fa-info-circle">协和医院主治医生</p>

                            <p class="cd-liking fa fa-heart">173</p>
                        </div>
                        <a href="#" class="to-rank-detail fa fa-plus">添加</a>
                    </li>
                    <li>
                        <img src="/image/default_head.png">

                        <div class="cd-detail">
                            <a href="#" class="cd-name">张医生</a>

                            <p class="cd-info fa fa-info-circle">协和医院主治医生</p>

                            <p class="cd-liking fa fa-heart">173</p>
                        </div>
                        <a href="#" class="to-rank-detail fa fa-plus">添加</a>
                    </li>
                    <li>
                        <img src="/image/default_head.png">

                        <div class="cd-detail">
                            <a href="#" class="cd-name">张医生</a>

                            <p class="cd-info fa fa-info-circle">协和医院主治医生</p>

                            <p class="cd-liking fa fa-heart">173</p>
                        </div>
                        <a href="#" class="to-rank-detail fa fa-plus">添加</a>
                    </li>
                    <li>
                        <img src="/image/default_head.png">

                        <div class="cd-detail">
                            <a href="#" class="cd-name">张医生</a>

                            <p class="cd-info fa fa-info-circle">协和医院主治医生</p>

                            <p class="cd-liking fa fa-heart">173</p>
                        </div>
                        <a href="#" class="to-rank-detail fa fa-plus">添加</a>
                    </li>
                    <li>
                        <img src="/image/default_head.png">

                        <div class="cd-detail">
                            <a href="#" class="cd-name">张医生</a>

                            <p class="cd-info fa fa-info-circle">协和医院主治医生</p>

                            <p class="cd-liking fa fa-heart">173</p>
                        </div>
                        <a href="#" class="to-rank-detail fa fa-plus">添加</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="cd-info-panel unvisible">
            <a href="#" class="fa fa-arrow-left back"></a>
            <img src="/image/default_head.png">
            <div class="brief-info">
                <p class="nickname">王大妈</p>
                <p class="company fa fa-info-circle">南京玛利亚女子医院主任</p>
                <p class="liking fa fa-heart">173</p>
            </div>
            <a href="#" class="fa fa-plus">添加</a>
            <div class="detail-info">
                <ul>
                    <li>
                        <h4 class="item-title">性别</h4>
                        <p class="gender item-value">女</p>
                    </li>
                    <li>
                        <h4 class="item-title">年龄</h4>
                        <p class="gender item-value">36</p>
                    </li>
                    <li>
                        <h4 class="item-title">描述</h4>
                        <p class="gender item-value">
                            1996年开始行医，妙手回春，简直是华佗再世！
                            用过的都说好！
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="overlay"></div>
</div>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/basic.js"></script>
<script>
    $(function () {
        $(".personal-cd-intro > nav > a").click(function () {
            $(this).siblings("a").removeClass("chosen");
            $(this).addClass("chosen");
            var target = $(this).attr("href");
            $(target).siblings("div").css("z-index", "1");
            $(target).css("z-index", "2");
            return false;
        });

        var profile_completion_percent = 0.66;
        $(".completion-percent").css("width", profile_completion_percent * 100 + '%');
        $(".completion-label").text(profile_completion_percent * 100 + "%");

        $(".to-complete-profile").click(function () {
            $(".center.column > div").hide();
            $(".center.column .personal-profile").show();
            $("body").scrollTop(0);
            return false;
        });

        $(".to-cd-chat").click(function () {
            $(".center.column > div").hide();
            $(".center.column .personal-cd").show();
            $("body").scrollTop(0);
            return false;
        });
    });

    $(function () {
        $(".personal-cd-intro .cd-layoff").click(function (event) {
            var $window = $(".layoff-cd-window");
            $(".overlay").show();
            $window.css("top", $("body").scrollTop() + "px");
            $window.slideDown(500);
            $("body").css("overflow", "hidden");
            event.stopPropagation();
            return false;
        });

        $(".layoff-cd-window .cancel").click(function () {
            $(".layoff-cd-window").slideUp(500, function () {
                $(".overlay").hide();
            });
            $("body").css("overflow", "auto");
            return false;
        });
    });

    $(function () {
        $(".to-find-cd").click(function (event) {
            var $window = $(".cd-list-window");
            $(".overlay").show();
            $window.css("top", ($("body").scrollTop + 100) + "px");
            $window.slideDown(500);
            $("body").css("overflow", "hidden");
            event.stopPropagation();
            return false;
        });

        $(".cd-list-window .cancel").click(function () {
            $(".cd-list-window").slideUp(500, function () {
                $(".overlay").hide();
            });
            $("body").css("overflow", "auto");
            return false;
        });

        $(".cd-info-panel .back").click(function () {
            $(".cd-info-panel").addClass("unvisible");
        });

        $(".cd-list-panel .cd-name").click(function(){
            $(".cd-info-panel").removeClass("unvisible");
        })
    });

    $(function () {

        var i = 0;
        for (i = 2014; i >= 1900; i--) {
            $("#birth-year").append($("<option value='" + (i + 1) + "'>" + (i + 1) + "</option>"));
        }
        for (i = 0; i < 12; i++) {
            $("#birth-month").append($("<option value='" + (i + 1) + "'>" + (i + 1) + "</option>"));
        }
        for (i = 0; i < 31; i++) {
            $("#birth-date").append($("<option value='" + (i + 1) + "'>" + (i + 1) + "</option>"));
        }
        $("#birth-year").find("option[value='{{ explode('/', Auth::user()->info->birthday)[0] }}']").attr("selected", "selected");
        $("#birth-month").find("option[value='{{ explode('/', Auth::user()->info->birthday)[1] }}']").attr("selected", "selected");
        $("#birth-date").find("option[value='{{ explode('/', Auth::user()->info->birthday)[2] }}']").attr("selected", "selected");

        $("#basic").click(function () {
            var value = $(this).parent().next().find(".pf-item-value"),
                    edit_value = $(this).parent().next().find(".pf-item-editable");
            if ($(this).text() == "编辑") {
                $(this).text("保存");
            }
            else {
                $(this).text("编辑");
                document.basic.submit();

                edit_value.not(".selects").each(function () {
                    $(this).attr("valid_val", $(this).val());
                });

                edit_value.filter('.selects').each(function () {
                    var val = "",
                            selects = $(this).find("select");
                    selects.each(function () {
                        val += $(this).val() + "/";
                    });
                    $(this).attr("valid_val", val.substr(0, val.length - 1));
                });

                value.each(function () {
                    $(this).text($(this).parent().find(".pf-item-editable").attr("valid_val"));
                });
            }
            value.toggle();
            edit_value.toggle();
            return false;
        });

        $("#contact").click(function () {
            var value = $(this).parent().next().find(".pf-item-value"),
                    edit_value = $(this).parent().next().find(".pf-item-editable");
            if ($(this).text() == "编辑") {
                $(this).text("保存");
            }
            else {
                $(this).text("编辑");
                document.contact.submit();

                edit_value.not(".selects").each(function () {
                    $(this).attr("valid_val", $(this).val());
                });

                value.each(function () {
                    $(this).text($(this).parent().find(".pf-item-editable").attr("valid_val"));
                });
            }
            value.toggle();
            edit_value.toggle();
            return false;
        });
    })
</script>
</body>
</html>