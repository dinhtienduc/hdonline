<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{!!asset('user/css/loginstyle.css')!!}">
</head>

<body>
  <div id="clouds">
    <div class="cloud x1"></div>
    <!-- Time for multiple clouds to dance around -->
    <div class="cloud x2"></div>
    <div class="cloud x3"></div>
    <div class="cloud x4"></div>
    <div class="cloud x5"></div>
</div>
    <div class="container">
        <div id="login">
                <fieldset class="clearfix">
                    <form method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <span class="fontawesome-user"></span>
                            <input type="text" name="txtUserName" value="{!! old('txtUserName')!!}" placeholder="UserName" > <!-- JS because of IE support; better: placeholder="Username" -->
                        <span class="fontawesome-lock"></span>
                            <input type="password" name="txtPassword"  placeholder="PassWord"> <!-- JS because of IE support; better: placeholder="Password" -->
                        <input type="submit" value="Sign In">
                    </form>
                </fieldset>
            <p>Not a member? <a href="{!!url('/signUp')!!}" class="blue">Sign up now</a><span class="fontawesome-arrow-right"></span></p>
            @include('user.blocks.error')
        </div> <!-- end login -->
    </div>
</body>
</html>
