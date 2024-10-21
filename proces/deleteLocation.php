<?php

require '../config/config.php';
session_start();

if(isset($_GET['location_id'])) {
    $locationId = mysqli_real_escape_string($db, $_GET['location_id']);

    $sql = "DELETE FROM location WHERE location_id = '$locationId'";
    $result = mysqli_query($db, $sql);

    if($result) {
        echo "
        <script>
            alert('Location delete success');
            window.location.href = '../page/addLocation-page.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Location not delete');
            window.location.href = '../page/addLocation-page.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Location not found');
        window.location.href = '../page/addLocation-page.php';
    </script>
    ";
}