<?php
session_start();

$password=$_POST["password"];
$username=$_POST["username"];

$host = $_SERVER['HTTP_HOST'];
$protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
$file_path = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);
$url = $protocol."://".$host.$file_path;
$web_string = file_get_contents($url."data/user/read.php?username=".$username);
$users = json_decode($web_string);
if (is_array($users) && count($users) > 0) {

    $user = array_pop($users);
    if($user->password==$pass){
        //you are logged in
        $_SESSION["LoggedIn"] = "YES";
        $_SESSION["username"] = $username;
        header("location:index.html");
        exit;
    }
}

$_SESSION["LoggedIn"] = "NO";
$_SESSION["username"] = "";
header("location:index.htm?message=Login Failed");

?>