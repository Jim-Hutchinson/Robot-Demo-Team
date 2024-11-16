<?php
include "../includes/db_config.php";
include "../includes/WarehouseDatabase.php";
try {
  // Connect to the database
  $conn = new PDO("mysql:host=$host;dbname=$database", $dbUsername, $dbPassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
?>