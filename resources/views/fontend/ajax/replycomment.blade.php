<div class="media">
    <div class="media-left">
        <img src="{{ asset('public/upload/avatar_user/default-avatar.png') }}"
            class="media-object" style="width:55px">
    </div>
    <div class="media-body">
        <h4 class="media-heading">{{ $reply->users->name }}<small>&emsp;<i>{{ date('d-m-Y',strtotime($reply->created_at)) }}</i></small>
            @if (Auth::check() && Auth::user()->id==$reply->users_id)
            <a href="{{ route('deleteReplyComment',$reply->id) }}" onclick="questionLoading('Bạn chắc chắn muốn xóa bình luận')">Xóa</a>                                            
            @endif
        </h4>
        <p>{{ $reply->content }}</p>
    </div>
</div>