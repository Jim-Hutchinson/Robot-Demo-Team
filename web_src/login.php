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
echo $url."users/read.php?username=".$username."This is the new url<br>";
$web_string = file_get_contents($url."users/read.php?username=".$username);
$users = json_decode($web_string);



//$_SESSION["LoggedIn"] = "NO";
//$_SESSION["username"] = "";
//header("location:index.htm?message=Login Failed");

?>