/**
 * Created by hao on 16-10-4.
 */
$(document).ready(function () {
    $(".search-icon").click(function () {
        $(".search-bar").slideToggle();
        $(".search-bar input")[0].focus();
    });
    $("header").css(
        "color","#FFFE59"
    );
});