<?php
include "../data_src/includes/db_config.php";
include "../data_src/includes/WarehouseDatabase.php";
require "../data_src/includes/sessioncheck.php";
if(!checklogged()){
  header("location:index.php?LoggedIn=False");
}
try {
  // Connect to the database
  $conn = new PDO("mysql:host=$host;dbname=$database", $dbUsername, $dbPassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Fetch data from the product table
  $sql = "SELECT locationId, locationName FROM location";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $locationOptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Return the product options as JSON response
  header('Content-Type: application/json');
  echo json_encode($locationOptions);

} catch(PDOException $e) {
  // Failed to connect or retrieve data, handle the error
  echo "Error: " . $e->getMessage();
}
?>