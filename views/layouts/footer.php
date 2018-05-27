<footer>
    <div class="footer">
    <div class="foot">
    </div>
    <ul>
        <li>© 2018 WebTeach</li>
        <li><a href="/about">О нас</a></li>
        <li><a href="/contact">Контакты</a></li>
    </ul>
    </div>
</footer>
</body>
<script src="/templates/js/start.js"></script>
<script>
    $(document).ready(function () {
        $('.password_recovery').click(function () {
            $('.form p').html('Введите E-mail для отправки пароля на почту');
            $('.password').css('display','none');
            $('.button').css('display','none');
            $('#button').css('display','block');
        });
        $('#button').click(function () {
            $.post('/user/recovery/',{},function () {
                alert('Письмо отправлено');
                return true;
            });
            return false;
        });

    })
</script>

