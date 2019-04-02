<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-29
 * Time: 12:08
 */

session_start();

$id = $_POST['id'];
$_SESSION['venueId'] = $id;
