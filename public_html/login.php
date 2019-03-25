<?php
    /**
    * Created by PhpStorm.
    * User: steppy
    * Date: 2019-03-22
    * Time: 14:57
    */

require 'config.php';
require 'functions.php';
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM users WHERE name = ? and password = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$username, $password]);

if ($row = $stmt->fetch()) {
    $_SESSION["user"] = $row['name'];
    $_SESSION["admin"] = $row['isadmin'];
    redirect('index.php');
} else {
    $output = "Sorry it's not right lol";
    alert($output);
}
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="center flex">
        <form action="" method="post" class="center login_form flex column">
            <p class="generic_label">Username</p>
            <input type="text" name="username" class="login_field" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>"/>
            <p class="generic_label">Password</p>
            <input type="password" name="password" class="login_field" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>"/>
            <input type="submit" name='login' value="Login →" class='login_button login_field'/><br />
        </form>
    </div>
</body>
</html>