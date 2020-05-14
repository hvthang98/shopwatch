@extends('fontend.master.master')
@section('content')
@foreach($detailnew as $det)
<div class="ct-tin">
	<h1>{{$det->title}}</h1>
	{!!$det->content!!}
</div>
@endforeach
@endsection