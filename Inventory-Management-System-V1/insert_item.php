<?php
// Include the database connection file
include_once "db_connect.php";

// Get the item details from the form
$itemName = $_POST['item_name'];
$purchaseDate = $_POST['purchase_date'];
$deliveryDate = $_POST['delivery_date'];
$propertyNumber = $_POST['property_number'];
$serialNumber = $_POST['serial_number'];
$modelNumber = $_POST['model_number'];
$description = $_POST['description'];
$manufacturerName = $_POST['manufacturer_name'];
$quantityBought = $_POST['quantity_bought'];
$designation = $_POST['designation'];
$receivedBy = $_POST['received_by'];
$supplierName = $_POST['supplier_name'];
$orNumber = $_POST['or_number'];
$amount = $_POST['amount'];
$transferHistory = $_POST['transfer_history']; // Update the variable name here
$orderedBy = $_POST['ordered_by'];

// Prepare and execute the SQL statement to insert the item data
$stmt = $conn->prepare("INSERT INTO inventory (item_name, purchase_date, delivery_date, property_number, serial_number, model_number, description, manufacturer_name, quantity_bought, designation, received_by, supplier_name, or_number, amount, transfer_history, ordered_by) 
VALUES (:item_name, :purchase_date, :delivery_date, :property_number, :serial_number, :model_number, :description, :manufacturer_name, :quantity_bought, :designation, :received_by, :supplier_name, :or_number, :amount, :transfer_history, :ordered_by)");

$stmt->bindParam(':item_name', $itemName);
$stmt->bindParam(':purchase_date', $purchaseDate);
$stmt->bindParam(':delivery_date', $deliveryDate);
$stmt->bindParam(':property_number', $propertyNumber);
$stmt->bindParam(':serial_number', $serialNumber);
$stmt->bindParam(':model_number', $modelNumber);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':manufacturer_name', $manufacturerName);
$stmt->bindParam(':quantity_bought', $quantityBought);
$stmt->bindParam(':designation', $designation);
$stmt->bindParam(':received_by', $receivedBy);
$stmt->bindParam(':supplier_name', $supplierName);
$stmt->bindParam(':or_number', $orNumber);
$stmt->bindParam(':amount', $amount);
$stmt->bindParam(':transfer_history', $transferHistory); // Update the variable name here
$stmt->bindParam(':ordered_by', $orderedBy);

try {
  $stmt->execute();
  echo "Item added successfully!";
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>
