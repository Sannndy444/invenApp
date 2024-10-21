<?php
require '../config/config.php';

if(isset($_GET['supplier_id'])) {
    $supplierId = mysqli_real_escape_string($db, $_GET['supplier_id']);

    $sql = "DELETE FROM suppliers WHERE supplier_id = '$supplierId'";
    $result = mysqli_query($db, $sql);

    if($result) {
        echo "
        <script>
            alert('Supplier has been failed');
            window.location.href = '../page/addSupplier-page.php';
        </script>
        ";
    } else {
        echo "
            alert('Supplier failed to delete');
            window.location.href = ''../page/addSupplier-page.php;
        ";
    }
} else {
    echo "
    <script>
        alert('Supplier not found');
        window.location.href = '../page/addSupplier-page.php';
    </script>
    ";
}