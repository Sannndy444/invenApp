<?php
require "../config/config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login-page.php");
    exit;
}

// Memastikan item_id ada di URL
if (isset($_GET['item_id'])) {
    $itemId = $_GET['item_id'];

    // Mengambil data barang dari database
    $sql = "SELECT item_name, quantity, supplier_id, category_id, status_id, location_id, type_id, image FROM items WHERE item_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $itemId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $item = $result->fetch_assoc();
    } else {
        // Jika barang tidak ditemukan
        header("Location: inventory-page.php");
        exit();
    }
} else {
    header("Location: inventory-page.php");
    exit();
}

// Mengambil data untuk dropdown
$supplierQuery = "SELECT supplier_id, supplier_name FROM suppliers";
$supplierResult = $db->query($supplierQuery);

$categoryQuery = "SELECT category_id, category_name FROM categories";
$categoryResult = $db->query($categoryQuery);

$statusQuery = "SELECT status_id, status_name FROM status";
$statusResult = $db->query($statusQuery);

$locationQuery = "SELECT location_id, location_name FROM location";
$locationResult = $db->query($locationQuery);

$typeQuery = "SELECT type_id, type_name FROM types";
$typeResult = $db->query($typeQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <style>
        /* Mengatur tampilan container agar tetap besar */
        .inventory {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative; /* Memungkinkan form edit berada di atas */
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
    <div class="inventory-container">
        <div class="navbar">
            <?php include 'navbar.php'; ?>
        </div>
        <div class="inventory">
            <div class="title">
                <h2>Edit Item</h2>
            </div>
            <div class="content">
                <form action="../proces/editItem.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="item_id" value="<?php echo $itemId; ?>">
                    <div class="form-group">
                        <label for="itemName">Item Name</label>
                        <input type="text" name="itemName" id="itemName" value="<?php echo $item['item_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="itemQuantity">Quantity</label>
                        <input type="number" name="itemQuantity" id="itemQuantity" value="<?php echo $item['quantity']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="itemSupplier">Supplier</label>
                        <select name="itemSupplier" id="itemSupplier" required>
                            <?php
                            while ($row = $supplierResult->fetch_assoc()) {
                                $selected = ($row['supplier_id'] == $item['supplier_id']) ? 'selected' : '';
                                echo '<option value="' . $row['supplier_id'] . '" ' . $selected . '>' . $row['supplier_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="itemCategory">Category</label>
                        <select name="itemCategory" id="itemCategory" required>
                            <?php
                            while ($row = $categoryResult->fetch_assoc()) {
                                $selected = ($row['category_id'] == $item['category_id']) ? 'selected' : '';
                                echo '<option value="' . $row['category_id'] . '" ' . $selected . '>' . $row['category_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="itemStatus">Status</label>
                        <select name="itemStatus" id="itemStatus" required>
                            <?php
                            while ($row = $statusResult->fetch_assoc()) {
                                $selected = ($row['status_id'] == $item['status_id']) ? 'selected' : '';
                                echo '<option value="' . $row['status_id'] . '" ' . $selected . '>' . $row['status_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="itemLocation">Location</label>
                        <select name="itemLocation" id="itemLocation" required>
                            <?php
                            while ($row = $locationResult->fetch_assoc()) {
                                $selected = ($row['location_id'] == $item['location_id']) ? 'selected' : '';
                                echo '<option value="' . $row['location_id'] . '" ' . $selected . '>' . $row['location_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="itemType">Type</label>
                        <select name="itemType" id="itemType">
                            <?php
                            while ($row = $typeResult->fetch_assoc()) {
                                $selected = ($row['type_id'] == $item['type_id']) ? 'selected' : '';
                                echo '<option value="' . $row['type_id'] . '" ' . $selected . '>' . $row['type_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" name="img" id="img">
                        <p>Current Image: <img src="../upload/<?php echo $item['image']; ?>" alt="Current Image" width="100"></p>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit">Update Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
