<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-21
 * Time: 13:20
 */
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'solent_php');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);