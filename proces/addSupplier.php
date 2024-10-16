<?php
require "../config/config.php";
session_start();

if(isset($_POST['submit'])) {
    $supplierName = $_POST['supplierName'];

    $duplicate = mysqli_query($db, "SELECT supplier_name FROM suppliers WHERE supplier_name = '$supplierName'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "
        <script>
            alert('Supplier already exists');
            window.location.href = '../page/addSupplier-page.php';
        </script>
        ";
    } else {
        $sql = "INSERT INTO suppliers (supplier_name) VALUES ('$supplierName')";
        $result = $db->query($sql);    

        if ($result) {
            echo "
            <script>
                alert('Supplier added successfully');
                window.location.href = '../page/addSupplier-page.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Supplier not added');
            </script>
            ";
        }
    }
}