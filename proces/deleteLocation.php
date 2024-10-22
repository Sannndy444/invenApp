<?php

require '../config/config.php';
session_start();

if(isset($_GET['location_id'])) {
    $locationId = mysqli_real_escape_string($db, $_GET['location_id']);

    $use_sql = "SELECT COUNT(*) AS item_id FROM items WHERE location_id = '$locationId'";
    $result = mysqli_query($db, $use_sql);

    if ($result) {
        $row = $result->fetch_assoc();

        if ($row['item_id'] > 0) {
            echo "
            <script>
                alert('Location already use');
                window.location.href = '../page/addLocation-page.php';
            </script>
            ";
        } else {
            $deleteLocation = "DELETE FROM location WHERE location_id = '$locationId'";
            // $rowlocation = mysqli_query($db, $deleteLocation);

            if($db->query($deleteLocation) === TRUE) {
                echo "
                <script>
                    alert('Location delete Success');
                    window.location.href = '../page/addLocation-page.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Location delete failed');
                    window.location.href = '../page/addLocation-page.php';
                </script>
                ";
            }
        }
    } else {
        echo "
        <script>
            alert('Location not found');
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