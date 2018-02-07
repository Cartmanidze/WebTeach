<!doctype html>
<htmL>
<meta charset="UTF8">
<title>WebTeach</title>
<header>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.js" type="text/javascript"></script>
    <script src="js/jquery/jquery.label_better.js" type="text/javascript"></script>
   <link rel="stylesheet" href="start.css" type="text/css">
</header>
<body>
<div class="head"></div>
<div class="validate">
    <div class ="form-validate">
        <form method="post" action = "validate/CheckUsers.php" class="form" name = "validation">
            <input type="text" placeholder="username" class="username" name = "user">
            <input type="password" placeholder="password" class="password" name = "pass">
            <input type="submit" value="start" class="button" name = "button">
        </form>
    </div>
</div>
<div class="foot"></div>
</body>
</htmL>
