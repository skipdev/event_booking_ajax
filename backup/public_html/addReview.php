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

$stmt = $conn->prepare("INSERT INTO reviews (venueID, username, review, approved) VALUES(:id, :username, :review, :approved)");

$stmt->bindparam(':id', $id);
$stmt->bindparam(':username', $username);
$stmt->bindparam(':review', $review);
$stmt->bindparam(':approved', $approved);

$stmt->execute();

header('Location: reviews.php');
