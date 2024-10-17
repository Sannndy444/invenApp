<?php
require "../config/config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login-page.php");
    exit;
}

// Mengambil data dari tabel items dan melakukan JOIN dengan tabel lain
$sql = "
    SELECT 
        items.item_id,  -- Pastikan untuk mengambil item_id untuk mengedit dan menghapus
        items.item_name, 
        items.quantity, 
        suppliers.supplier_name, 
        categories.category_name, 
        status.status_name, 
        location.location_name, 
        types.type_name, 
        items.image 
    FROM 
        items 
    JOIN 
        suppliers ON items.supplier_id = suppliers.supplier_id 
    JOIN 
        categories ON items.category_id = categories.category_id 
    JOIN 
        status ON items.status_id = status.status_id 
    JOIN 
        location ON items.location_id = location.location_id 
    JOIN 
        types ON items.type_id = types.type_id
";

$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>

    <style>
        /* Gaya tabel */

        .title {
            text-align: center;
            padding: 2rem 0 0 0;
        }

        .button {
            padding: 1rem 1rem 0.1rem 1rem;
        }

        .addItem {
            background-color: #28a745;
            color: white;
            padding: 9px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .addItem:hover {
            background-color: #218838;
        }

        .addItem a {
            text-decoration: none;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            width: 50px; /* Atur ukuran gambar */
            height: auto; /* Sesuaikan tinggi secara otomatis */
        }

        .action-buttons {
            display: flex;
            gap: 10px; /* Jarak antar tombol */
        }

        .btn-edit, .btn-delete {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #4CAF50; /* Warna tombol edit */
            color: white;
        }

        .btn-delete {
            background-color: #f44336; /* Warna tombol delete */
            color: white;
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
                <h2>Inventory</h2>
            </div>
            <div class="content">
                <div class="button">
                    <button class="addItem">
                        <a href="addItem-page.php">Add Item</a>
                    </button>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Actions</th> <!-- Kolom untuk tombol aksi -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Mengecek apakah ada data yang diambil dari database
                        if ($result->num_rows > 0) {
                            // Mengambil data barang satu per satu dan menampilkannya
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['supplier_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['category_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['status_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['location_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['type_name']) . "</td>";
                                // Menampilkan gambar barang jika ada
                                echo "<td><img src='../upload/" . htmlspecialchars($row['image']) . "' alt='Item Image'></td>";
                                // Tombol Edit dan Delete
                                echo "<td>
                                        <a href='editItem-page.php?item_id=" . $row['item_id'] . "'>Edit</a> | 
                                        <a href='deleteItem.php?item_id=" . $row['item_id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a>
                                        </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>No items found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
