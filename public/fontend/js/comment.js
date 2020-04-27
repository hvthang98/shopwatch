$(document).ready(function () {
    $(".detail-comment").hide();
    $('.reply').click(function () {
        $(this).children(".detail-comment").show();
    });
    //comment
    $("#submit-commnent").click(function () {
        submitComment();
    });
    $("#input-comment").keypress(function (key) {
        if (key.keyCode == 13) {
            submitComment();
        }
    });
    //reply comment
    $(".detail-comment input").keypress(function (key) {
        if (key.keyCode == 13) {
            submitReplyComment($(this));
        }
    });
    $(".detail-comment button").click(function () {
        let inputRequest = $(this).parents().children("input");
        submitReplyComment(inputRequest);
    })
});

function submitReplyComment(selectorInput) {
    var replycontent = selectorInput.val();
    var idComment = selectorInput.attr('id-comment');
    var idUser = selectorInput.attr('id-user');
    var url = "http://localhost:8080/shopwatch/ajax/comment/addreply";
    $.get(url, {
        comment_id: idComment,
        users_id: idUser,
        content: replycontent
    }, function (data) {
        var idreply = "#reply" + idComment;
        $(idreply).append(data);
    });
    selectorInput.val("");
}

function submitComment() {
    var value = $("#input-comment").val();
    var id = $("#input-comment").attr("id-user");
    var idProduct = $("#input-comment").attr("id-product");
    var url = "http://localhost:8080/shopwatch/ajax/comment/add";
    $.get(url, {
        users_id: id,
        content: value,
        products_id: idProduct
    }, function (data) {
        $(".comment-main").append(data);
    });
    $("#input-comment").val("");
}
