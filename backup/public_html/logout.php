<?php
    /**
    * Created by PhpStorm.
    * User: steppy
    * Date: 2019-03-22
    * Time: 15:04
    */
    require 'functions.php';
    session_start();
    session_unset();
    session_destroy();
    redirect('login.php');
?>