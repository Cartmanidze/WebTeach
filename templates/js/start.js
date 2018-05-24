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
    }, '.button');


    $('.form').on('keyup', function(){
        $('.username').css('border-bottom','2px groove black');
    });

    $('.form').on('keyup', function(){
        $('.password').css('border-bottom','2px groove black');
    });

    $('.form').on({
        blur: function () {
            if($('.username').val()!=='')
            {
                console.log('поле заполнено');
            }
            else
            {
                console.log('Поле неполнено');
            }

        }
    }, '.username');


    $(".check").change(function() {
        if(this.checked) {
            $('.button_test').css('display','block');
        }
    })



});



