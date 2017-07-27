<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{!!asset('user/css/registerstyle.css')!!}">
  <link rel="stylesheet" href="{!!asset('user/css/font-awesome.min.css')!!}" />
</head>

<body>
  <div id="login-box">
    <div class="left">
      <form action="" method="post">
       
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h1>Sign up</h1>
        <input type="text" name="txtUserName" placeholder="Username" value="{!! old('txtUserName')!!}" />
        <input type="text" name="txtEmail" placeholder="E-mail" value="{!! old('txtEmail')!!}" />
        <input type="password" name="txtPassword" placeholder="Password" />
        <input type="password" name="txtRePassword" placeholder="Retype password" />
        <input type="submit" name="signup_submit" value="Sign me up" />
          <a href="{!!url('/')!!}">
            <i style="float: right;padding-top: 15px;" class="fa fa-home fa-3x" aria-hidden="true"></i>
          </a>
      </form>
    </div>
    <div class="right">
      <span class="loginwith">Sign in with<br />social network</span>
      <button class="social-signin facebook">Log in with facebook</button>
      <button class="social-signin google">Log in with Google+</button>
    </div>
    <div class="or">OR</div>
  </div>
  <div class="col-md-12" >
     @include('user.blocks.error')
  </div>
    
  
</body>
</html>
