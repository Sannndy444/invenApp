<?php

require '../config/config.php';
session_start();

if(isset($_GET['type_id'])) {
    $typeId = mysqli_real_escape_string($db, $_GET['type_id']);

    $use_sql = "SELECT COUNT(*) AS item_id FROM items WHERE type_id = '$typeId'";
    $result = mysqli_query($db, $use_sql);

    if ($result) {
        $row = $result->fetch_assoc();

        if ($row['item_id'] > 0) {
            echo "
            <script>
                alert('Type already use');
                window.location.href = '../page/addType-page.php';
            </script>
            ";
        } else {
            $deleteType = "DELETE FROM types WHERE type_id = '$typeId'";
            // $rowlocation = mysqli_query($db, $deleteLocation);

            if($db->query($deleteType) === TRUE) {
                echo "
                <script>
                    alert('Type delete Success');
                    window.location.href = '../page/addType-page.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Type delete failed');
                    window.location.href = '../page/addType-page.php';
                </script>
                ";
            }
        }
    } else {
        echo "
        <script>
            alert('Type not found');
            window.location.href = '../page/addType-page.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Type not found');
        window.location.href = '../page/addType-page.php';
    </script>
    ";
}