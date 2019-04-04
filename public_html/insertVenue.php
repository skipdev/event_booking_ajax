<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-26
 * Time: 14:33
 */

require 'config.php';

$name = @$_POST["venueName"];
$type = @$_POST["venueType"];
$description = @$_POST["venueDesc"];
$recommended = 0;
$username = @$_POST["username"];

$query = "INSERT INTO venues (name, type, description, recommended, username) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$name, $type, $description, $recommended, $username]);

header('Location: addVenue.php');