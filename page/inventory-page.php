<?php
require "../config/config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
</head>
<body>
    <div class="inventory-container">
        <div class="inventory">
            <div class="title">
                <h2>Inventory</h2>
            </div>
            <div class="content">
                <p>Hello world</p>
                <br>
                <a href="addItem-page.php">Add Item</a> <br>
                <a href="addCategory-page.php">Add Category</a> <br>
                <a href="addSupplier-page.php">Add Supplier</a> <br>
                <a href="addLocation-page.php">Add Location</a> <br>
                <a href="addStatus-page.php">Add Status</a> <br>
                <a href="addType-page.php">Add Types</a>

            </div>
        </div>
    </div>
</body>
</html>