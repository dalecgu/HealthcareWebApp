<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑呗</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/group.css">
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
            <li><a href="/activity" class="fa fa-futbol-o">活动</a></li>
            <li class="chosen"><a href="/group" class="fa fa-group">兴趣组</a></li>
            <li><a href="/individual/profile" class="fa fa-user">个人中心</a></li>
            <li><a href="/auth/logout" class="fa fa-sign-out">登出</a></li>
        </ul>
    </nav>
    <div class="main">
        <div class="main-wrapper">
            <div class="column left">
                <div class="module group-category">
                    <h4>分类</h4>
                    <ul>
                        <li><span class="category-name">文化</span><span class="category-num">{{ App\Group::where('tag', '文化')->count() }}</span></li>
                        <li><span class="category-name">行摄</span><span class="category-num">{{ App\Group::where('tag', '行摄')->count() }}</span></li>
                        <li><span class="category-name">娱乐</span><span class="category-num">{{ App\Group::where('tag', '娱乐')->count() }}</span></li>
                        <li><span class="category-name">时尚</span><span class="category-num">{{ App\Group::where('tag', '时尚')->count() }}</span></li>
                        <li><span class="category-name">生活</span><span class="category-num">{{ App\Group::where('tag', '生活')->count() }}</span></li>
                        <li><span class="category-name">科技</span><span class="category-num">{{ App\Group::where('tag', '科技')->count() }}</span></li>
                        <li><span class="category-name">其他</span><span class="category-num">{{ App\Group::where('tag', '其他')->count() }}</span></li>
                    </ul>
                </div>
                <a href="#" class="to-create-group btn fa fa-plus"></a>
            </div>
            <div class="column center">
                @foreach(App\Group::all() as $group)
                    <div class="module group-card">
                        <div class="card-image">
                            <img src="/image/group/{{ $group->id}}.jpg" onerror="javascript:this.src='/image/tmp/gc1.jpg';">
                        </div>
                        <div class="card-content">
                            <p>{{ $group->description }}</p>
                        </div>
                        <div class="card-action">
                            <span>{{ $group->name }}</span>
                            <a href="group/{{$group->id}}">去逛逛</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="new-topic-window">
        <header class="clearfix">
            <h4>创建兴趣组</h4>
            <a href="#" class="fa fa-close cancel"></a>
        </header>
        {!! Form::open(['url' => '/group', 'method' => 'post', 'id' => 'group', 'files' => true]) !!}
            <p>
                <label for="my-topic-title">名称</label><br/>
                <input type="text" name="name" id="my-topic-title">
            </p>
            <p>
                <label for="my-topic-title">分类</label><br/>
                <select name="tag" id="birth-year">
                    <option value="文化">文化</option>
                    <option value="行摄">行摄</option>
                    <option value="娱乐">娱乐</option>
                    <option value="时尚">时尚</option>
                    <option value="生活">生活</option>
                    <option value="科技">科技</option>
                    <option value="其他">其他</option>
                </select>
            </p>
            <p>
                <label for="my-topic-content">描述</label><br/>
                <textarea name="description" id="my-topic-content"></textarea>
            </p>
            <p>
                <a href="#" class="fa fa-camera">
                    <input type="file" name="group_file" id="img-upload">
                    <span>上传封面</span>
                </a>
            </p>
            <div class="cover-preview"></div>
            <input type="submit">
        {!! Form::close() !!}
    </div>
    <div class="overlay"></div>
</div>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/basic.js"></script>
<script>
    $(".to-create-group").click(function () {
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

    $(function () {
        var $imgUploader = $(".new-topic-window #img-upload");
        var $imgPreview = $(".new-topic-window .cover-preview");
        $imgUploader.bind("change", function () {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function (e) {
                    var urlData = this.result;
                    var $new_item_image = $("<img src='" + urlData + "'>");
                    $new_item_image.width($imgPreview.width());
                    $new_item_image.height($imgPreview.height());
                    $imgPreview.empty();
                    $imgPreview.append($new_item_image);
                }
            }
        });
    });
</script>
</body>
</html>