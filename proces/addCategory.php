<?php
require "../config/config.php";
session_start();

if (isset($_POST['submit'])) {
    $categoryName = $_POST['categoryName'];

    $duplicate = mysqli_query($db, "SELECT category_name FROM categories WHERE category_name = '$categoryName'");

    if(mysqli_num_rows($duplicate) > 0) {
        echo "
        <script>
            alert('Category already exist');
            window.location.href = '../page/addCategory-page.php';
        </script>;
        ";
    } else {
        $sql = "INSERT INTO categories (category_name) VALUES ('$categoryName')";
        $result = $db->query($sql);

        if($result) {
            echo "
            <script>
                alert('Category added succesfully');
                window.location.href = '../page/addCategory-page.php';
            </script>;
            ";
        } else {
            echo "
            <script>
                alert(Category not added);
            </script>
            ";
        }
    }
}