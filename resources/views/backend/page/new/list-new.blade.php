@extends('backend.master.admin_master')
@section('main-content')
<div class="table-agile-info">
  <div class="panel panel-default">
<div class="panel-heading">
     Danh mục tin tức
    </div>
<table class="table table-striped b-t b-light">
	
	<tr>
		<th style="text-align: center;">STT</th>
		<th style="text-align: center;">Tiêu đề tin</th>
		<th style="text-align: center;">Nội dung</th>
		<th style="text-align: center;">Hình Ảnh</th>
		<th style="text-align: center;">Trạng thái</th>
	</tr>
	
	@foreach($news as $new)
	<tr>
	<td>{{$new->id}}</td>
	<td>{{$new->title}}</td>
	<td>{{$new->content}}</td>
	<td><img src="../upload/images/{{$new->image}}" width="100" height="100"></td>
	<td style="text-align: center;">
		@if($new->status==0)
			<a href="{{route('active',['id'=>$new->id])}}">Ẩn</a>	
		@elseif($new->status==1)
			<a href="{{route('un-active',['id'=>$new->id])}}">Hiện</a>
		@endif
	</td>
	
	<td>
		<a href="{{route('edit',['id'=>$new->id])}}"><i
                                style="font-size: 20px" class="fa fa-pencil text-success text-active"></i></a>
		<a href="{{route('delete',['id'=>$new->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?');"><i class="fa fa-trash-o"
                                style="font-size:24px"></i></a>
	</td>
	</tr>
	@endforeach
	
</table>
{{$news->links()}}
</div>
</div>

@endsection
@section('js')
@if(session()->has('notification'))
    @include('notify.note')
@endif
@endsection