@extends('user.master')
@section('contents')	
	@include('user.blocks.social')
	<!-- /w3l-medile-movies-grids -->
	<div class="general-agileits-w3l">
		<div class="w3l-medile-movies-grids">
			<!-- /movie-browse-agile -->
		    <div class="movie-browse-agile">
			    <!--/browse-agile-w3ls -->
				<div class="browse-agile-w3ls general-w3ls">
					<div class="tittle-head">
						<h4 class="latest-text">
							{!!$country["name"]!!} movies
						</h4>
						<div class="container">
							<div class="agileits-single-top">
								<ol class="breadcrumb">
								  <li><a href="{!! url('/')!!}">Home</a></li>
								  <li class="active">
								  	{!!$country["name"]!!}
								  </li>
								</ol>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="browse-inner">
							@foreach($genres as $items)
						   	<div class="col-md-2 w3l-movie-gride-agile">
								<a href="{!! url('detail-movies',[$items->id,$items->title_seo])!!}" class="hvr-shutter-out-horizontal">
									<img class="myimg" src="{!! asset('upload/movies/'.$items->thumb)!!}" title="album-name" alt=" " />
								    <div class="w3l-action-icon">
								    	<i class="fa fa-play-circle" aria-hidden="true"></i>
								    </div>
								</a>
								<div class="mid-1">
									<div class="w3l-movie-text">
										<h6><a href="{!! url('detail-movies',[$items->id,$items->title_seo])!!}">{!! $items->title!!}</a></h6>	
									</div>
									<div class="mid-2">
										<p>
											<?php $country = DB::table('tb_category')->where('id',$items->category_id)->first();?>
						                    @if(!empty($country->name))
						                      {!! $country->name!!}
						                    @endif
						                </p>
										<div class="block-stars">
											<ul class="w3l-ratings">
												<li>
													<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
												</li>
												<li>
													<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
												</li>
												<li>
													<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
												</li>
												<li>
													<a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
												</li>
												<li>
													<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
												</li>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
						 	    <div class="ribben two">
									<p>
										@if($items->quality == 1)
					                      1080
					                    @elseif($items->quality == 2)
					                      720
					                    @elseif($items->quality == 3)
					                      HD RIP
					                    @else
					                      SD
					                    @endif
									</p>
								</div>
							</div>
							@endforeach
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				
				<!--//browse-agile-w3ls -->
				<div class="blog-pagenat-wthree">
					<ul>
						<li><a class="frist" href="#">Prev</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a class="last" href="#">Next</a></li>
					</ul>
				</div>
			</div>
		    <!-- //movie-browse-agile -->
			<!--body wrapper start-->
			<div class="review-slider">
				<h4 class="latest-text">Same moviews</h4>
				<div class="container">
				 	<div class="w3_agile_banner_bottom_grid">
						<div id="owl-demo" class="owl-carousel owl-theme">
							<div class="item">
								<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
									<a href="single.html" class="hvr-shutter-out-horizontal">
										<img src="images/m13.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Citizen Soldier</a></h6>							
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
									<a href="single.html" class="hvr-shutter-out-horizontal">
										<img src="images/m11.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">X-Men</a></h6>							
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
									<a href="single.html" class="hvr-shutter-out-horizontal">
										<img src="images/m12.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Greater</a></h6>							
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
									<a href="single.html" class="hvr-shutter-out-horizontal">
									<img src="images/m7.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Light B/t Oceans</a></h6>							
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
									<a href="single.html" class="hvr-shutter-out-horizontal">
										<img src="images/m8.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">The BFG</a></h6>							
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
									<a href="single.html" class="hvr-shutter-out-horizontal">
										<img src="images/m9.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Central Intelligence</a></h6>							
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
									<a href="single.html" class="hvr-shutter-out-horizontal">
										<img src="images/m10.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Don't Think Twice</a></h6>							
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
									<a href="single.html" class="hvr-shutter-out-horizontal">
										<img src="images/m17.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Peter</a></h6>							
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
									<a href="single.html" class="hvr-shutter-out-horizontal">
										<img src="images/m15.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">God’s Compass</a></h6>							
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
							</div>
						</div>
					</div>
							<!--body wrapper end-->
				</div>	
			</div>
		</div>
	</div>
	<!-- //w3l-medile-movies-grids -->
@endsection