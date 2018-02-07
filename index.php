<htmL>
<meta charset="UTF8">
<title>WebTeach</title>
<header>
    <head>
       <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="start.css" type="text/css">
    </head>
</header>
<body>

<?php include_once 'html/header.php'   ?>
<div class="validate">
    <div class ="form-validate">
        <form class="form" action="validate/checkUsers.php" method = "post" name = "validation">
            <input type="text" placeholder="User Name" class="username" name = "user">
            <input type="password" placeholder="Password" class="password" name = "pass">
            <input type="submit" value="start" class="button" name = "button">
        </form>
</div>
</div>

<script src="js/start.js"></script>
<?php include_once 'html/footer.php' ?>
</body>


</htmL>
