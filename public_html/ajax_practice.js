// insert:
//    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
//    $(document).ready(function() {
//       $("#addVenue").submit(function(e) {
//          e.preventDefault();
//          $.ajax( {
//             url: "insertVenue.php",
//             method: "post",
//             data: $("form").serialize(),
//             dataType: "text",
//             success: function(strMessage) {
//                $("#message").text(strMessage);
//                $("#addVenue")[0].reset();
//             }
//          });
//       });
//    });
// </script>