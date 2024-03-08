<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    echo "Username: " . $username . "<br>";
    echo "Password: " . $password. "<br>";

    include_once "db_credentials.php";

    $query = "INSERT INTO users (username, passw) VALUES (?, ?)";
    $stmt = $mysqli->prepare($query);

    $options = [
        'cost' => 12,
    ];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

    mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // $_SESSION['success_message'] = "User successfully created.";

    $mysqli->close();
}

header("Location: index.php?user=submitted");