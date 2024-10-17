<?php
require "../config/config.php";
session_start();

if (isset($_POST['submit'])) {
    $itemId = $_POST['item_id'];
    $itemName = mysqli_real_escape_string($db, $_POST['itemName']);
    $itemQuantity = mysqli_real_escape_string($db, $_POST['itemQuantity']);
    $itemSupplier = mysqli_real_escape_string($db, $_POST['itemSupplier']);
    $itemCategory = mysqli_real_escape_string($db, $_POST['itemCategory']);
    $itemStatus = mysqli_real_escape_string($db, $_POST['itemStatus']);
    $itemLocation = mysqli_real_escape_string($db, $_POST['itemLocation']);
    $itemType = mysqli_real_escape_string($db, $_POST['itemType']);
    
    $query = "UPDATE items SET item_name='$itemName', quantity='$itemQuantity', supplier_id='$itemSupplier', category_id='$itemCategory', status_id='$itemStatus', location_id='$itemLocation', type_id='$itemType' WHERE item_id='$itemId'";
    
    if (mysqli_query($db, $query)) {
        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['img']['name'];
            $target_dir = "../upload/";
            $target_file = $target_dir . basename($image);
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);

            $imageQuery = "UPDATE items SET image='$image' WHERE item_id='$itemId'";
            mysqli_query($db, $imageQuery);
        }
        
        echo "
        <script>
            alert('Item updated successfully');
            window.location.href = '../page/inventory-page.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error: " . mysqli_error($db) . "');
            window.history.back();
        </script>
        ";
    }
}
?>
