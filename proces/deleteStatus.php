<?php

require '../config/config.php';

if(isset($_GET['status_id'])) {
    $statusId = mysqli_real_escape_string($db, $_GET['status_id']);

    $sql = "DELETE FROM status WHERE status_id = '$statusId'";
    $result = mysqli_query($db, $sql);

    if($result) {
        echo "
        <script>
            alert('Status has been delete');
            window.location.href = '../page/addStatus-page.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Status failed edited');
            window.location.href = '../page/addStatus-page.php';
        </script>
        ";
    }
} else {
    echo "id tidak ditemuka";
}