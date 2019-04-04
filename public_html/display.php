<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-26
 * Time: 15:38
 */
require 'config.php';
?>
<html>
<head>
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/display.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/readMore.js"></script>
    <script src="js/updateRec.js"></script>
</head>
<body>
<div class="inner">
    <div class="center flex column">
        <?php
        try {
            $query = "SELECT * FROM venues";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();

            echo "<table class='venues_table'>";

            // Create table headers
            echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Type</th>";
                echo "<th>Description</th>";
                echo "<th>Username</th>";
                echo "<th>Recommend?</th>";
            echo "</tr>";

            $i = 0;
            foreach ($result as $key => $value) {
                echo "<tr>";

                    // Displays all records from the venues table, assigns them unique ids.
                    echo "<td class='venues_table--cell id_cell' id='id_".$value['ID']."'>" . $value['ID'] . "</td>";
                    echo "<td class='venues_table--cell' id='name_".$value['ID']."'>" . $value['name'] . "</td>";
                    echo "<td class='venues_table--cell' id='type_".$value['ID']."'>" . $value['type'] . "</td>";
                    echo "<td class='venues_table--cell' id='desc_".$value['ID']."'>" . $value['description'] . "</td>";
                    echo "<td class='venues_table--cell' id='user_".$value['ID']."'>" . $value['username'] . "</td>";
                    echo "<td class='venues_table--cell recommended_cell' id='rec_".$value['ID']."'>" . $value['recommended'] . "</td>";

                    // Allows people to recommend and read reviews for each venue
                    echo "<td><i onClick='updateRec(".$value['ID'].");' class='grey fas fa-heart' id='heart_".$value['ID']."'></i></td>";
                    echo "<td class='read-more_cell' onClick='readMore(".$value['ID'].");' id='more_".$value['ID']."'>Reviews -></td>";
                echo "</tr>";
                $i++;
            }
            echo "</table>";

        } catch (PDOException $err) {
            echo "Error: " . $err->getMessage();
        }
        ?>
        <a href="index.php">Click here to go back.</a>
    </div>
</div>
</body>
</html>


