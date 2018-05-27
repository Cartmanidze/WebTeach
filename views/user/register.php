<?php include_once ROOT.'\views\layouts\header.php'   ?>
<section>
<?php if($result):?>
    <p> Вы зарегистрированы!</p>
<?php else: ?>
    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error):?>
                <li>
                    <?php echo $error?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="validate">
        <div class ="form-validate">
            <form class="form"  method="post" action=""  name = "validation">
                <input type="text" placeholder="Имя" class="username" name = "name">
                <input type="password" placeholder="Пароль" class="password" name = "password">
                <input type="text" placeholder="Группа" class="group" name = "group">
                <input type="email" placeholder="E-Mail" class="email" name = "email">
                <input type="submit" value="Регистрация" class="button" name = "button" >
            </form>
            <?php endif; ?>
        </div>
    </div>

</section>
<?php include_once ROOT.'\views\layouts\footer.php' ?>