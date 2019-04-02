function readMore(id) {
   $_SESSION["venueId"] = id;
   redirect('index.php');
}