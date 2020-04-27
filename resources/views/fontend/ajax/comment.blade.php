<!-- comment new-->
<div class="media">
    <div class="media-left">
        <img src="{{ asset('public/upload/avatar_user/default-avatar.png') }}"
            class="media-object" style="width:65px">
    </div>
    <div class="media-body">
        <h4 class="media-heading">{{ $comment->users->email }}<small>&emsp;<i>Posted on
                    February 19, 2016</i></small>
        </h4>
        <p>{{ $comment->content }}</p>
        <div class="reply">Trả lời<small>&emsp;</small>
            <div class="detail-comment" style="display: none">
                <div class="form-group">
                    <br>
                    <input type="text" class="form-control" id-comment="{{ $comment->id }}" id-user="2" placeholder="Trả lời"><br>
                    <button type="button" class="btn btn-info">Gửi</button>
                </div>
                <div class="detail-comment-content" id="reply{{ $comment->id}}">
                    @foreach($comment->replyComment as $reply)
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.reply').click(function () {
        $(this).children(".detail-comment").show();
    });
    $(".detail-comment input").keypress(function (key) {
        if (key.keyCode == 13) {
            submitReplyComment($(this));
        }
    });
    $(".detail-comment button").click(function () {
        let inputRequest = $(this).parents().children("input");
        submitReplyComment(inputRequest);
    })

</script>
