<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-26
 * Time: 15:38
 */

require 'config.php';

try {
    $query = "SELECT * FROM venues";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();

    echo "<table class='venues_table'>";
    
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
            echo "<td class='venues_table--cell id_cell' id='id_".$value['ID']."'>" . $value['ID'] . "</td>";
            echo "<td class='venues_table--cell' id='name_".$value['ID']."'>" . $value['name'] . "</td>";
            echo "<td class='venues_table--cell' id='type_".$value['ID']."'>" . $value['type'] . "</td>";
            echo "<td class='venues_table--cell' id='desc_".$value['ID']."'>" . $value['description'] . "</td>";
            echo "<td class='venues_table--cell' id='user_".$value['ID']."'>" . $value['username'] . "</td>";
            echo "<td class='venues_table--cell recommended_cell' id='rec_".$value['ID']."'>" . $value['recommended'] . "</td>";
            echo "<td><i onClick='updateRec(".$value['ID'].");' class='grey fas fa-heart' id='heart_".$value['ID']."'></i></td>";
        echo "</tr>";
        $i++;
    }
    echo "</table>";

} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
}


