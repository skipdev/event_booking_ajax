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
                <p class="index_welcome">Hey there, <?php echo $name ?>!</p>

                <!--Allow user to search for a venue-->
                <p>Search for a venue here: </p>
                <form action="" method="post" class="center generic_form flex column">
                    <p class="generic_label">Venue Name: </p>
                    <input type="text" name="venueDesc" class="generic_field"/>
                    <!--TODO: Implement AJAX-->
                    <input type="submit" name='submit' value="Search →" class='generic_button generic_field'/>
                </form>

                <!--Allow user to add a new venue-->
                <p>You can add a new venue below: </p>
                <form action="" method="post" class="center generic_form flex column">
                    <p class="generic_label">Venue Name: </p>
                    <input type="text" name="venueName" class="generic_field">
                    <p class="generic_label">Venue Type: </p>
                    <select name="venueType" class="generic_field generic_dropdown">
                        <option value="null">Please Select: ↓</option>
                        <option value="Restaurant">Restaurant</option>
                        <option value="Bar">Bar</option>
                        <option value="Pub">Pub</option>
                        <option value="Café">Café</option>
                        <option value="Fast Food">Fast Food</option>
                        <option value="Club">Club</option>
                    </select>
                    <p class="generic_label">Description: </p>
                    <input type="text" name="venueDesc" class="generic_field"/>
                    <input type="submit" name='submit' value="Submit →" class='generic_button generic_field'/>
                </form>

                <a href="logout.php">Click to log out</a>
            <?php else: ?>
                <h1>Hey there! It seems that you're not logged in...</h1>
                <a href="login.php">Click here to access this page.</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
