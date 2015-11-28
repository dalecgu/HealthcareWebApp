<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health</title>
    <link rel="stylesheet" href="/css/login/screen.css">
</head>
<body>

<a class="hiddenanchor" id="toregister"></a>
<a class="hiddenanchor" id="tologin"></a>

<div class="md-modal md-effect" id="modal">
    <div id="login">
        <form method="post" action="/auth/login" autocomplete="on">
            {!! csrf_field() !!}
            <h1>Log in</h1>
            <p>
                <label for="username" class="uname" data-icon="u" > Your email </label>
                <input id="username" name="email" required="required" type="text" placeholder="mymail@mail.com"/>
            </p>
            <p>
                <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
            </p>
            <p class="keeplogin">
                <input type="checkbox" name="remember-me" id="loginkeeping" value="loginkeeping" />
                <label for="loginkeeping">Keep me logged in</label>
            </p>
            <p class="button">
                <input type="submit" value="Login" />
            </p>
            <p class="change_link">
                Not a member yet ?
                <a href="#toregister">Join us</a>
            </p>
        </form>
    </div>

    <div id="register">
        <form method="post" action="/auth/register" autocomplete="on">
            {!! csrf_field() !!}
            <h1> Sign up </h1>
            <p>
                <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                <input id="usernamesignup" name="name" required="required" type="text" placeholder="mysuperusername690" />
            </p>
            <p>
                <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                <input id="emailsignup" name="email" required="required" type="email" placeholder="mysupermail@mail.com"/>
            </p>
            <p>
                <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/>
            </p>
            <p>
                <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                <input id="passwordsignup_confirm" name="password_confirmation" required="required" type="password" placeholder="eg. X8df!90EO"/>
            </p>
            <p class="button">
                <input type="submit" value="Sign in" />
            </p>
            <p class="change_link">
                Already a member ?
                <a href="#tologin"> Go and log in </a>
            </p>
        </form>
    </div>
</div>

<div class="container">
    <nav class="clearfix">
        <a href="#" class="md-trigger" data-modal="modal">Log in</a>
    </nav>
    <div class="environment">
        <div class="cloud"></div>
        <div class="cloud"></div>
        <div class="cloud"></div>
        <div class="tree tree1"></div>
        <div class="tree tree2"></div>
        <div class="mountain"></div>
        <div class="land"></div>
        <ul class="person">
            <li class="leg left"></li>
            <li class="leg right"></li>
            <li class="head"></li>
            <li class="arm left"></li>
            <li class="body"></li>
            <li class="arm right"></li>
        </ul>
    </div>
</div>
<div class="md-overlay"></div>
<script src="/js/classie.js"></script>
<script src="/js/modalEffects.js"></script>
</body>
</html>
