<?php

require '../config/config.php';
session_start();

if(isset($_GET['category_id'])) {
    $categoryId = mysqli_real_escape_string($db, $_GET['category_id']);

    $use_sql = "SELECT COUNT(*) AS item_id FROM items WHERE category_id = '$categoryId'";
    $result = mysqli_query($db, $use_sql);

    if ($result) {
        $row = $result->fetch_assoc();

        if ($row['item_id'] > 0) {
            echo "
            <script>
                alert('Category already use');
                window.location.href = '../page/addCategory-page.php';
            </script>
            ";
        } else {
            $deleteCategory = "DELETE FROM categories WHERE category_id = '$categoryId'";

            if($db->query($deleteCategory) === TRUE) {
                echo "
                <script>
                    alert('Category delete Success');
                    window.location.href = '../page/addCategory-page.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Category delete failed');
                    window.location.href = '../page/addCategory-page.php';
                </script>
                ";
            }
        }
    } else {
        echo "
        <script>
            alert('Category not found');
            window.location.href = '../page/addCategory-page.php';
        </script>
        ";
    }

    // $sql = "DELETE FROM categories WHERE category_id = '$categoryId'";
    // $result = mysqli_query($db, $sql);

    // if($result) {
    //     echo "
    //     <script>
    //         alert('Category delete success');
    //         window.location.href = '../page/addCategory-page.php';
    //     </script>
    //     ";
    // } else {
    //     echo "
    //     <script>
    //         alert('Category not delete');
    //         window.location.href = '../page/addCategory-page.php';
    //     </script>
    //     ";
    // }
} else {
    echo "
    <script>
        alert('Category not found');
        window.location.href = '../page/addCategory-page.php';
    </script>
    ";
}