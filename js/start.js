$(document).ready(function () {
    $('.form').on({
        mouseenter: function () {
            $('.button').css('background','indianred');
            $('.button').css('transition','1s');
        }
    }, '.button');

    $('.form').on({
        mouseleave: function () {
            $('.button').css('background','lightgrey');
            $('.button').css('transition','1s');
        }
    }, '.button')

    $('.form').on({
        click: function () {
            $('.username').css('border-bottom','3px groove red');
            $('.username').css('transition','1s');
        }
    }, '.username');

    $('.form').on({
        click: function () {
            $('.password').css('border-bottom','3px groove red');
            $('.password').css('transition','1s');
        }
    }, '.password');

});



