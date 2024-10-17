<?php
require '../config/config.php';
session_start();


if(isset($_POST['submit'])) {

    echo "Masuk ke proses form";

    $itemName = mysqli_real_escape_string($db,$_POST['itemName']);
    $itemQuantity = mysqli_real_escape_string($db, $_POST['itemQuantity']);
    $itemSupplier = mysqli_real_escape_string($db, $_POST['itemSupplier']);
    $itemCategory = mysqli_real_escape_string($db, $_POST['itemCategory']);
    $itemStatus = mysqli_real_escape_string($db, $_POST['itemStatus']);
    $itemLocation = mysqli_real_escape_string($db, $_POST['itemLocation']);
    $itemType = mysqli_real_escape_string($db, $_POST['itemType']);

    echo "Isi dari \$_FILES: ";
    print_r($_FILES);

    if(isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {

        echo "Masuk ke proses upload fuile";

        $allowedTypes = ['image/jpeg','image/png',];
        $maxFileSize = 2 * 1024 * 1024;
        if (in_array($_FILES['img']['type'], $allowedTypes) && $_FILES['img']['size'] <= $maxFileSize) {
            $target_dir = "../upload/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }

            $image = $_FILES['img']['name'];
            $target_file = $target_dir . basename($image);

            if(move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                echo "File berhasil diupload";

                // Query insert
                $query = "INSERT INTO items (item_name, quantity, supplier_id, category_id, status_id, location_id, type_id, image) VALUES ('$itemName','$itemQuantity', '$itemSupplier', '$itemCategory', '$itemStatus', '$itemLocation', '$itemType', '$image')";
                
                if (mysqli_query($db, $query)) {
                    echo "Query berhasil dieksekusi";
                    echo "
                    <script>
                        alert('Items added successfully');
                        window.location.href = '../page/addItem-page.php';
                    </script>
                    ";
                } else {
                    $error = mysqli_error($db);
                    echo "
                    <script>
                        alert('Error: $error');
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
                alert('Invalid file type or file too large');
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