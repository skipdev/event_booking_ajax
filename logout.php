<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-21
 * Time: 13:26
 */
   session_start();

   if(session_destroy()) {
       header("Location: login.php");
   }
?>