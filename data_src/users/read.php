<?php
//This page will be used to read user information to allow registered users to log in to the system and make orders
include "../includes/db_config.php";
session_start();

$user = $_SESSION("username");

$connection = new mysqli($servername, $username, $password, $database);

if($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM users WHERE username = ?";
$sql->bind_param("?", $user);
$sql.execute();
$result = $sql->get_result();

if($result->num_rows > 0){

}
?>