<div class="container">
	<div class="w3layouts_logo">
		<a href="{!!route('index')!!}"><h1>One<span>Movies</span></h1></a>
	</div>
	<div class="w3_search">
		<form action="#" method="post">
			<input type="text" name="Search" placeholder="Search" required="">
			<input type="submit" value="Go">
		</form>
	</div>
	<div class="w3l_sign_in_register">
		<ul>
			@if (Auth::guest())
               <!--  <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li> -->
               <li><a href="{!! url('/login')!!}" >Login</a></li>
               <li><a href="{!! url('/signUp')!!}" >Sign Up</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        {{ Auth::user()->username }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li style="padding-left: 10px">
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                          <i class="fa fa-sign-out" aria-hidden="true"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
		</ul>
	</div>
	<div class="clearfix"> </div>
</div>