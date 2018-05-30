<?php include_once ROOT.'\views\layouts\header.php'   ?>
<section>
<div class="validate">
    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error):?>
                <li>
                    <?php echo $error;?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class ="form-validate">
        <form class="form"  method="post" action=""  name = "validation">
            <p></p>
            <input type="email" placeholder="E-Mail" class="username" name = "email">
            <input type="password" placeholder="Пароль" class="password" name = "password">
            <input type="submit" value="Вход" class="button" name = "button">
            <input type="submit" value="Отправить" class="button"  name = "submit" id="button" style="display: none">
            <a href="#" class="password_recovery">Забыли пароль?</a>
        </form>

</div>
</div>

</section>
<script src="/templates/js/start.js"></script>
<?php include_once ROOT.'\views\layouts\footer.php' ?>




