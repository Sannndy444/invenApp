<?php
require '../config/config.php';

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Navbar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .dropdown, .profile {
            float: left;
            overflow: hidden;
        }
        .dropdown .dropbtn {
            cursor: pointer;
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 20px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .profile .dropbtn {
            position: absolute;
            cursor: pointer;
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 20px;
            right: 1rem;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .profile-content {
            display: none;
            position: absolute;
            top: 3rem;
            right: 1rem;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a, .profile-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover, .profile-content a:hover {
            background-color: #ddd;
        }
        .dropdown:hover .dropdown-content, .profile:hover .profile-content {
            display: block;
        }
        .dropdown:hover .dropbtn, .profile:hover .dropbtn {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="home-page.php">Home</a>
        <a href="inventory-page.php">Inventory</a>
        <div class="dropdown">
            <button class="dropbtn">Other
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="addCategory-page.php">Category</a>
                <a href="addLocation-page.php">Location</a>
                <a href="addStatus-page.php">Status</a>
                <a href="addSupplier-page.php">Supplier</a>
                <a href="addType-page.php">Type</a>
            </div>
        </div>
        <div class="profile">
            <button class="dropbtn">
                <span><?php echo htmlspecialchars($username); ?></span>
            </button>
            <div class="profile-content">
                <a href="../proces/logout.php">Log Out</a>
            </div>
        </div>
    </div>

</body>
</html>