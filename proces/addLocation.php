<?php
require "../config/config.php";
session_start();

if(isset($_POST['submit'])) {
    $locationName = $_POST['locationName'];

    $duplicate = mysqli_query($db, "SELECT location_name FROM location WHERE location_name = '$locationName'");

    if(mysqli_num_rows($duplicate) > 0) {
        echo "
        <script>
            alert('Location already exist');
            window.location.href = '../page/addLocation-page.php';
        </script>
        ";
    } else {
        $sql = "INSERT INTO location (location_name) VALUES ('$locationName')";
        $result = $db->query($sql);

        if($result) {
            echo "
            <script>
                alert('Location added succesfully');
                window.location.href = '../page/addLocation-page.php';
            </script>;
            ";
        } else {
            echo "
            <script>
                alert('Location not added');
            </script>;
            ";
        }
    }
}