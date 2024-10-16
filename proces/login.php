<?php
require "../config/config.php";

session_start();

if (isset($_POST['submit'])) {
    $userMail = $_POST['userMail'];
    $password = $_POST['password'];

    $sql = "SELECT username, email, password FROM users WHERE username = '$userMail' OR email = '$userMail'";
    $result = $db->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $username = $row['username'];
        $password = $row['password'];

        if ($password == $password) {
            $_SESSION['username'] = $username;
            echo "
            <script>
                alert('Login Successful');
                window.location.href = '../page/home-page.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Login Failed');
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Username or Email not found');
        </script>
        ";
    }
}