<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-27
 * Time: 14:57
 */

//Allows user to recommend a place

require 'config.php';

try {
    $query = "SELECT * FROM venues";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $i = 0;
    foreach ($result as $key => $value) {

        // When a heart is clicked, change it to green and add one to the recommended counter
        echo "<script>
        document.getElementById('heart_" . $value['ID'] . "').onclick = function() {
            document.getElementById('heart_" . $value['ID'] . "').classList.toggle('grey');
            document.getElementById('heart_" . $value['ID'] . "').classList.toggle('green');
            if (document.getElementById('heart_" . $value['ID'] . "').classList.contains('green')) {
                //goon1
            }
            else {
                //goon2
            }
        };
        </script>";

        $i++;
    }

} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
}