<?php

require '../config/config.php';
session_start();

if(isset($_POST['submit'])) {
    $typeName = $_POST['typeName'];

    $duplicate = mysqli_query($db, "SELECT type_name FROM types WHERE type_name = '$typeName'");

    if(mysqli_num_rows($duplicate) > 0) {
        echo "
        <script>
            alert('Types already exist');
            window.location.href = '../page/addType-page.php';
        </script>;
        ";
    } else {
        $sql = "INSERT INTO types (type_name) VALUES ('$typeName')";
        $result = $db->query($sql);

        if($result) {
            echo "
            <script>
                alert('Types added succesfully');
                window.location.href = '../page/addType-page.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert(Types not added);
            </script>
            ";
        }
    }
}