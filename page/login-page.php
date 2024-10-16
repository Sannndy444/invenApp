<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <div class="login">
            <div class="title">
                <h2>
                    Login
                </h2>
            </div>
            <div class="form">
                <form action="../proces/login.php" method="post">
                    <div class="form-group">
                        <input type="text" name="userMail" id="userMail" placeholder="Enter your username or email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit">Login</button>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>