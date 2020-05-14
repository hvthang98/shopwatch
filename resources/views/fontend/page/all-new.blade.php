@extends('fontend.master.master')
@section('content')
<div class="tintuc">
	<div class="tintuc1"><p>Tin Tức</p></div>
	<div class="loctin">
		<form method="get" action="">
			<label>Sắp xếp</label>
			<select name="sort" onchange="javascript:this.form.submit()">
				<option> 
			Mặc định </option>
			<option >
		Tên giảm dần </option>
		<option value="price_asc">
	Tin mới nhất </option>
	<option value="price_desc" >
Giá giảm dần </option>
</select>
</form>
	</div>
	<div class="tintuc2">
		
		@foreach($news as $new)
		<div class="tin">
			<div class="chua" style="position: relative;">
				<img width ="363" height= "250"   src="../upload/images/{{$new->image}}">
			<div class="nd"><p>{{$new->title}}</p><a href="{{route('detail-new',['id'=>$new->id])}}">Xem thêm</a></div>
			</div>
		</div>	
		@endforeach
	</div>
	{{$news->links()}}
</div>
@endsection