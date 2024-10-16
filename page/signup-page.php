<?php
require "../config/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <div class="signup-container">
        <div class="signup">
            <div class="title">
                <h2>
                    Sign Up
                </h2>
            </div>
            <div class="form">
                <form action="../proces/signup.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" id="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit">Sign Up</button>
                    </div>
        </div>
    </div>
</body>
</html>