@extends('backend.master.admin_master')
@section('main-content')
<div class="table-agile-info">
  <div class="panel panel-default">
<div class="panel-heading">
     Danh mục liên hệ
    </div>
<table class="table table-striped b-t b-light">
	
	<tr>
		<th style="text-align: center;">STT</th>
		<th style="text-align: center;">Tên người liên hệ</th>
		<th style="text-align: center;">Email</th>
		<th style="text-align: center;">Số điện thoại</th>
		<th style="text-align: center;">Lời nhắn</th>
		
	</tr>
	
	@foreach($contact as $cont)
	<tr>
	<td>{{$cont->id}}</td>
	<td>{{$cont->name}}</td>
	<td>{{$cont->email}}</td>
	<td>{{$cont->phone_number}}</td>
	<td>{{$cont->message}}</td>
	
	
	
	<td>
		<a href="{{route('reply-contact')}}">Phản hồi</a>
		<a href="{{route('delete-contact',['id'=>$cont->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?');"><i class="fa fa-trash-o" style="font-size:24px"></i></a>
	</td>
	</tr>
	@endforeach
	
</table>
{{$contact->links()}}
</div>
</div>

@endsection
@section('js')
@if(session()->has('notification'))
    @include('notify.note')
@endif
@endsection