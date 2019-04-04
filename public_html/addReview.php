<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-29
 * Time: 14:48
 */
require 'config.php';

$id = @$_POST['id'];
$username = @$_POST['username'];
$review = @$_POST['review'];
$approved = @$_POST['isApproved'];

$query = ("INSERT INTO reviews (venueID, username, review, approved) VALUES(?,?,?,?)");

$stmt = $conn->prepare($query);
$stmt->execute([$id, $username, $review, $approved]);

header('Location: reviews.php');
