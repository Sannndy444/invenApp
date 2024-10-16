<?php
require "../config/config.php";
session_start();

if (isset($_POST['submit'])) {
    $categoryName = $_POST['statusName'];

    $duplicate = mysqli_query($db, "SELECT status_name FROM status WHERE status_name = '$statusName'"); 

    if(mysqli_num_rows($duplicate) > 0) {
        echo "
        <script>
            alert('Status already exist');
        </script>
        ";
    } else {
        $sql = "INSERT INTO status (status_name) VALUES ('$statusName')";
        $result = $db->query($sql);

        if($result) {
            echo "
            <script>
                alert('Status added successfully');
                window.location.href = '../page/addStatus-page.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Status not added');
            </script>
            ";
        }
    }
}