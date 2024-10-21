<?php
require "../config/config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login-page.php");
    exit;
}

$sql = "SELECT category_id, category_name FROM categories";
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>

    <style>
        /* Mengatur tampilan container agar tetap besar */
        .addCategory {
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
    <div class="category-container">
        <div class="navbar">
            <?php include 'navbar.php'; ?>
        </div>
        <div class="addCategory">
            <div class="title">
                <h2>
                    Add Category
                </h2>
            </div>
            <div class="category-form">
                <form action="../proces/addCategory.php" method="post">
                    <div class="form-group">
                        <input type="text" name="categoryName" id="categoryName" placeholder="Enter Category Name" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit">Add</button>
                    </div>
                </form>
        </div>
        <div class="showCategory">
            <div class="title">
                <h2>
                    List Category
                </h2>
            </div>
            <div class="contentCategory">
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
                                    echo "<td>" . htmlspecialchars($row['category_name']) . "</td>";
                                    echo "<td>
                                        <a href='editCategory-page.php?category_id=" . $row['category_id'] . "'>Edit</a> | 
                                        <a href='../proces/deleteCategory.php?category_id=" . $row['category_id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a>
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