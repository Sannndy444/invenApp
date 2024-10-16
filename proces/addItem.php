<?php
require '../config/config.php';
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])) {

    echo "Masuk ke proses form";
    echo "<pre>";
    print_r($_FILES); // Tambahkan di sini untuk melihat data $_FILES
    echo "</pre>";

    $itemName = $_POST['itemName'];
    $itemQuantity = $_POST['itemQuantity'];
    $itemSupplier = $_POST['itemSupplier'];
    $itemCategory = $_POST['itemCategory'];
    $itemStatus = $_POST['itemStatus'];
    $itemLocation = $_POST['itemLocation'];
    $itemType = $_POST['itemType'];

    if(isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        echo "Masuk ke proses upload file";
        $image = $_FILES['img']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($image);
            if(move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                echo "File berhasil diupload";
                $query = "INSERT INTO items (item_name, quantity, supplier_id, category_id, status_id, location_id, type_id, image) VALUES ('$itemName','$itemQuantity', '$itemSupplier', '$itemCategory', '$itemStatus', '$itemLocation', '$itemType', '$image')";
                if (mysqli_query($conn, $query)) {
                    echo "Query berhasil dieksekusi";
                    echo "
                    <script>
                        alert('Items added successfully');
                        window.location.href = '../page/addItem-page.php';
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('Error : " . mysqli_error($conn) . "');
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                    alert('Error Uploading Image');
                </script>
                ";
            }
    } else {
        echo "
        <script>
            alert('Error Uploading Image or No image Uploading');
        </script>
        ";
    }
}