<div class="navbar-header navbar-left">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
</div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
	<nav>
		<ul class="nav navbar-nav">
			<!-- start category -->
			<li class="active"><a href="{!! url('/')!!}">Home</a></li>
			<?php $menu = DB::table('tb_category')->where('parent_id',0)->get();?>
			@foreach($menu as $item)
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{!! $item->name !!}
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu multi-column columns-3">
						<li>
							<?php 
								$menu_lv2 = DB::table('tb_category')->where('parent_id',$item->id)->get();
							?>
							@foreach($menu_lv2 as $item_lv2)
							<div class="col-sm-6">
								<ul class="multi-column-dropdown">
									<li>
										<a href="{!!url('genres',[$item_lv2->id,$item_lv2->name_seo])!!}">{!!$item_lv2->name!!}
										</a>
									</li>
								</ul>
							</div>
							@endforeach
							<div class="clearfix"></div>
						</li>
					</ul>
				</li>
			@endforeach
			<!-- end category -->
			<!-- start country -->
			<?php $menu = DB::table('tb_country')->where('parent_id',0)->get();?>
			@foreach($menu as $item)
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{!! $item->name !!}
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu multi-column columns-3">
						<li>
							<?php 
								$menu_lv2 = DB::table('tb_country')->where('parent_id',$item->id)->get();
							?>
							@foreach($menu_lv2 as $item_lv2)
							<div class="col-sm-6">
								<ul class="multi-column-dropdown">
									<li>
										<a href="{!!url('country',[$item_lv2->id,$item_lv2->name_seo])!!}">{!!$item_lv2->name!!}
										</a>
									</li>
								</ul>
							</div>
							@endforeach
							<div class="clearfix"></div>
						</li>
					</ul>
				</li>
			@endforeach
			<!-- end country -->
			<!-- start news -->
			<li><a href="{!! route('user.news.getList')!!}">news</a></li>
			<!-- end news -->
			<!-- start list -->
			<li><a href="{!! route('user.listaz.getList')!!}">A - z list</a></li>
			<!-- end list -->
			<!-- start request -->
			<li><a href="{!! route('user.request.getRequest')!!}">Request</a></li>
			<!-- end request -->
		</ul>
	</nav>
</div>