var file_data;
var form_data;
$('.button_task').on('click', function() {
    event.stopPropagation();
    event.preventDefault();
     file_data = $('#task_file').prop('files')[0];
    if( typeof file_data === 'undefined' ) return;
    form_data = new FormData();
    form_data.append('file', file_data);
    alert(form_data);
    $.ajax({
        url: '/task/send',
    dataType: 'text',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    type: 'post',
    success: function(respond, status, jqXHR){
        if( typeof respond.error === 'undefined' ) {
            alert('Файл отправлен');
        }
        else{
            console.log('ОШИБКА: ' + respond.error );
        }
    }
});
});

