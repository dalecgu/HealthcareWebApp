<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/adCommon.css">
</head>
<body>

<div class="container">
    <header>
        <ul class="cbp-tm-menu">
            <li>
                <a href="#" class="fa fa-codepen web-icon">跑呗</a>
            </li>
            <li>
                <a href="#" class="fa fa-plus">添加</a>
                <ul class="cbp-tm-submenu">
                    <li><a href="/admin/user/add">添加用户</a></li>
                    <li><a href="/admin/coach/add">添加教练</a></li>
                    <li><a href="/admin/doctor/add">添加医生</a></li>
                    <li><a href="/admin/activity/add">添加活动</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <div class="main">
        <div class="main-wrapper">
            <aside class="nav">
                <ul>
                    <li><a href="/admin/user" class="fa fa-users">用户</a></li>
                    <li><a href="/admin/coach" class="fa fa-clipboard">教练</a></li>
                    <li><a href="/admin/doctor" class="fa fa-hospital-o">医生</a></li>
                    <li class="chosen"><a href="/admin/activity" class="fa fa-futbol-o">活动</a></li>
                    <li><a href="/auth/logout" class="fa fa-sign-out">登出</a></li>
                </ul>
            </aside>
            <div class="content">
                <div class="title">
                    <h3>添加活动</h3>
                </div>
                {!! Form::open(['url' => '/admin/activity/add', 'method' => 'post', 'name' => 'addActivity', 'files' => true]) !!}
                <ul class="pf-items">
                    <li>
                        <h4 class="pf-item-title">活动名</h4>
                        <input type="text" name="title">
                    </li>
                    <li>
                        <h4 class="pf-item-title">开始时间</h4>
                        <input type="text" name="begin_time">
                    </li>
                    <li>
                        <h4 class="pf-item-title">结束时间</h4>
                        <input type="text" name="end_time">
                    </li>
                    <li>
                        <h4 class="pf-item-title">活动简介</h4>
                        <textarea name="description"></textarea>
                    </li>
                    <li>
                        <h4 class="pf-item-title">活动封面</h4>
                        <div>
                            <a href="#" class="fa fa-camera">
                                <input type="file" name="activity_file" id="img-upload">
                                <span>上传封面</span>
                            </a>
                            <div class="cover-preview"></div>
                        </div>
                    </li>
                </ul>
                {!! Form::close() !!}
                <div class="action">
                    <a href="javascript:void(0)" onclick="document.addActivity.submit();">完成</a>
                    <a href="/admin/activity" class="cancel">取消</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/adminBasic.js"></script>
<script>
    $(function () {
        var $imgUploader = $(".pf-items #img-upload");
        var $imgPreview = $(".pf-items .cover-preview");
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