<htmL>
<meta charset="UTF8">
<title>WebTeach</title>
<header>
    <head>
       <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <link rel="stylesheet" href="start.css" type="text/css">
    </head>
</header>
<body>
    <button class="but">saas</button>
<?php include_once 'html/header.php'   ?>
<div class="validate">
        <form  class="form" name = "validation">
            <input type="text" placeholder="username" class="username" name = "user">
            <input type="password" placeholder="password" class="password" name = "pass">
            <input type="submit" value="start" class="button" name = "button">
        </form>
</div>
<?php include_once 'html/footer.php' ?>
<script src="js/start.js"></script>
</body>
</htmL>
