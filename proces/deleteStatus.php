<?php

require '../config/config.php';
session_start();

if(isset($_GET['status_id'])) {
    $statusId = mysqli_real_escape_string($db, $_GET['status_id']);

    $use_sql = "SELECT COUNT(*) AS item_id FROM items WHERE status_id = '$statusId'";
    $result = mysqli_query($db, $use_sql);

    if ($result) {
        $row = $result->fetch_assoc();

        if ($row['item_id'] > 0) {
            echo "
            <script>
                alert('Status already use');
                window.location.href = '../page/addStatus-page.php';
            </script>
            ";
        } else {
            $deleteStatus = "DELETE FROM status WHERE status_id = '$statusId'";
            // $rowlocation = mysqli_query($db, $deleteLocation);

            if($db->query($deleteStatus) === TRUE) {
                echo "
                <script>
                    alert('Status delete Success');
                    window.location.href = '../page/addStatus-page.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Status delete failed');
                    window.location.href = '../page/addStatus-page.php';
                </script>
                ";
            }
        }
    } else {
        echo "
        <script>
            alert('Status not found');
            window.location.href = '../page/addStatus-page.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Status not found');
        window.location.href = '../page/addStatus-page.php';
    </script>
    ";
}