<?php
session_start();
?>
<HTML>
    <HEAD>
        <title>Robot Ordering Website</title>
        <link rel="stylesheet" href="style.css">
    </HEAD>
    <body>
    <form method="POST" action="login.php" name="loginform" id="loginform">
        <div>
        Username:<input type="text" name="username">
        </div>
        Password:<input type="password" name="password">
        <br/>
        <input type="submit" value="Login">

    </form>
    </body>
</HTML>