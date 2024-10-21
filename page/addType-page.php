<?php
require '../config/config.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login-page.php");
    exit;
}

$sql = "SELECT type_id, type_name FROM types";
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Type</title>

    <style>
        /* Mengatur tampilan container agar tetap besar */
        .type {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            position: relative; /* Memungkinkan form edit berada di atas */
        }
        .title {
            text-align: center;
            padding: 1rem 0 1rem 0;
        }
        .title h2 {
            margin: 0;
            color: #333;
        }
        .content {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"]{
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="type-container">
        <div class="navbar">
            <?php include 'navbar.php'; ?>
        </div>
        <div class="type">
            <div class="title">
                <h2>
                    Add Type
                </h2>
            </div>
            <div class="type-form">
                <form action="../proces/addType.php" method="post">
                    <div class="form-group">
                        <input type="text" name="typeName" id="typeName" placeholder="Enter Type Name" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="showType">
            <div class="title">
                <h2>
                    List Type
                </h2>
            </div>
            <div class="contentType">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result->num_rows > 0) {
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $no . "</td>"; $no++;
                                    echo "<td>" . htmlspecialchars($row['type_name']) . "</td>";
                                    echo "<td>
                                        <a href='editType-page.php?type_id=" . $row['type_id'] . "'>Edit</a> | 
                                        <a href='../proces/deleteType.php?type_id=" . $row['type_id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a>
                                        </td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>