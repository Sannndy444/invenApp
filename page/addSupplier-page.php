<?php
require "../config/config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
</head>
<body>
    <div class="supplier-container">
        <div class="supplier">
            <div class="title">
                <h2>
                    Add supplier
                </h2>
            </div>
            <div class="supplier-form">
                <form action="../proces/addSupplier.php" method="post">
                    <div class="form-group">
                        <input type="text" name="supplierName" id="supplierName" placeholder="Enter supplier name" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit">Add</button>
                    </div>
        </div>
    </div>
</body>
</html>