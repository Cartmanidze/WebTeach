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

    // if($(''.pagination li:last-child).attr('class')==='active')
    // {
    //     $('.button_test').css('display','block');
    // }


    $('.button-large').click(clickPrev);

    function clickPrev(){
        alert(1);
        $('.pagination li:last-child a, .pagination li:last-child span').trigger('click');
    };


});



