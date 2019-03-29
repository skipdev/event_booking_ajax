function readMore(id){
   jQuery.ajax({
      type: "POST",
      url: "readMore.php",
      data: 'id='+id,
      cache: true,
      success: function(response)
      {
         window.location = "reviews.php";
      }
   });
}