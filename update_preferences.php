<?php
session_start();
include_once "db_credentials.php";

// check whether the user is logged in and sends them to login if not
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $newColor = $_POST['new_color'];

    $_SESSION['bg_color'] = $newColor;

    $userId = $_SESSION['user_id'];
    $updateQuery = "UPDATE users SET bg_color = ? WHERE id = ?";
    
    $stmt = $mysqli->prepare($updateQuery);
    $stmt->bind_param('si', $newColor, $userId);
    $stmt->execute();
    $stmt->close();
}

header("Location: dashboard.php");