<?php

require '../config/config.php';
session_start();

if(isset($_POST['submit'])) {
    $statusId = $_POST['status_id'];
    $statusName = mysqli_real_escape_string($db, $_POST['editStatus']);

    $sql = "UPDATE status SET status_name = '$statusName' WHERE status_id = '$statusId'";

    if (mysqli_query($db, $sql)) {
        echo "
        <script>
            alert('Status has been edited');
            window.location.href = '../page/addStatus-page.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Status failed to edit');
            window.location.href = '../page/addStatus-page.php';
        </script>
        ";
    }
}