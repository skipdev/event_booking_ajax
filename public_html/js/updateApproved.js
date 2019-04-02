function updateApproved(id) {
   jQuery.ajax({
      type: "POST",
      url: "updateApproved.php",
      data: 'id='+id,
      cache: true,
      success: function(response)
      {
         alert("Record updated");
      }
   });
}