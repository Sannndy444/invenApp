<?php
require '../config/config.php';
session_start();

if(isset($_GET['item_id'])) {
    $item_id = mysqli_real_escape_string($db, $_GET['item_id']);

    $sql = "DELETE FROM items WHERE item_id = '$item_id'";
    $result = mysqli_query($db, $sql);

    if($result) {
        echo "
        <script>
            alert('Item delete success');
            window.location.href = '../page/inventory-page.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Item not delete');
            window.location.href = '../page/inventory-page.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Items ID not found');
        window.location.href = '../page/inventory-page.php';
    </script>
    ";
}