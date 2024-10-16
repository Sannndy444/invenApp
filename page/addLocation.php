<?php
require "../config/config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Location/title>
</head>
<body>
    <div class="location-container">
        <div class="location">
            <div class="title">
                <h2>
                    Add Location
                </h2>
            </div>
            <div class="location-form">
                <form action="../proces/addLocation.php" method="post">
                    <div class="form-group">
                        <input type="text" name="locationName" id="locationName" placeholder="Enter location name" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit">Add</button>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>