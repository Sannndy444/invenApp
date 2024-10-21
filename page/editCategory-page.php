<?php
require "../config/config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login-page.php");
    exit;
}

// Memastikan item_id ada di URL
if (isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];

    // Mengambil data barang dari database
    $sql = "SELECT category_id, category_name FROM categories WHERE category_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $category = $result->fetch_assoc();
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
// $supplierQuery = "SELECT supplier_id, supplier_name FROM suppliers";
// $supplierResult = $db->query($supplierQuery);

$categoryQuery = "SELECT category_id, category_name FROM categories";
$categoryResult = $db->query($categoryQuery);

// $statusQuery = "SELECT status_id, status_name FROM status";
// $statusResult = $db->query($statusQuery);

// $locationQuery = "SELECT location_id, location_name FROM location";
// $locationResult = $db->query($locationQuery);

// $typeQuery = "SELECT type_id, type_name FROM types";
// $typeResult = $db->query($typeQuery);

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
    <div class="editCategory-container">
        <div class="navbar">
            <?php include 'navbar.php'; ?>
        </div>
        <div class="editCategory">
            <div class="title">
                <h2>Edit Category</h2>
            </div>
            <div class="content">
                <form action="../proces/editCategory.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" value="<?php echo $categoryId; ?>">
                    <div class="form-group">
                        <label for="editCategory">Category Name</label>
                        <input type="text" name="editCategory" id="editCategory" value="<?php echo $category['category_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
