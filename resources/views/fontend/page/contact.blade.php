@extends('fontend.master.master')
@section('title')
	Liên hệ
@endsection
@section('content')
<script type="text/javascript" src="js/contact.js"></script>
<div class="contact">
	<div class="titlecontact"><h1>Liên hệ</h1></div>
	<div class="contact1">

		<iframe width="490" height="590"
		src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15676.345735751129!2d106.7169677!3d10.8046919!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7a7006b269783a40!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBHaWFvIHRow7RuZyBW4bqtbiB04bqjaSBUUC5IQ00!5e0!3m2!1svi!2s!4v1589095980557!5m2!1svi!2s"
		width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
		aria-hidden="false" tabindex="0">
	</iframe>
</div>
<div class="contact2">
	<h3 style="text-align: center; font-weight: bold"><i style="font-size:24px" class="fa">&#xf006;</i> HÃY LIÊN LẠC VỚI CHÚNG TÔI ?</h3>
	<form name="" action="{{route('post-contact')}}" method="post">
		@csrf
		
			<i class="fa fa-user" aria-hidden="true"></i>
			<label >Họ và tên</label >
			<input type="text" name="name" class="field form-control" placeholder="Nhập họ và tên" required="required" @if(Auth::check()) value="{{Auth::user()->name}}" @endif>
			<i class="fa fa-envelope" aria-hidden="true"></i>
			<label>Email</label>
			<input type="email" name="email" class="field form-control" placeholder="Nhập Email" required="required" @if(Auth::check()) value="{{Auth::user()->email}}" @endif>
			<i class="fa fa-phone" aria-hidden="true"></i>
			<label>Số điện thoại</label>
			<input type="text" name="phone" class="field form-control" placeholder="Nhập số điện thoại" required="required" @if(Auth::check()) value="{{Auth::user()->phone_number}}" @endif>
			
			<i class="fa fa-commenting-o" aria-hidden="true"></i>
			<label>Lời nhắn</label>
			<textarea class="field form-control mes" name="message" placeholder="Lời nhắn" required="required" cols="20" rows="5"></textarea>
			<div class="mt-3 text-center">
				<input type="submit" class="form-control btn btn-primary text-center" name="Gui">
			</div>		
					
	</form>
				
</div>
</div>
@endsection

