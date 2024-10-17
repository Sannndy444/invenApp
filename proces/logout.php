<?php
require '../config/config.php';

session_start();
session_destroy();
header('Location: ../page/login-page.php');
exit();