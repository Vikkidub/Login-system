<?php
$db_host = "localhost";
$db_user = "user";
$db_pass = "";
$db_name = "user";

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($mysqli->connect_error) {
    die("Connection error: " . $mysqli->connect_error);
}

