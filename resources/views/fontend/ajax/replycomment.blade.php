<div class="media">
    <div class="media-left">
        <img src="{{ asset('public/upload/avatar_user/default-avatar.png') }}"
            class="media-object" style="width:55px">
    </div>
    <div class="media-body">
        <h4 class="media-heading">{{ $reply->users->email }}<small>&emsp;<i>Posted on February
                    19,
                    2016</i></small></h4>
        <p>{{ $reply->content }}</p>
    </div>
</div>