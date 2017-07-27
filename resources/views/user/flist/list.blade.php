@extends('user.master')
@section('contents')	
@include('user.blocks.social')
<!-- faq-banner -->
	<div class="faq">
		<h4 class="latest-text w3_faq_latest_text w3_latest_text">Movies List</h4>
		<div class="container">
			<div class="agileits-news-top">
				<ol class="breadcrumb">
				  <li><a href="{!! url('/')!!}">Home</a></li>
				  <li class="active">List</li>
				</ol>
			</div>
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">0 - 9</a></li>
					<li role="presentation"><a href="#a" role="tab" id="a-tab" data-toggle="tab" aria-controls="a">A</a></li>
					<li role="presentation"><a href="#b" role="tab" id="b-tab" data-toggle="tab" aria-controls="b">B</a></li>
					<li role="presentation"><a href="#c" role="tab" id="c-tab" data-toggle="tab" aria-controls="c">C</a></li>
					<li role="presentation"><a href="#d" role="tab" id="d-tab" data-toggle="tab" aria-controls="d">D</a></li>
					<li role="presentation"><a href="#e" role="tab" id="e-tab" data-toggle="tab" aria-controls="e">E</a></li>
					<li role="presentation"><a href="#f" role="tab" id="f-tab" data-toggle="tab" aria-controls="f">F</a></li>
					<li role="presentation"><a href="#g" role="tab" id="g-tab" data-toggle="tab" aria-controls="g">G</a></li>
					<li role="presentation"><a href="#h" role="tab" id="h-tab" data-toggle="tab" aria-controls="h">H</a></li>
					<li role="presentation"><a href="#i" role="tab" id="i-tab" data-toggle="tab" aria-controls="i">I</a></li>
					<li role="presentation"><a href="#j" role="tab" id="j-tab" data-toggle="tab" aria-controls="j">J</a></li>
					<li role="presentation"><a href="#k" role="tab" id="k-tab" data-toggle="tab" aria-controls="k">K</a></li>
					<li role="presentation"><a href="#l" role="tab" id="l-tab" data-toggle="tab" aria-controls="l">L</a></li>
					<li role="presentation"><a href="#m" role="tab" id="m-tab" data-toggle="tab" aria-controls="m">M</a></li>
					<li role="presentation"><a href="#n" role="tab" id="n-tab" data-toggle="tab" aria-controls="n">N</a></li>
					<li role="presentation"><a href="#o" role="tab" id="o-tab" data-toggle="tab" aria-controls="o">O</a></li>
					<li role="presentation"><a href="#p" role="tab" id="p-tab" data-toggle="tab" aria-controls="p">P</a></li>
					<li role="presentation"><a href="#q" role="tab" id="q-tab" data-toggle="tab" aria-controls="q">Q</a></li>
					<li role="presentation"><a href="#r" role="tab" id="r-tab" data-toggle="tab" aria-controls="r">R</a></li>
					<li role="presentation"><a href="#s" role="tab" id="s-tab" data-toggle="tab" aria-controls="s">S</a></li>
					<li role="presentation"><a href="#t" role="tab" id="t-tab" data-toggle="tab" aria-controls="t">T</a></li>
					<li role="presentation"><a href="#u" role="tab" id="u-tab" data-toggle="tab" aria-controls="u">U</a></li>
					<li role="presentation"><a href="#v" role="tab" id="v-tab" data-toggle="tab" aria-controls="v">V</a></li>
					<li role="presentation"><a href="#w" role="tab" id="w-tab" data-toggle="tab" aria-controls="w">W</a></li>
					<li role="presentation"><a href="#x" role="tab" id="x-tab" data-toggle="tab" aria-controls="x">X</a></li>
					<li role="presentation"><a href="#y" role="tab" id="y-tab" data-toggle="tab" aria-controls="y">Y</a></li>
					<li role="presentation"><a href="#z" role="tab" id="z-tab" data-toggle="tab" aria-controls="z">Z</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<!-- start 0-9 -->
					<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>25</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($full0_9 as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif</td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
						                </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $full0_9->links() }}
						</div>
					</div>
					<!-- start a -->
					<div role="tabpanel" class="tab-pane fade" id="a" aria-labelledby="a-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_a as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
										</td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_a->links() }}
						</div>
					</div>
					<!-- start b -->
					<div role="tabpanel" class="tab-pane fade" id="b" aria-labelledby="b-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_b as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
						                </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_b->links() }}
						</div>
					</div>
					<!-- start c -->
					<div role="tabpanel" class="tab-pane fade" id="c" aria-labelledby="c-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_c as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
						                </td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
						                </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_c->links() }}
						</div>
					</div>
					<!-- start d -->
					<div role="tabpanel" class="tab-pane fade" id="d" aria-labelledby="d-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_d as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_d->links() }}
						</div>
					</div>
					<!-- start e -->
					<div role="tabpanel" class="tab-pane fade" id="e" aria-labelledby="e-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_e as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_e->links() }}
						</div>
					</div>
					<!-- start f -->
					<div role="tabpanel" class="tab-pane fade" id="f" aria-labelledby="f-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_f as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_f->links() }}
						</div>
					</div>
					<!-- start g -->
					<div role="tabpanel" class="tab-pane fade" id="g" aria-labelledby="g-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_g as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_g->links() }}
						</div>
					</div>
					<!-- start h -->
					<div role="tabpanel" class="tab-pane fade" id="h" aria-labelledby="h-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_h as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_h->links() }}
						</div>
					</div>
					<!-- start i -->
					<div role="tabpanel" class="tab-pane fade" id="i" aria-labelledby="i-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_i as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_i->links() }}
						</div>
					</div>
					<!-- start j -->
					<div role="tabpanel" class="tab-pane fade" id="j" aria-labelledby="j-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_j as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_j->links() }}
						</div>
					</div>
					<!-- start k -->
					<div role="tabpanel" class="tab-pane fade" id="k" aria-labelledby="k-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_k as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a>
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_k->links() }}
						</div>
					</div>
					<!-- start l -->
					<div role="tabpanel" class="tab-pane fade" id="l" aria-labelledby="l-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_l as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
										</td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_l->links() }}
						</div>
					</div>
					<!-- start m -->
					<div role="tabpanel" class="tab-pane fade" id="m" aria-labelledby="m-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_m as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
										</td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
										</td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
						</div>
						{{ $first_m->links() }}
					</div>
					<!-- start n -->
					<div role="tabpanel" class="tab-pane fade" id="n" aria-labelledby="n-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_n as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif</td>
										<td class="w3-list-info">
											<a  >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_n->links() }}
						</div>
					</div>
					<!-- start o -->
					<div role="tabpanel" class="tab-pane fade" id="o" aria-labelledby="o-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_o as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a  >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_o->links() }}
						</div>
					</div>
					<!-- start p -->
					<div role="tabpanel" class="tab-pane fade" id="p" aria-labelledby="p-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_p as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a  >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_p->links() }}
						</div>
					</div>
					<!-- start q -->
					<div role="tabpanel" class="tab-pane fade" id="q" aria-labelledby="q-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_q as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a  >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_q->links() }}
						</div>
					</div>
					<!-- start r -->
					<div role="tabpanel" class="tab-pane fade" id="r" aria-labelledby="r-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_r as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a  >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_r->links() }}
						</div>
					</div>
					<!-- start s -->
					<div role="tabpanel" class="tab-pane fade" id="s" aria-labelledby="s-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_s as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a>
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
						                </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_s->links() }}
						</div>
					</div>
					<!-- start t -->
					<div role="tabpanel" class="tab-pane fade" id="t" aria-labelledby="t-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_t as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a  >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_t->links() }}
						</div>
					</div>
					<!-- start u -->
					<div role="tabpanel" class="tab-pane fade" id="u" aria-labelledby="u-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_u as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a  >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_u->links() }}
						</div>
					</div>
					<!-- start v -->
					<div role="tabpanel" class="tab-pane fade" id="v" aria-labelledby="v-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_v as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a  >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_v->links() }}
						</div>
					</div>
					<!-- start w -->
					<div role="tabpanel" class="tab-pane fade" id="w" aria-labelledby="w-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_w as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a  >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_w->links() }}
						</div>
					</div>
					<!-- start x -->
					<div role="tabpanel" class="tab-pane fade" id="x" aria-labelledby="x-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_x as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a  >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_x->links() }}
						</div>
					</div>
					<!-- start y -->
					<div role="tabpanel" class="tab-pane fade" id="y" aria-labelledby="y-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_y as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a  >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
						                </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_y->links() }}
						</div>
					</div>
					<!-- start z-->
					<div role="tabpanel" class="tab-pane fade" id="z" aria-labelledby="z-tab">
						<div class="agile-news-table">
							<div class="w3ls-news-result">
								<h4>Search Results : <span>17</span></h4>
							</div>
							<table id="table-breakpoint">
								<thead>
								  	<tr>
										<th>No.</th>
										<th>Movie Name</th>
										<th>Status</th>
										<th>Country</th>
										<th>Genre</th>
										<th>Actor</th>
								  	</tr>
								</thead>
								<tbody>
									<?php $stt = 0 ?>
					              	@foreach($first_z as $items)
					              	<?php $stt = $stt+1?>
								 	<tr>
										<td>{!!$stt!!}</td>
										<td class="w3-list-img">
											<a >
												<img src="{!! asset('upload/movies/'.$items->thumb)!!}" alt="" /> 
												<span>{!! $items->title!!}</span>
											</a>
										</td>
										<td>
											@if($items->quality == 1)
						                      1080 HD
						                    @elseif($items->quality == 2)
						                      720 HD
						                    @elseif($items->quality == 3)
						                      HD RIP
						                    @else
						                      SD
						                    @endif
					                    </td>
										<td class="w3-list-info">
											<a  >
												<?php $country = DB::table('tb_country')->where('id',$items->country_id)->first();?>
							                    @if(!empty($country->name))
							                      {!! $country->name!!}
							                    @endif
						                    </a>
										</td>
										<td class="w3-list-info">
											<a>
												<?php $cate = DB::table('tb_category')->where('id',$items->category_id)->first();?>
							                    @if(!empty($cate->name))
							                      {!! $cate->name!!}
							                    @endif
											</a>
										</td>
										<td>
											<?php $actor = DB::table('tb_actor')->where('id',$items->actor_id)->first();?>
						                    @if(!empty($actor->name))
						                      {!! $actor->name!!}
						                    @endif
					                    </td>
								  	</tr>
								  	@endforeach
								</tbody>
							</table>
							{{ $first_z->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //faq-banner -->
@endsection