
<?php
require "../config/config.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items</title>
</head>
<body>
    <div class="item-container">
        <div class="item">
            <div class="title">
                <h2>
                    Add item
                </h2>
            </div>
            <div class="item-form">
                <form action="../proces/addItem.php" method="post">
                    <div class="form-group">
                        <input type="text" name="itemName" id="itemName" placeholder="Enter item name" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="itemQuantity" id="itemQuantity" placeholder="Enter quantity" required>
                    </div>
                    <div class="form-group">
                        <select name="itemSupplier" id="itemSupplier" required>
                            <option value="">--- Chose Supplier ---</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="itemCategory" id="itemCategory" required>
                            <option value="">--- Chose Category ---</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="itemStatus" id="itemStatus" required>
                            <option value="">--- Chose Status ---</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="itemLocation" id="itemLocation" required>
                            <option value="">--- Chose Location ---</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="img" id="img" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit">Add</button>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>