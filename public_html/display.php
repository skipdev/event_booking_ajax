<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-26
 * Time: 15:38
 */

require 'config.php';
$rowCount = 0;
try {
    $stmt = $conn->prepare("SELECT id, name, type, description, recommended FROM venues");
    $stmt->execute();
    //associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    print "<table class='venues_table'>\n";
    print "<tr>\n";

    foreach ($result[0] as $key => $nothing){
        print "<th>$key</th>";
    }
    print "</tr>";

    $columnCount = 0;
    foreach ($result as $row){
        $rowCount =+ 1;
        print "<tr class='venues_table--row-".$rowCount."'>";
        foreach ($row as $key => $value){
            $columnCount += 1;
            if($columnCount = 4) {
                print "<td class='venues_table--cell venues_table--cell-rec'>$value</td>";
            }
            else if ($columnCount = 0){
                print "<td class='venues_table--cell venues_table--cell-id'>$value</td>";
            }
            else {
                print "<td class='venues_table--cell'>$value</td>";
            }
        }
        print "<td><i class='grey fas fa-heart'></i></td>";
        print "</tr>\n";
    }

    print "</table>\n";

}
catch(PDOException $err) {
    echo "Error: " . $err->getMessage();
}

