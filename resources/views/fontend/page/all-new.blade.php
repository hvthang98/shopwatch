@extends('fontend.master.master')
@section('title')
Tin tức
@endsection
@section('content')
<div class="tintuc">
    <div class="tintuc2">
        @foreach($news as $new)
            <div class="tin">
                <div class="chua" style="position: relative;">
                    <img width="363" height="250" src="storage/{{ $new->image }}">
                    <div class="nd">
                        <p>{{ $new->title }}</p><a
                            href="{{ route('detail-new',['id'=>$new->id]) }}">Xem
                            thêm</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <ul class="pagination pagination-sm">
		{{ $news->links() }}
    </ul>
</div>
@endsection
