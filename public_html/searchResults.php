<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-28
 * Time: 19:03
 */

include("config.php");
class search {
    public function searchData($userInput){
        try {
            $conn = new PDO("mysql:host=localhost;dbname=assign150;", 'assign150', 'oob8Ce0h');
            $stmt = $conn->prepare("SELECT * FROM `venues` WHERE `type` like :userInput");
            //bind the user's input to a variable named $input, then bind this to the search query
            $input = "%$userInput%";
            $stmt->bindParam(':userInput', $input , PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            echo "Total results found: $count.<br>";
            $result = "";
            //return a table of results
            echo "<table><tr><th>Name</th><th>Type</th><th>Description</th><th>Username</th><th>Recommend?</th><th></th></tr>";
            if ($count  > 0){
                while($value = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id = "<tr><td class='venues_table--cell id_cell search_result' id='id_".$value['ID']."'>" . $value['ID'] . "</td>";
                    $name = "<td class='venues_table--cell' id='name_".$value['ID']."'>" . $value['name'] . "</td>";
                    $type = "<td class='venues_table--cell' id='type_".$value['ID']."'>" . $value['type'] . "</td>";
                    $desc = "<td class='venues_table--cell' id='desc_".$value['ID']."'>" . $value['description'] . "</td>";
                    $username = "<td class='venues_table--cell' id='user_".$value['ID']."'>" . $value['username'] . "</td>";
                    $rec = "<td class='venues_table--cell recommended_cell' id='rec_".$value['ID']."'>" . $value['recommended'] . "</td>";
                        //heart which is clicked to add one to the recommendation value
                    $heart =  "<td><i class='grey fas fa-heart' id='heart_".$value['ID']."' onClick='updateRec(".$value['ID'].");'></i></td></tr>";
                        //a button which takes you to the reviews page for this particular venue
                    $more = "<td class='read-more_cell' onClick='readMore(".$value['ID'].");' id='more_".$value['ID']."'>Reviews -></td>";
                    $result = $result.$id.$name.$type.$desc.$username.$rec.$heart.$more;
                }
                return $result;
            }
            echo "</table>";
        }
        catch (PDOException $err) {
            echo 'Error: ' . $err->getMessage();
        }
    }
}
?>