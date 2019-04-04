function insertVenue(username) {
   let venueName = $('#venueName').serialize();
   let venueType = $('#venueType').serialize();
   let venueDesc = $('#venueDesc').serialize();
   jQuery.ajax({
      type: "POST",
      url: "insertVenue.php",
      data: "venueName=" + venueName.substr(10) + "&venueType=" + venueType.substr(10) + "&venueDesc=" + venueDesc.substr(10) + "&username=" + username,
      cache: true,
      success: function (response) {
         location.reload();
      }
   });
}