<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "inven_db";

$db = new mysqli($server, $username, $password, $database);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}