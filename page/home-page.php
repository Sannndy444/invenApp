<?php
    require '../config/config.php';

    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login-page.php");
        exit;
    }

    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <div class="home-container">
        <div class="navbar">
            <?php include 'navbar.php'; ?>
        </div>
        <div class="home">
            <div class="title">
                <h1>Welcome to InvenApp,<span> <?php echo htmlspecialchars($username); ?>!</span></h1>
                <p>This is the home page only accessible to logged-in users.</p>
            </div>
        </div>
    </div>
</body>
</html>