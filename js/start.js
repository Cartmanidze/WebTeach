$(document).ready(function () {
    $('.form').on({
        mouseenter: function () {
            $('.button').css('background','red');
            $('.button').css('transition','1s');
        }
    }, '.button');

    $('.form').on({
        mouseleave: function () {
            $('.button').css('background','darkgrey');
            $('.button').css('transition','1s');
        }
    }, '.button')

});



