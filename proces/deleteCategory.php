<?php

require '../config/config.php';
session_start();

if(isset($_GET['category_id'])) {
    $categoryId = mysqli_real_escape_string($db, $_GET['category_id']);

    $sql = "DELETE FROM categories WHERE category_id = '$categoryId'";
    $result = mysqli_query($db, $sql);

    if($result) {
        echo "
        <script>
            alert('Category delete success');
            window.location.href = '../page/addCategory-page.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Category not delete');
            window.location.href = '../page/addCategory-page.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Category not found');
        window.location.href = '../page/addCategory-page.php';
    </script>
    ";
}