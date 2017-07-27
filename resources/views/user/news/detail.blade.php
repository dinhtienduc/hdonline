@extends('user.master')
@section('contents')	
@include('user.blocks.social')
<!-- faq-banner -->
	<div class="faq">
		<div class="container">
			<div class="agileits-news-top">
				<ol class="breadcrumb">
				  <li><a href="{!! url('/')!!}">Home</a></li>
				   <li><a href="{!! url('news')!!}">News</a></li>
				  <li class="active">News Detail</li>
				</ol>
			</div>
			<div class="agileinfo-news-top-grids">
				<div class="col-md-8 wthree-top-news-left">
					<div class="wthree-news-left">
						<div class="wthree-news-left-img">
							<img src="{!! asset('upload/news/'.$news_detail->thumb)!!}" alt="" />
							<h4>{!! $news_detail->title!!}</h4>
							<div class="s-author">
								<p>Posted By <a href="#"><i class="fa fa-user" aria-hidden="true"></i> {!! $news_detail->writer!!}</a> &nbsp;&nbsp; <i class="fa fa-calendar" aria-hidden="true"></i>{!! $news_detail->created_at!!} &nbsp;&nbsp; <a href="#"><i class="fa fa-comments" aria-hidden="true"></i> Comments (10)</a></p>
							</div>
							<div id="fb-root"></div>
							<div class="news-shar-buttons">
								<ul>
									<li>
										<div class="fb-like" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
										<script>(function(d, s, id) {
										  var js, fjs = d.getElementsByTagName(s)[0];
										  if (d.getElementById(id)) return;
										  js = d.createElement(s); js.id = id;
										  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
										  fjs.parentNode.insertBefore(js, fjs);
										}(document, 'script', 'facebook-jssdk'));</script>
									</li>
									<li>
										<div class="fb-share-button" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fw3layouts&amp;src=sdkpreparse">Share</a></div>
									</li>
									<li class="news-twitter">
										<a href="https://twitter.com/w3layouts" class="twitter-follow-button" data-show-count="false">Follow @w3layouts</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
									</li>
									<li>
										<a href="https://twitter.com/intent/tweet?screen_name=w3layouts" class="twitter-mention-button" data-show-count="false">Tweet to @w3layouts</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
									</li>
									<li>
										<!-- Place this tag where you want the +1 button to render. -->
										<div class="g-plusone" data-size="medium"></div>

										<!-- Place this tag after the last +1 button tag. -->
										<script type="text/javascript">
										  (function() {
											var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
											po.src = 'https://apis.google.com/js/platform.js';
											var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
										  })();
										</script>
									</li>
								</ul>
							</div>
							<div class="w3-agile-news-text">
								{!! $news_detail->information!!}
							</div>
						</div>
					</div>
					<div class="wthree-related-news-left">
						<h4>Related News</h4>
						<div class="wthree-news-top-left">
							@foreach($renews as $ren)
							<div class="col-md-12 w3-agileits-news-left">
								<div class="col-sm-5 wthree-news-img">
									<a href="news-single.html"><img src="{!! asset('upload/news/'.$ren->thumb)!!}" alt="" /></a>
								</div>
								<div class="col-sm-7 wthree-news-info">
									<h5><a href="news-single.html">{!! $ren->title!!}</a></h5>
									<p>{!! $ren->shortly!!}</p>
									<ul>
										<li><i class="fa fa-clock-o" aria-hidden="true"></i> {!!$ren->created_at!!}</li>
										<li><i class="fa fa-eye" aria-hidden="true"></i>{!!$ren->viewed!!}</li>
									</ul>
								</div>
								<div class="clearfix"> </div>
							</div>
							@endforeach
							<div class="clearfix"> </div>
						</div>
					</div>
					<!-- agile-comments -->
					<div class="agile-news-comments">
						<div class="agile-news-comments-info">
							<h4>Comments</h4>
							<div class="fb-comments" data-href="https://w3layouts.com/" data-width="100%" data-numposts="5"></div>
						</div>
					</div>
					<!-- //agile-comments -->
					<div class="news-related">
						
					</div>
				</div>
				<div class="col-md-4 wthree-news-right">
					<!-- news-right-top -->
					<div class="news-right-top">
						<div class="wthree-news-right-heading">
							<h3>Updated News</h3>
						</div>
						<div class="wthree-news-right-top">
							<div class="news-grids-bottom">
								<!-- date -->
								<div id="design" class="date">
									<div id="cycler">   
										@foreach($upnews as $up)
										<div class="date-text">
											<a href="{!!url('detail-news',[$up->id,$up->title])!!}">{!!$up->updated_at!!} <span class="blinking"><img src="{!!asset('user/images/new.png')!!}" alt="" /></span></a>
											<p>{!! $up->shortly!!}</p>
										</div>
										@endforeach
									</div>
									<script>
									function blinker() {
										$('.blinking').fadeOut(500);
										$('.blinking').fadeIn(500);
									}
									setInterval(blinker, 1000);
									</script>
									<script>
										function cycle($item, $cycler){
											setTimeout(cycle, 2000, $item.next(), $cycler);
											
											$item.slideUp(1000,function(){
												$item.appendTo($cycler).show();        
											});
											}
										cycle($('#cycler div:first'),  $('#cycler'));
									</script>
								</div>
								<!-- //date -->
							</div>
						</div>
					</div>
					<!-- //news-right-top -->
				</div>
				<div class="clearfix"> </div>
		</div>	
	</div>
<!-- //faq-banner -->
@endsection