
<?php
require "../config/config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login-page.php");
    exit;
}

$sql_supplier = "SELECT supplier_id, supplier_name FROM suppliers";
$result_supplier = $db->query($sql_supplier);

$sql_category = "SELECT category_id, category_name FROM categories";
$result_categories = $db->query($sql_category);

$sql_status = "SELECT status_id, status_name FROM status";
$result_status = $db->query($sql_status);

$sql_location = "SELECT location_id, location_name FROM location";
$result_location = $db->query($sql_location);

$sql_type = "SELECT type_id, type_name FROM types";
$result_type = $db->query($sql_type);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items</title>

    <style>
        /* Mengatur tampilan container agar tetap besar */
        .item {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            position: relative; /* Memungkinkan form edit berada di atas */
        }

        .title {
            text-align: center;
            padding: 0 0 1rem 0;
        }

        .title h2 {
            margin: 0;
            color: #333;
        }
        .content {
            margin-top: 20px;
        }
        .edit-form {
            background-color: #e9ecef; /* Latar belakang untuk form edit */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select,
        .form-group input[type="file"] {
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
        .form-group img {
            margin-top: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="item-container">
        <div class="navbar">
            <?php include 'navbar.php'; ?>
        </div>
        <div class="item">
            <div class="title">
                <h2>
                    Add Item
                </h2>
            </div>
            <div class="item-form">
                <form action="../proces/addItem.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="itemName" id="itemName" placeholder="Enter Item Name" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="itemQuantity" id="itemQuantity" placeholder="Enter Quantity" required>
                    </div>
                    <div class="form-group">
                        <select name="itemSupplier" id="itemSupplier" required>
                            <?php
                                if ($result_supplier->num_rows > 0) {
                                    while ($row = $result_supplier->fetch_assoc()) {
                                        echo '<option value="' . $row['supplier_id'] . '">' . $row['supplier_name'] . '</option>';
                                    }
                                } else {
                                    echo '<option value=""> No options </option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="itemCategory" id="itemCategory" required>
                            <?php
                                if ($result_categories->num_rows > 0) {
                                    while ($row = $result_categories->fetch_assoc()) {
                                        echo '<option value="'. $row['category_id'] . '">' . $row['category_name'] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="itemStatus" id="itemStatus" required>
                            <?php
                                if ($result_status->num_rows > 0) {
                                    while ($row = $result_status->fetch_assoc()) {
                                        echo '<option value="' . $row['status_id'] . '">' . $row['status_name'] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="itemLocation" id="itemLocation" required>
                            <?php
                                if ($result_location->num_rows > 0) {
                                    while ($row = $result_location->fetch_assoc()) {
                                        echo '<option value="' . $row['location_id'] . '">' . $row['location_name'] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="itemType" id="itemType">
                            <?php
                                if ($result_type->num_rows > 0) {
                                    while ($row = $result_type->fetch_assoc()) {
                                        echo '<option value="' . $row['type_id'] . '">' . $row['type_name'] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="img" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>