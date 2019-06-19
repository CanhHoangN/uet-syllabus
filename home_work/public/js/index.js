$(document).ready(function () {

    $(".click-outcome").click(function () {
        $(".text-box").toggleClass("text-box-click");
        $(".before-click-outcome").toggleClass("after-click");
        $(".out-text").toggleClass('outcome-textarea');
    });
    $(".click-teaching").click(function () {
        $(".text-box").toggleClass("text-box-click2");
        $(".before-click-teaching").toggleClass("after-click");
        $(".teach-text").toggleClass('teach-textarea');
    });
});
