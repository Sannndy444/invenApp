<?php
require "../config/config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>
    <div class="category-container">
        <div class="category">
            <div class="title">
                <h2>
                    Add Category
                </h2>
            </div>
            <div class="category-form">
                <form action="../proces/addCategory.php" method="post">
                    <div class="form-group">
                        <input type="text" name="categoryName" id="categoryName" placeholder="Enter category name" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit">Add</button>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>