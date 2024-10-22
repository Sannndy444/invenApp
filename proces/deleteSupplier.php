<?php

require '../config/config.php';
session_start();

if(isset($_GET['supplier_id'])) {
    $supplierId = mysqli_real_escape_string($db, $_GET['supplier_id']);

    $use_sql = "SELECT COUNT(*) AS item_id FROM items WHERE supplier_id = '$supplierId'";
    $result = mysqli_query($db, $use_sql);

    if ($result) {
        $row = $result->fetch_assoc();

        if ($row['item_id'] > 0) {
            echo "
            <script>
                alert('Supplier already use');
                window.location.href = '../page/addSupplier-page.php';
            </script>
            ";
        } else {
            $deleteSupplier = "DELETE FROM suppliers WHERE supplier_id = '$supplierId'";
            // $rowlocation = mysqli_query($db, $deleteLocation);

            if($db->query($deleteSupplier) === TRUE) {
                echo "
                <script>
                    alert('Supplier delete Success');
                    window.location.href = '../page/addSupplier-page.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Supplier delete failed');
                    window.location.href = '../page/addSupplier-page.php';
                </script>
                ";
            }
        }
    } else {
        echo "
        <script>
            alert('Supplier not found');
            window.location.href = '../page/addSupplier-page.php';
        </script>
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