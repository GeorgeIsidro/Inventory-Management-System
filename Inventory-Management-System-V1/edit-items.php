<?php
// Include the database connection file
include_once "db_connect.php";

// Check if the item ID is provided in the URL
if (isset($_GET['id'])) {
    $itemId = $_GET['id'];

    // Fetch the item from the database using the provided ID
    $stmt = $conn->prepare("SELECT * FROM inventory WHERE id = ?");
    $stmt->execute([$itemId]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // If no item ID is provided, redirect back to the view_items page
    header("Location: view-items.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Item</title>
    <!-- Add your CSS stylesheets here if needed -->
	    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e1f5e1;
            color: #006400;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f0fff0;
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            box-sizing: border-box; /* Add this to include padding and border in width calculation */
        }

        textarea {
            resize: vertical; /* Allow vertical resizing of the textarea */
        }

        input[type="submit"] {
            background-color: #006400;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004d00;
        }

        a {
            display: block;
            text-align: center;
            color: #006400;
            margin-top: 10px;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Edit Item</h2>
    <form action="update-item.php" method="post">
        <!-- Hidden field to store the item ID -->
        <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">

        <!-- Add input fields here to edit the item details -->
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" value="<?php echo $item['item_name']; ?>" required><br>

        <label for="purchase_date">Purchase Date:</label>
        <input type="date" name="purchase_date" value="<?php echo $item['purchase_date']; ?>" required><br>

        <label for="delivery_date">Delivery Date:</label>
        <input type="date" name="delivery_date" value="<?php echo $item['delivery_date']; ?>" required><br>

        <label for="property_number">Property Number:</label>
        <input type="text" name="property_number" value="<?php echo $item['property_number']; ?>" required><br>

        <label for="serial_number">Serial Number:</label>
        <input type="text" name="serial_number" value="<?php echo $item['serial_number']; ?>" required><br>

        <label for="model_number">Model:</label>
        <input type="text" name="model_number" value="<?php echo $item['model_number']; ?>" required><br>

        <label for="description">Description:</label>
        <input type="text" name="description" value="<?php echo $item['description']; ?>" required><br>

        <label for="manufacturer_name">Manufacturer's Name:</label>
        <input type="text" name="manufacturer_name" value="<?php echo $item['manufacturer_name']; ?>" required><br>

        <label for="quantity_bought">Quantity Bought:</label>
        <input type="number" name="quantity_bought" value="<?php echo $item['quantity_bought']; ?>" required><br>

        <label for="designation">Designation:</label>
        <input type="text" name="designation" value="<?php echo $item['designation']; ?>" required><br>

        <label for="received_by">Received By:</label>
        <input type="text" name="received_by" value="<?php echo $item['received_by']; ?>" required><br>

        <label for="supplier_name">Supplier's Name:</label>
        <input type="text" name="supplier_name" value="<?php echo $item['supplier_name']; ?>" required><br>

        <label for="OR_number">OR Number:</label>
        <input type="text" name="OR_number" value="<?php echo $item['OR_number']; ?>" required><br>

        <label for="amount">Amount:</label>
        <input type="number" name="amount" value="<?php echo $item['amount']; ?>" required><br>

        <label for="transfer_history">History of Transfer:</label>
        <input type="text" name="transfer_history" value="<?php echo $item['transfer_history']; ?>" required><br>

        <label for="ordered_by">Ordered By:</label>
        <input type="text" name="ordered_by" value="<?php echo $item['ordered_by']; ?>" required><br>

        <input type="submit" value="Update">
    </form>

    <a href="view-items.php">Back to View Items</a>
</body>

</html>
