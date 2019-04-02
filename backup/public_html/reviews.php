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

$venueId = $_SESSION["venueId"];
$username = $_SESSION["username"];
$admin = $_SESSION["admin"];

?>

<html>
<head>
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/display.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/addReview.js"></script>
</head>
<body>
    <div class="inner">
        <div class="center flex column">
            <form action="" method="post" class="center generic_form flex column" id="insert_form">

                <?php
                $query = "SELECT * FROM venues WHERE ID = $venueId";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->fetchAll();
                while($row = $stmt->fetchAll()) {
                echo "Name: " . $row["name"] . "<br>Type: " . $row["type"] . "<br>Description:" . $row["description"];} ?>

                <p class="generic_label">Add a review:</p>
                <input type="text" name="review" class="generic_field" id="user_review"/>
                <button type='button' name='submit' value="Add Review +" id='insert_button' class='generic_button generic_field' onClick="addReview(<?php echo $venueId .", '". $username ."', ". $admin ?>);"></button><br />
            </form>

            <?php
                try {
                    $query = "SELECT * FROM reviews WHERE venueID = $venueId ORDER BY id";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();

                    echo "<table class='reviews_table'>";

                    echo "<tr>";
                    echo "<th>Venue ID</th>";
                    echo "<th>Username</th>";
                    echo "<th>Review</th>";
                    echo "<th>Approved</th>";
                    if ($admin == 1) {
                        echo "<th>s</th>";
                    }
                    echo "</tr>";

                    $i = 0;
                    foreach ($result as $key => $value) {
                        if ($value['approved'] == 0) {
                            if ($admin == 1) {
                                echo "<tr>";
                                echo "<td class='reviews_table--cell id_cell' id='id_" . $value['ID'] . "'>" . $value['ID'] . "</td>";
                                echo "<td class='reviews_table--cell' id='venueid_" . $value['ID'] . "'>" . $value['venueID'] . "</td>";
                                echo "<td class='reviews_table--cell' id='username_" . $value['ID'] . "'>" . $value['username'] . "</td>";
                                echo "<td class='reviews_table--cell' id='review_" . $value['ID'] . "'>" . $value['review'] . "</td>";
                                echo "<td class='reviews_table--cell' id='approved_" . $value['ID'] . "'>" . $value['approved'] . "</td>";
                                echo "<td class='reviews_table--cell' id='approve-button_" . $value['ID'] . "'>click</td>";
                                echo "</tr>";
                                $i++;
                            }
                        }
                        else {
                            echo "<tr>";
                            echo "<td class='reviews_table--cell id_cell' id='id_" . $value['ID'] . "'>" . $value['ID'] . "</td>";
                            echo "<td class='reviews_table--cell' id='venueid_" . $value['ID'] . "'>" . $value['venueID'] . "</td>";
                            echo "<td class='reviews_table--cell' id='username_" . $value['ID'] . "'>" . $value['username'] . "</td>";
                            echo "<td class='reviews_table--cell' id='review_" . $value['ID'] . "'>" . $value['review'] . "</td>";
                            echo "<td class='reviews_table--cell' id='approved_" . $value['ID'] . "'>" . $value['approved'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    echo "</table>";

                } catch (PDOException $err) {
                    echo "Error: " . $err->getMessage();
                }
            ?>
        </div>
        <a href="index.php">Click here to go back.</a>
    </div>
</body>
</html>

