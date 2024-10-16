<?php
require "../config/config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Status</title>
</head>
<body>
    <div class="status-container">
        <div class="status">
            <div class="title">
                <h2>
                    Add Status
                </h2>
            </div>
            <div class="status-form">
                <form action="../proces/addStatus.php" method="post">
                    <div class="form-group">
                        <input type="text" name="statusName" id="statusName" placeholder="Enter status name" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit">Add</button>
                    </div>
        </div>
    </div>
</body>
</html>