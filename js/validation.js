$(document).ready(function () {
    $('.form').submit(function () {
        $.ajax({
            type: 'POST',
            url:'../core/dataProcessing.php',
            data:$(this).serializeArray()
        }).done(function (data) {
            console.log(data);
        });
        return false;
    });

});