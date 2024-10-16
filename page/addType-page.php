<?php
require '../config/config.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Type</title>
</head>
<body>
    <div class="type-container">
        <div class="type">
            <div class="title">
                <h2>
                    Add Type
                </h2>
            </div>
            <div class="type-form">
                <form action="../proces/addType.php" method="post">
                    <div class="form-group">
                        <input type="text" name="typeName" id="typeName" placeholder="Enter Type name" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>