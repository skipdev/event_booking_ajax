<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-26
 * Time: 14:33
 */
$name = $_POST["venueName"];
$type = $_POST["venueType"];
$description = $_POST["venueDesc"];
$recommended = 0;
$username = $_SESSION["user"];

$query = "INSERT INTO reviews (name, type, description, recommended, username) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$name, $type, $description, $recommended, $username]);
