<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-28
 * Time: 18:32
 */
require 'config.php';
$id = @$_POST['id'];

try {
    $query = ("UPDATE venues SET recommended = (recommended - 1) WHERE ID= \"$id\" ");
    $stmt = $conn->prepare($query);
    $stmt->execute();
    header('Location: /addVenue.php');

} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
}