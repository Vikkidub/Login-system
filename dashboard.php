<link rel="stylesheet" href="dashboard.css">

<?php
session_start();

if (isset ($_GET['joke'])) {
    $joke = urldecode($_GET['joke']);
} else {
    $joke = 'Tell me a joke';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            background-color:
                <?php echo $_SESSION['bg_color']; ?>
            ;
            color:
                <?php echo ($_SESSION['bg_color'] === 'black') ? 'white' : 'black'; ?>
            ;
        }
    </style>
</head>

<body>
    <?php
    echo "username and password is correct" . "<br><br>";
    echo "<h1>Welcome {$_SESSION['username']}</h1>";
    echo "Your preferences: Background color = " . $_SESSION['bg_color'];
    ?>
    </br></br>
    
    <div>Edit preferences:</div>
    <form method="post" action="update_preferences.php">
        <label for="new_color">Enter new background color:</label>
        <input type="text" id="new_color" name="new_color" required>
        <button type="submit">Update Color</button>
    </form>
    </br>

    <!-- Get joke from https://icanhazdadjoke.com/ -->
    <div>
        <?php echo $joke; ?>
    </div>
    <form method="post" action="api_get_joke.php">
        <button type="submit">Get joke</button>
    </form>

    <!-- Return to loginscreen -->
    </br>
    <div>Log out</div>
    <form method="post" action="index.php">
        <button type="submit">Exit</button>
    </form>
</body>

</html>