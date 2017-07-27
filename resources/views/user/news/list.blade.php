@extends('user.master')
@section('contents')	
<!-- faq-banner -->
	@include('user.blocks.social')
	<div class="faq">
			<div class="container">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					  <li><a href="{!! url('/')!!}">Home</a></li>
					  <li class="active">News</li>
					</ol>
				</div>
				<div class="agileinfo-news-top-grids">
					<div class="col-md-8 wthree-top-news-left">
						<div class="wthree-news-left">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#home1" id="home1-tab" role="tab" data-toggle="tab" aria-controls="home1" aria-expanded="true"> All News</a></li>
									<li role="presentation"><a href="#w3bsd" role="tab" id="w3bsd-tab" data-toggle="tab" aria-controls="w3bsd">Latest News</a></li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home1" aria-labelledby="home1-tab">
										@foreach($panews as $items)
										<div class="wthree-news-top-left">
											<div class="col-md-12 w3-agileits-news-left">
												<div class="col-sm-5 wthree-news-img">
													<a href="{!!url('detail-news',[$items->id,$items->title])!!}"><img src="{!! asset('upload/news/'.$items->thumb)!!}" alt="" /></a>
												</div>
												<div class="col-sm-7 wthree-news-info">
													<h5><a href="{!!url('detail-news',[$items->id,$items->title])!!}">{!! $items->title!!}</a></h5>
													<p>{!! $items->shortly!!}</p>
													<ul>
														<li><i class="fa fa-pencil" aria-hidden="true"></i>{!! $items->writer!!}</li>
														<li><i class="fa fa-clock-o" aria-hidden="true"></i>{!! $items->created_at!!}</li> &nbsp;
														<li><i class="fa fa-eye" aria-hidden="true"></i>
														{!! $items->viewed!!}</li>
													</ul>
												</div>
												<div class="clearfix"> </div>
											</div>
											<div class="clearfix"> </div>
										</div>
										@endforeach
										{{ $panews->links() }}
									</div>
									<div role="tabpanel" class="tab-pane fade" id="w3bsd" aria-labelledby="w3bsd-tab">
										@foreach($news as $item)
										<div class="wthree-news-top-left">
											<div class="col-md-12 w3-agileits-news-left">
												<div class="col-sm-5 wthree-news-img">
													<a href="{!!url('detail-news',[$item->id,$item->title])!!}"><img src="{!! asset('upload/news/'.$item->thumb)!!}" alt="" /></a>
												</div>
												<div class="col-sm-7 wthree-news-info">
													<h5><a href="{!!url('detail-news',[$item->id,$item->title])!!}">{!!$item->title!!}</a></h5>
													<p>{!!$item->shortly!!}</p>
													<ul>
														<li><i class="fa fa-pencil" aria-hidden="true"></i> {!! $item->writer!!}</li>
														<li><i class="fa fa-clock-o" aria-hidden="true"></i>{!! $item->created_at!!}</li> &nbsp;
														<li><i class="fa fa-eye" aria-hidden="true"></i> 2642</li>
													</ul>
												</div>
												<div class="clearfix"> </div>
											</div>
											<div class="clearfix"> </div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
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
	</div>
<!-- //faq-banner -->
@endsection