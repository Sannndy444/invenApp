<?php

require '../config/config.php';
session_start();

if(isset($_POST['submit'])) {
    $categoryId = $_POST['category_id'];
    $categoryName = mysqli_real_escape_string($db, $_POST['editCategory']);

    $sql = "UPDATE categories SET category_name = '$categoryName' WHERE category_id = '$categoryId'";

    if (mysqli_query($db, $sql)) {
        echo "
        <script>
            alert('Category has been edited');
            window.location.href = '../page/addCategory-page.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Category failed to edit');
            window.location.href = '../page/addCategory-page.php';
        </script>
        ";
    }
}