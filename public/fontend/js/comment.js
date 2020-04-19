$(document).ready(function () {
    $(".detail-comment").hide();
    $('.reply').click(function () {
        $(this).children(".detail-comment").show();
    });
});