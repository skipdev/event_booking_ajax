<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-04-02
 * Time: 18:17
 */

session_start();

require 'config.php';
require 'functions.php';

$admin = $_SESSION["admin"];
$loggedIn = session_status() == PHP_SESSION_ACTIVE;
?>

<html>
<head>
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/display.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/updateApproved.js"></script>
</head>
<body>
    <div class="inner">
        <div class="center flex column">
            <?php if($loggedIn && $admin == 1): ?>
                <?php
                    try {
                        $query = "SELECT * FROM reviews ORDER BY id";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll();

                        echo "<table class='reviews_table reviews_table--pending'>";
                        echo "<h2>Pending Reviews...</h2>";

                        echo "<tr>";
                        echo "<th>Venue ID</th>";
                        echo "<th>Username</th>";
                        echo "<th>Review</th>";
                        echo "<th>Approve</th>";
                        echo "</tr>";

                        $i = 0;
                        $noReviews = false;
                        foreach ($result as $key => $value) {
                            if ($value['approved'] == 0) {
                                if ($admin == 1) {
                                    echo "<tr>";
                                    echo "<td class='reviews_table--cell id_cell' id='id_" . $value['ID'] . "'>" . $value['ID'] . "</td>";
                                    echo "<td class='reviews_table--cell' id='venueid_" . $value['ID'] . "'>" . $value['venueID'] . "</td>";
                                    echo "<td class='reviews_table--cell' id='username_" . $value['ID'] . "'>" . $value['username'] . "</td>";
                                    echo "<td class='reviews_table--cell' id='review_" . $value['ID'] . "'>" . $value['review'] . "</td>";
                                    echo "<td class='reviews_table--cell' id='approve-button_" . $value['ID'] . "'><i onClick='updateApproved(" . $value['ID'] . ");' class='fas green fa-check-circle'></i></td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            }
                            else {
                                $noReviews = true;
                            }
                        }
                        if ($noReviews == true) {
                            echo 'No pending reviews.';
                        }
                        echo "</table>";

                    } catch (PDOException $err) {
                        echo "Error: " . $err->getMessage();
                    }
                ?>
            </div>
            <a href="reviews.php">Click here to go back.</a>
        <?php else: ?>
            <h1>Hey there! It seems that you're either not logged in or not an admin...</h1>
            <a href="login.php">Click here to login</a> or <a href="reviews.php">Click here to go back.</a>
        <?php endif; ?>
    </div>
</body>
</html>

