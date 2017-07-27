<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="One Movies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
@include('user.dashboard.tempcss')
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="header">
		@include('user.blocks.header')
	</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
	
	<script>
		$('.toggle').click(function(){
		  // Switches the Icon
		  $(this).children('i').toggleClass('fa-pencil');
		  // Switches the forms  
		  $('.form').animate({
			height: "toggle",
			'padding-top': 'toggle',
			'padding-bottom': 'toggle',
			opacity: "toggle"
		  }, "slow");
		});
	</script>
<!-- //bootstrap-pop-up -->
<!-- nav -->
	<div class="movies_nav">
		<div class="container">
			<nav class="navbar navbar-default">
				@include('user.blocks.nav')
			</nav>	
		</div>
	</div>
<!-- //nav -->
<!-- banner -->
	<div id="slidey" style="display:none;">
		@include('user.blocks.slider')	
    </div>
    <script src="{!!asset('user/js/jquery.slidey.js')!!}"></script>
    <script src="{!!asset('user/js/jquery.dotdotdot.min.js')!!}"></script>
	   <script type="text/javascript">
			$("#slidey").slidey({
				interval: 8000,
				listCount: 5,
				autoplay: false,
				showList: true
			});
			$(".slidey-list-description").dotdotdot();
		</script>
<!-- //banner -->
<!-- banner-bottom -->
	@yield('contents')
	
<!-- //Latest-tv-series -->
<!-- footer -->
	@include('user.blocks.footer')
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
	@include('user.dashboard.tempjs')
<!-- //here ends scrolling icon -->
</body>
</html>