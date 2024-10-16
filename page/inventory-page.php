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
                <a href="addItem-page.php">Add Item</a>
            </div>
        </div>
    </div>
</body>
</html>