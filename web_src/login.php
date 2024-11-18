<?php
session_start();

$password=$_POST["password"];
$username=$_POST["username"];
$_SESSION["username"] = $username;

//Send username to read.php in users and check if user existst and password match



$_SESSION["LoggedIn"] = "NO";
$_SESSION["username"] = "";
header("location:index.htm?message=Login Failed");

?>