<?php
require "../config/config.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $result = $db->query($sql);

    $duplicate = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "
        <script>
            alert('Username already exists');
            window.location.href = '../pages/signup-page.php';
        </script>
        ";
    } else {
        if ($result) {
            echo "
            <script>
                alert('Sign Up Successful');
                window.location.href = '../pages/login-page.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Sign Up Failed');
            </script>
            ";
        }
    }

    
}
?>