<footer>
    <div class="footer">
    <ul>
        <li>© 2018 WebTeach</li>
        <li><a href="/about">О нас</a></li>
        <li><a href="/contact">Контакты</a></li>
    </ul>
    </div>
</footer>
</body>
<script src="/templates/js/start.js"></script>
<script src="/templates/js/sendOnServer.js"></script>
<script>
    $(document).ready(function () {
        $('.password_recovery').click(function () {
            $('.form p').html('Введите E-mail для отправки пароля на почту');
            $('.password').css('display','none');
            $('.button').css('display','none');
            $('#button').css('display','block');
            $('.password_recovery').css('display','none');
        });
        $('#button').click(function () {
            var form_data = $('.form').serialize();
            $.ajax({
                type: "POST",
                url: "/user/recovery/",
                data: form_data,
                success: function() {
                    alert("Ваше сообщение отпрвлено!");
                } // забыли закрыть success
            });
            return false;
        });

    })
</script>

