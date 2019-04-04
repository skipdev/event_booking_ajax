<?php
/**
 * Created by PhpStorm.
 * User: steppy
 * Date: 2019-03-28
 * Time: 19:16
 */

include("searchResults.php");
//check to see if the user has entered any data
if(isset($_POST["search_field"])){
    //remove any spaces before/after the search query
    $searchVal = trim($_POST["search_field"]);
    //bring in the search class
    $search = new search();
    //parse the data through the search class
    echo $search->searchData($searchVal);
}

?>