function updateRec(id) {
   jQuery.ajax({
      type: "POST",
      url: "updateRec.php",
      data: 'id='+id,
      cache: true,
      success: function(response)
      {
         // alert("Record updated");
         location.reload();
      }
   });
}