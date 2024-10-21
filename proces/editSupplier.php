<?php

require '../config/config.php';
session_start();

if(isset($_POST['submit'])) {
    $supplierId = $_POST['supplier_id'];
    $supplierName = mysqli_real_escape_string($db, $_POST['editSupplier']);

    $sql = "UPDATE suppliers SET supplier_name = '$supplierName' WHERE supplier_id = '$supplierId'";

    if (mysqli_query($db, $sql)) {
        echo "
        <script>
            alert('Supplier has been edited');
            window.location.href = '../page/addSupplier-page.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Supplier failed to edit');
            window.location.href = '../page/addSupplier-page.php';
        </script>
        ";
    }
}