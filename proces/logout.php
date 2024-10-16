<?php
require '../config/config.php';

session_start();
session_destroy();
header('Location: ../pages/login-page.php');
exit();