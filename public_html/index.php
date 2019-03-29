<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-25
 * Time: 18:50
 */
session_start();
require 'config.php';
require 'functions.php';

$loggedIn = session_status() == PHP_SESSION_ACTIVE;
$name = $_SESSION["user"];

$username = $_POST["username"];
$query = "SELECT * FROM users WHERE name = ? and password = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$username, $password]);

if ($row = $stmt->fetch()) {
    $_SESSION["user"] = $row['name'];
    $_SESSION["admin"] = $row['isadmin'];
    redirect('index.php');
} else {
    $output = "Hi";
//    alert($output);
//    redirect('login.php');
}
?>

<html>
<head>
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/display.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
       $(document).ready(function() {
             $('#search_field').unbind().keyup(function(e) {
                   let value = $(this).val();
                   if (value.length>0) {
                      searchData(value);
                   }
                   else {
                      $('#search_results').hide();
                   }
                }
             );
          }
       );
       function searchData(val){
          $('#search_results').show();
          $('#search_results').html('<div><img src="https://loading.io/spinners/double-ring/lg.double-ring-spinner.gif" width="50px;" height="50px"> <span class="wait_text">Please Wait...</span></div>');
          $.post('control.php',{
                'search_field': val}
             , function(data){
                if(data != "")
                   $('#search_results').html(data);
                else
                   $('#search_results').html("<div class='search-result'>No Result Found...</div>");
             }
          ).fail(function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
             }
          );
       }
    </script>
</head>
<body>
    <div class="inner">
        <div class="center flex column">

            <!--If the user is logged in, welcome them by name-->
            <?php if($loggedIn): ?>
                <h2 class="index_welcome">Welcome, <?php echo $name ?>!</h2>

                <!--Allow user to search for a venue-->
                <h3>Search for a venue here: </h3>
                <form action="" method="post" class="center generic_form flex column">
                    <p class="generic_label">Venue Type: </p>
                    <input type="text" name="searchData" id='search_field' class="generic_field"/>
                </form>

                <div id="search_results" style="border:solid 1px #BDC7D8;display:none; ">
                </div>

                <h3>You can also add a new venue by clicking <a href="addVenue.php">here</a>.</h3>

                <a href="logout.php">Click to log out</a>
            <?php else: ?>
                <h1>Hey there! It seems that you're not logged in...</h1>
                <a href="login.php">Click here to access this page.</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
