<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-29
 * Time: 10:53
 */

require 'config.php';
$id = @$_POST['id'] ;

$stmt = $conn->prepare("UPDATE reviews SET approved = 1 WHERE id = '$id'");
$result = $stmt->execute();

header('Location: reviews.php');