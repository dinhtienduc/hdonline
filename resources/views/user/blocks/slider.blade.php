<?php 
	$slider= DB::table('tb_news')->select('id','title','information','shortly','thumb')->where('statut','1')
								 ->orderBy('id','DESC')->skip(0)->take(6)->get();
?>
<ul>
	@foreach($slider as $items)
	<li>
		<img src="{!! asset('upload/news/'.$items->thumb)!!}" alt=" ">
		<p class='title'>{!! $items->title !!}</p>
		<p class='description'>{!! $items->	shortly !!}</p>
	</li>
	@endforeach
</ul>   