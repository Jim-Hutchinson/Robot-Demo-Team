<?php
include "db_config.php";
include "WarehouseDatabase.php";
try {
  // Connect to the database
  $conn = new PDO("mysql:host=$host;dbname=$database", $dbUsername, $dbPassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
?>