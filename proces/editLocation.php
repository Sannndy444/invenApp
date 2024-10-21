<?php

require '../config/config.php';
session_start();

if(isset($_POST['submit'])) {
    $locationId = $_POST['location_id'];
    $locationName = mysqli_real_escape_string($db, $_POST['editLocation']);

    $sql = "UPDATE location SET location_name = '$locationName' WHERE location_id = '$locationId'";

    if (mysqli_query($db, $sql)) {
        echo "
        <script>
            alert('Location has been edited');
            window.location.href = '../page/addLocation-page.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Location failed to edit');
            window.location.href = '../page/addLocation-page.php';
        </script>
        ";
    }
}