function addReview(id, username, isApproved) {
   let reviewInput = $('#user_review').serialize();
   let review = reviewInput.substr(7);
   jQuery.ajax({
      type: "POST",
      url: "addReview.php",
      data: "id=" + id + "&username=" + username + "&review=" + review + "&isApproved=" + isApproved,
      cache: true,
      success: function (response) {
         alert('Review Submitted');
         location.reload();
      }
   });
}