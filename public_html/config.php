<?php
    /**
    * Created by PhpStorm.
    * User: steppy
    * Date: 2019-03-22
    * Time: 14:19
    */
    $host = 'localhost';
    $user = 'assign150';
    $password = 'oob8Ce0h';
    $dbname = 'assign150';

    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $password);
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $password);
    }
    catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
?>
