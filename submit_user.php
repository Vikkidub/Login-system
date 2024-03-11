<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    /*  // display submitted values
        echo "Username: " . $username . "<br>";
        echo "Password: " . $password. "<br>";
    */
    
    include_once "db_credentials.php";

    // check whether the username is taken
    $check_query = "SELECT username FROM users WHERE username = ?";
    $check_stmt = $mysqli->prepare($check_query);
    mysqli_stmt_bind_param($check_stmt, "s", $username);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    // cancel submission if username is taken
    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        mysqli_stmt_close($check_stmt);
        $mysqli->close();
        header("Location: index.php?Error=Username_taken");
        exit;
    }

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