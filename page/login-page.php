<?php
require '../config/config.php';
session_start();

if(!empty($_SESSION["username"])){
    // Jika pengguna sudah login, redirect ke halaman dashboard atau halaman lain yang diinginkan
    header("Location: home-page.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: white;
            padding: 2rem;
            width: 300px;
        }
        .title h2 {
            text-align: center;
            margin-bottom: 1rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-group button:hover {
            background-color: #218838;
        }
    </style>
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