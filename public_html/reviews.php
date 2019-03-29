<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-29
 * Time: 12:11
 */

session_start();

require 'config.php';
require 'functions.php';

$venue = $_SESSION["venueId"];
?>

<html>
<head>
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/display.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="inner">
        <div class="center flex column">
                <h2 class="index_welcome">Venue: <?php echo $venue ?>!</h2>
        </div>
    </div>
</body>
</html>
