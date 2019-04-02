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
include 'insertVenue.php';

$loggedIn = session_status() == PHP_SESSION_ACTIVE;
?>

<html>
<head>
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/display.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/updateRec.js"></script>
</head>
<body>
<div class="inner">
    <div class="center flex column">
        <?php if($loggedIn): ?>

        <!--Allow user to add a new venue-->
        <h1>Add a new Venue</h1>
        <form action="" method="post" class="center generic_form flex column" id="addVenue">
            <p class="generic_label">Venue Name: </p>
            <input type="text" name="venueName" class="generic_field">
            <p class="generic_label">Venue Type: </p>
            <select name="venueType" class="generic_field generic_dropdown">
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
        <?php include 'display.php' ?>
        <a href="index.php">Back to search</a>
        <a href="logout.php">Click to log out</a>
        <?php else: ?>
            <h1>Hey there! It seems that you're not logged in...</h1>
            <a href="login.php">Click here to access this page.</a>
        <?php endif; ?>
    </div>
</div>

<?php include 'recommend.php' ?>

</body>
</html>
