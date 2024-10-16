<?php
require "../config/config.php";
session_start();

if (isset($_POST['submit'])) {
    $categoryName = $_POST['categoryName'];

    $sql = "INSERT INTO categories (categoryName) VALUES ('$categoryName')";
    $result = $db->query($sql);

    if ($result) {
        echo "
        <script>
            alert('Category added successfully');
            window.location.href = '../page/category-page.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Category not added');
        </script>
        ";
    }
}