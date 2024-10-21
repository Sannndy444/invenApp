<?php
require '../config/config.php';

if(isset($_GET['type_id'])) {
    $typeId = mysqli_real_escape_string($db, $_GET['type_id']);

    $sql = "DELETE FROM types WHERE type_id = '$typeId'";
    $result = mysqli_query($db, $sql);

    if($result) {
        echo "
        <script>
            alert('Type has been delete');
            window.location.href = '../page/addType-page.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Type failed to delete');
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