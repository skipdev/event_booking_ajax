<?php

/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-25
 * Time: 18:56
 * @param $output
 */

function alert($output) {
    echo "<script type='text/javascript'>alert('$output');</script>";
}

function redirect($page) {
    header('Location: ' . $page);
    exit();
}

function console_log($output) {
    echo "<script>console.log( 'Debug: " . $output . "' );</script>";
}