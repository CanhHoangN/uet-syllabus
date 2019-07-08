$(document).ready(function () {

    $(".click-outcome").click(function () {
        $(".text-box").toggleClass("text-box-1");
        $(".out-text").toggleClass('show-out-text');
    });
    $(".click-teaching").click(function () {
        $(".text-box").toggleClass("text-box-2");
        $(".teach-text").toggleClass("show-teaching");
    });
});