@extends('fontend.master.master')
@section('content')
@foreach($detailnew as $det)
<div class="ct-tin">
	<div class="ct-tin1"><h1>{{$det->title}}</h1></div>
	<div class="ct-tin2">{!!$det->content!!}</div>
	
</div>
@endforeach
@endsection