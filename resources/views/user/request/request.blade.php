@extends('user.master')
@section('contents')	
<!-- faq-banner -->
	@include('user.blocks.social')
	<!-- contact -->
	<div class="contact-agile">
		<div class="faq">
			<h4 class="latest-text w3_latest_text">Contact Us</h4>

			<div class="container">
			 	@include('admin.blocks.error')
			 	@include('admin.blocks.message')
				<div class="clearfix"></div>
				<form method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="text" name="name" placeholder="Full NAME" ></br>
					<input type="text" name="email" placeholder="EMAIL" ></br>
					<input type="text" name="subject" placeholder="SUBJECT" >
					<textarea  name="message" placeholder="YOUR MESSAGE"></textarea>
					<input type="submit" value="SEND MESSAGE">
				</form>
			</div>
		</div>
	</div>
<!-- //contact -->
<!-- //faq-banner -->
@endsection