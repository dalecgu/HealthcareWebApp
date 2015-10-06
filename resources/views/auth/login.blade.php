<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="dalec">

    <title>健康助手|登录</title>

    <!-- Bootstrap core CSS -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <link href="//cdn.bootcss.com/iCheck/1.0.1/skins/square/grey.css" rel="stylesheet">

    <link href="//cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
  </head>

  <body>
    <div id="content" class="container-fluid">
      <div class="row">
        <div class="col-sm-6" id="left-side">
          <form class="form-signin" method="post" action="/auth/login">
            {!! csrf_field() !!}

            <h3 class="form-signin-heading">登录</h3>
            <label for="inputEmail" class="sr-only">邮箱地址</label>
            <input type="email" id="inputEmail" name="email" class="form-control" value="{{ old('email') }}" placeholder="邮箱地址" required autofocus>
            <label for="inputPassword" class="sr-only">密码</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="密码" required>
            <div class="checkbox">
              <label>
                <input type="checkbox" id="remember-me" name="remember" value="remember-me"> <strong>记住我</strong>
              </label>
            </div>
            <button class="btn btn-block btn-success" type="submit">登录</button>
            <p>
              <a href="">忘记密码？</a>
            </p>
          </form>
        </div>
        <div class="col-sm-6" id="right-side">
          <p>
            没有账号？<a href="">立即注册</a>
          </p>
          <br>
          <button type="button" class="btn btn-danger btn-block">
              <i class="fa fa-qq"></i> QQ登录
          </button>
          <button type="button" class="btn btn-success btn-block">
              <i class="fa fa-wechat"></i> 微信登录
          </button>
          <button type="button" class="btn btn-warning btn-block">
              <i class="fa fa-weibo"></i> 微博登录
          </button>
          <button type="button" class="btn btn-primary btn-block">
              <i class="fa fa-facebook"></i> 脸书登录
          </button>
        </div>
      </div>
    </div>

    <footer class="footer navbar-fixed-bottom">
      <div class="hr">
      </div>
      <p class="text-center">
        作者：131250169&nbsp;&nbsp;顾恒清
      </p>
    </footer>

    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//cdn.bootcss.com/iCheck/1.0.1/icheck.js"></script>
    <script>
      $('#remember-me').iCheck({
        checkboxClass: 'icheckbox_square-grey'
      });
    </script>
  </body>
</html>