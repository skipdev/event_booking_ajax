<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-29
 * Time: 12:11
 */

session_start();

require 'config.php';
require 'functions.php';

// Set session variables in order to add this information to a review
$venueId = $_SESSION["venueId"];
$username = $_SESSION["username"];
$admin = $_SESSION["admin"]

?>

<html>
<head>
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/display.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/addReview.js"></script>
    <script src="js/updateApproved.js"></script>
</head>
<body>
    <div class="inner">
        <div class="center flex column">

            <?php
            require 'config.php';
            // Get the venue name and type from the session variable $venueId.
            $query = "SELECT * FROM venues WHERE ID = $venueId";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $key => $value) {
                echo "<h1 class='reviews_title'>" . $value['name'] . " - " .  $value['type'] . "</h1>";
            }
            ?>

            <!--Allow user to add a review-->
            <form action="" method="post" class="center generic_form flex column" id="insert_form">
                <p class="generic_label">Add a review:</p>
                <input type="text" name="review" class="generic_field" id="user_review"/>
                <button type='button' name='submit' value="Add Review +" id='insert_button' class='generic_button generic_field'
                        onClick="addReview(<?php echo $venueId .", '". $username ."', ". $admin ?>);">
                        <!--Above statement sends to AJAX the venue id, user's name, and whether the user is an admin or not-->
                </button><br/>
            </form>

            <?php
                try {
                    // Select everything from the reviews table
                    $query = "SELECT * FROM reviews WHERE venueID = $venueId ORDER BY id";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();

                    echo "<table class='reviews_table'>";
                    echo "<h2 class='reviews_table--title'>Reviews</h2>";

                    echo "<tr>";
                    echo "<th>Venue ID</th>";
                    echo "<th>Username</th>";
                    echo "<th>Review</th>";
                    echo "</tr>";

                    $i = 0;
                    foreach ($result as $key => $value) {
                        // Output the approved reviews in a table
                        if ($value['approved'] == 1) {
                            echo "<tr>";
                            echo "<td class='reviews_table--cell id_cell' id='id_" . $value['ID'] . "'>" . $value['ID'] . "</td>";
                            echo "<td class='reviews_table--cell' id='venueid_" . $value['ID'] . "'>" . $value['venueID'] . "</td>";
                            echo "<td class='reviews_table--cell' id='username_" . $value['ID'] . "'>" . $value['username'] . "</td>";
                            echo "<td class='reviews_table--cell' id='review_" . $value['ID'] . "'>" . $value['review'] . "</td>";
                            echo "</tr>";
                            $i++;
                        }
                    }

                    echo "</table>";

                    echo "<table class='reviews_table reviews_table--pending'>";
                    echo "<h2 class='reviews_table--title'>Pending Reviews...</h2>";
                    if (empty($results)) {
                        echo 'No pending reviews for this venue.';
                    } else {
                        echo "<tr>";
                        echo "<th>Venue ID</th>";
                        echo "<th>Username</th>";
                        echo "<th>Review</th>";
                        echo "<th>Approve</th>";
                        echo "</tr>";

                        $i = 0;

                        foreach ($result as $key => $value) {
                            // Output the non-approved reviews in a table
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
                        }
                    }
                    echo "</table>";
                    echo "<a href='pending.php'>Click here to see all pending reviews.</a>";

                } catch (PDOException $err) {
                    echo "Error: " . $err->getMessage();
                }
            ?>
        </div>
        <a href="index.php">Click here to go back.</a>
    </div>
</body>
</html>

