<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-25
 * Time: 18:50
 */
session_start();
require 'config.php';
require 'functions.php';

$loggedIn = session_status() == PHP_SESSION_ACTIVE;
$name = $_SESSION["user"];

$username = $_POST["username"];
$query = "SELECT * FROM users WHERE name = ? and password = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$username, $password]);

if ($row = $stmt->fetch()) {
    $_SESSION["user"] = $row['name'];
    $_SESSION["admin"] = $row['isadmin'];
    redirect('index.php');
} else {
    $output = "Hi";
//    alert($output);
//    redirect('login.php');
}
?>

<html>
<head>
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="css/general.css">
</head>
<body>
    <div class="inner">
        <div class="center flex column">

            <!--If the user is logged in, welcome them by name-->
            <?php if($loggedIn): ?>
                <h2 class="index_welcome">Welcome, <?php echo $name ?>!</h2>

                <!--Allow user to search for a venue-->
                <h3>Search for a venue here: </h3>
                <form action="" method="post" class="center generic_form flex column">
                    <p class="generic_label">Venue Name: </p>
                    <input type="text" name="venueDesc" class="generic_field"/>
                    <!--TODO: Implement AJAX-->
                    <input type="submit" name='submit' value="Search →" class='generic_button generic_field'/>
                </form>

                <h3>You can also add a new venue by clicking <a href="addVenue.php">here</a>.</h3>

                <a href="logout.php">Click to log out</a>
            <?php else: ?>
                <h1>Hey there! It seems that you're not logged in...</h1>
                <a href="login.php">Click here to access this page.</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
