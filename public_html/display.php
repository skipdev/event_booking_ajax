<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-26
 * Time: 15:38
 */

require 'config.php';
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT name, type, description, recommended FROM venues");
    $stmt->execute();
    //associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    print "<table class='venues_table'>\n";
    print "<tr>\n";

    foreach ($result[0] as $key => $useless){
        print "<th>$key</th>";
    }
    print "</tr>";

    foreach ($result as $row){
        print "<tr>";
        foreach ($row as $key => $val){
            print "<td class='venues_table--cell'>$val</td>";
        }
        print "<td><i class='grey fas fa-heart'></i></td>";
        print "</tr>\n";
    }

    print "</table>\n";

}
catch(PDOException $err) {
    echo "Error: " . $err->getMessage();
}

