<htmL>
<meta charset="UTF8">
<title>WebTeach</title>
<header>
        <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
        <link rel="stylesheet" href="/templates/css/start.css" type="text/css">

</header>
<div class="header-menu">
    <h2><a href="/">WebTeach</a></h2>
    <?php if(!User::isGuest()):?>
            <ul>
        <li><a href="/course">Курсы</a></li>
        <li><a href="/test">Тесты</a></li>
        <li><a href="/task">Задания</a></li>
    </ul>
    <?php else:?>
        <ul>
            <li><a href="/user/login/">Войти</a></li>
            <li><a href="/user/register">Регистрация</a></li>
        </ul>

    <?php endif;?>
</div>
<body>
