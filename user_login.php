<?php
// connect to db
include_once "db_credentials.php";

session_start();

// get username and password from login.php form input values
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// DB QUERY
$query = "SELECT id, username, passw, bg_color FROM users WHERE username = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->bind_result($userId, $dbUsername, $hashedPassword, $bgColor);

// successful or unsuccessful login measures
$error = null;
if ($stmt->fetch()) {
    if (password_verify($password, $hashedPassword)) {
        // Store user information in the session
        $_SESSION['user_id'] = $userId;
        $_SESSION['username'] = $dbUsername;
        $_SESSION['bg_color'] = $bgColor;

        header('Location: dashboard.php');
    } else {
        $error = 'invalid_credentials';
    }
} else {
    $error = 'user_not_found';
}

// close db connection
$stmt->close();
$mysqli->close();

// redirect to loginscreen in the case of an error
if ($error !== null) {
    header("Location: login.php?error=$error");
    exit();
}
