function updateRec(id) {
   jQuery.ajax({
      type: "POST",
      url: "update.php",
      data: 'id='+id,
      cache: true,
      success: function(response)
      {
         alert("Record updated");
      }
   });
}