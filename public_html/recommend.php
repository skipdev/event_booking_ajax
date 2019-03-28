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
        echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
        echo "<script>
        document.getElementById('heart_" . $value['ID'] . "').onclick = function() {
            if (document.getElementById('heart_" . $value['ID'] . "').classList.contains('green')) {
                document.getElementById('heart_" . $value['ID'] . "').classList.remove('green');
                document.getElementById('heart_" . $value['ID'] . "').classList.add('grey');
                jQuery.ajax({
                type: 'POST',
                url: 'minusOne.php',
                data: 'id='+" . $value['ID'] . ",
                cache: false,
                success: function(response) {
                 window.location.reload();
                }
            });
            }
            else {
                document.getElementById('heart_" . $value['ID'] . "').classList.remove('grey');
                document.getElementById('heart_" . $value['ID'] . "').classList.add('green');
                jQuery.ajax({
                type: 'POST',
                url: 'addOne.php',
                data: 'id='+" . $value['ID'] . ",
                cache: false,
                success: function(response) {
                    window.location.reload();
                }
            });
            }
       };
        </script>";

        $i++;
    }

} catch (PDOException $err) {
    echo "Error: " . $err->getMessage();
}