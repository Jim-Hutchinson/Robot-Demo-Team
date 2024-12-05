<?php
session_start();
?>
<HTML>
    <HEAD>
        <title>Robot Ordering Website</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </HEAD>
    <body>
    <div class="login-box">
        <form method="POST" action="login.php" name="loginform" id="loginform">
            <div class="username-box">
                Username:<input type="text" name="username">
            </div>
            <div class="password-box">
                Password:<input type="password" name="password">
            </div>
            <br/>
                <button type="submit" id="confirmOrderButton" class="order">Login</button>
        </form>
    </div> 
    </body>
</HTML>