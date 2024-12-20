<?php
include "../includes/db_config.php";
include "../includes/WarehouseDatabase.php";

header('Content-Type: application/json'); // Indicate that we're returning JSON

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['selection1'], $_POST['selection2'], $_POST['quantity'])) {
        $productId = $_POST['selection1'];
        $locationId = $_POST['selection2'];
        $quantity = $_POST['quantity'];

        // Check for both placeholder values and empty values.
        if ($productId === 'Select Product' || empty($productId) || 
            $locationId === 'Select Location' || empty($locationId) ||
            $quantity === 'Select Amount' || empty($quantity)) {
            echo json_encode(['error' => "Invalid selection for Product, Quantity, or Location."]);
            return; // Stop script execution after error
        }

        date_default_timezone_set('America/New_York');
        $orderedOn = date('Y-m-d H:i');

        try {
            WarehouseDatabase::connect();
            $sql = "INSERT INTO live_order (productID, locationID, orderedOn, quantity)
                    VALUES (:productId, :locationId, :orderedOn, :quantity)";
            $params = array(
                ':productId' => $productId,
                ':locationId' => $locationId,
                ':orderedOn' => $orderedOn, 
                ':quantity' => $quantity
            );

            WarehouseDatabase::startTransaction();
            WarehouseDatabase::executeSQL($sql, $params);
            WarehouseDatabase::commitTransaction();

            echo json_encode(['success' => "Order placed successfully."]);
        } catch (Exception $e) {
            WarehouseDatabase::rollbackTransaction();
            echo json_encode(['error' => "Error placing order: " . $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => "Selections for Product or Location are missing."]);
    }



} else {
    http_response_code(405);
    echo json_encode(['error' => "Method Not Allowed"]);
}
?>