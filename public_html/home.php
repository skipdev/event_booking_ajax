<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-25
 * Time: 18:50
 */
session_start();
require 'config.php';
$loggedIn = session_status() == PHP_SESSION_ACTIVE;
$name = $_SESSION["user"];
?>

<html>
<head><title>hOme</title></head>
<style>
    html, body {
        margin: 1px;
        border: 0;
    }
</style>
<body>
<div align="center">
    <?php if($loggedIn): ?>
        <p class="index__welcome">Hey there, <?php echo $name ?></p>
        <p class="index__confirmation">You're logged in, woop!</p>
        <a href="logout.php">Click to log out</a>
    <?php else: ?>
        <h1>wut</h1>
        <a href="login.php">Click to log in</a>
    <?php endif; ?>
</div>
</body>
</html>
