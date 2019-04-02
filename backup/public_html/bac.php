<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-25
 * Time: 20:05
 */

require 'config.php';

$createTH = true;
$query = "SELECT * FROM venues ORDER BY id ASC";
$stmt = $conn->prepare($query);

echo "<table>";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if($createTH == ture) {
        echo '<tr>';
        foreach($row as $key=>$value) {
            echo "<th>{$key}</th>";
        }
        echo '</tr>';
        $createTH = false;
    }
    echo "<tr>";
    foreach($row as $value) {
        echo "<td>{$value}</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>