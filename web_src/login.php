<?php
session_start();

$password=$_POST["password"];
$username=$_POST["username"];

//Send username to read.php in users and check if user exists and password match
$host = $_SERVER['HTTP_HOST'];
$protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
$file_path = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);
$url = $protocol."://".$host.$file_path;
$url = str_replace("web_src/", "data_src/", $url);
$web_string = file_get_contents($url."users/read.php?username=".$username);
$users = json_decode($web_string);
if (is_array($users) && count($users) > 0) {

    $user = array_pop($users);
    if($user->password==$password){
        //you are logged in
        $_SESSION["LoggedIn"] = "YES";
        $_SESSION["username"] = $username;
        header("location:order.php");
        exit;
    }
}
$_SESSION["LoggedIn"] = "NO";
$_SESSION["username"] = "";
header("location:index.php?message=Login Failed");

?>