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

// Set session variable to see if the user is logged in or not
$loggedIn = session_status() == PHP_SESSION_ACTIVE;
$name = $_SESSION["user"];

// Login using data from the login.php form
$username = $_POST["username"];
$query = "SELECT * FROM users WHERE name = ? and password = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$username, $password]);

// Set session variables from the logged in user's information
if ($row = $stmt->fetch()) {
    $_SESSION["user"] = $row['name'];
    $_SESSION["admin"] = $row['isadmin'];
    $_SESSION["username"] = $row['username'];
    redirect('index.php');
} else {
    $output = "Error";
}
?>

<html>
<head>
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/display.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/search.js"></script>
    <script src="js/updateRec.js"></script>
    <script src="js/readMore.js"></script>
</head>
<body>
    <div class="inner">
        <div class="center flex column">

            <!--If the user is logged in, welcome them by name-->
            <?php if($loggedIn && $name !=''): ?>
                <h2 class="index_welcome">Welcome, <?php echo $name ?>!</h2>

                <!--Allow user to search for a venue-->
                <h3>Search for a venue here: </h3>
                <form action="" method="post" class="center generic_form flex column">
                    <p class="generic_label">Venue Type: </p>
                    <input type="text" name="searchData" id='search_field' class="generic_field"/>
                </form>

                <!--Display the AJAX search results-->
                <div id="search_results" style="display: none;"></div>

                <h3>You can add a new venue by clicking <a href="addVenue.php">here</a>.</h3>
                <a href="logout.php">Click to log out</a>

            <!--If the user is not logged in, take them to the login form.-->
            <?php else: ?>
                <h1>Hey there! It seems that you're not logged in...</h1>
                <a href="login.php">Click here to access this page.</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
