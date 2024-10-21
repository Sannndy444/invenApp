<?php

require '../config/config.php';
session_start();

if(isset($_POST['submit'])) {
    $typeId = $_POST['type_id'];
    $typeName = mysqli_real_escape_string($db, $_POST['editType']);

    $sql = "UPDATE types SET type_name = '$typeName' WHERE type_id = '$typeId'";

    if (mysqli_query($db, $sql)) {
        echo "
        <script>
            alert('Type has been edited');
            window.location.href = '../page/addType-page.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Type failed to edit');
            window.location.href = '../page/addType-page.php';
        </script>
        ";
    }
}