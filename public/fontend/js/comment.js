$(document).ready(function () {
    $(".detail-comment").hide();
    $('.reply').click(function () {
        $(this).children(".detail-comment").show();
    });
    //comment
    var check = checkUser();
    $("#submit-commnent").click(function () {
        if (check == "true") {
            submitComment();
        } else {
            alert('Bạn chưa đăng nhập');
        }
    });
    $("#input-comment").keypress(function (key) {
        if (key.keyCode == 13) {
            if (check == "true") {
                submitComment();
            } else {
                alert('Bạn chưa đăng nhập');
            }
        }
    });
    //reply comment
    $(".detail-comment input").keypress(function (key) {
        if (key.keyCode == 13) {
            if (check == "true") {
                submitReplyComment($(this));
            } else {
                alert('Bạn chưa đăng nhập');
            }
        }
    });
    $(".detail-comment button").click(function () {
        let inputRequest = $(this).parents().children("input");
        if (check == "true") {
            submitReplyComment(inputRequest);
        } else {
            alert('Bạn chưa đăng nhập');
        }
    })
});

function submitReplyComment(selectorInput) {
    var replycontent = selectorInput.val();
    var idComment = selectorInput.attr('id-comment');
    var idUser = $("#id-user").attr("id-user");
    var url = location.origin + "/shopwatch/ajax/comment/addreply";
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
    var id = $("#id-user").attr("id-user");
    var idProduct = $("#input-comment").attr("id-product");
    var url = location.origin + "/shopwatch/ajax/comment/add";
    $.get(url, {
        users_id: id,
        content: value,
        products_id: idProduct
    }, function (data) {
        $(".comment-main").append(data);
    });
    $("#input-comment").val("");
}

function checkUser() {
    var id = $("#id-user").attr("id-user");
    if (id == "") {
        return "false";
    }
    return "true";
}
