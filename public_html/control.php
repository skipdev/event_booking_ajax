<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-28
 * Time: 19:16
 */

include("searchResults.php");
if(isset($_POST["search_field"])){

    $searchVal = trim($_POST["search_field"]);
    $search = new search();
    echo $search->searchData($searchVal);
}

?>