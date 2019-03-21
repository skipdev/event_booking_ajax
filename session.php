<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-21
 * Time: 13:26
 */
   include('config.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"select name from admin where name = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['name'];

   if(!isset($_SESSION['login_user'])){
       header("location:login.php");
       die();
   }
?>