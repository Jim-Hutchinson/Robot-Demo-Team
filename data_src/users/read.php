<?php
// This page is used to read user information to allow registered users to log in to the system and make orders
require "../includes/db_config.php";

$user = $_GET["username"];

$conn = new mysqli($host, $dbUsername, $dbPassword, $database);
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
}

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $user);

$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($userData);
$conn->close();
?>
