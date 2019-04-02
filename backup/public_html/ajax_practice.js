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

// recommend
// <a class="button" id="press_me">Press Me</a>
// <script>
// $(function (){
//    $('#press_me').click(function(){
//       var request = $.ajax({
//          type: "POST",
//          url: "server_code_increment.php"
//       });
//       request.done(function( msg ) {
//
//          alert('Success');
//          return;
//
//       });
//       request.fail(function(jqXHR, textStatus) {
//          alert( "Request failed: " + textStatus );
//       });
//    });
// });
// </script>
// server_code_increment.php
//
// <?php
//    // Connection to database
//    $connection=mysqli_connect("localhost","root","","test");
// // Check connection
// if (mysqli_connect_errno())
// {
//    echo 'NOT_OK';
//    //echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }
//
// // Increasing the current value with 1
// mysqli_query($connection,"UPDATE articles SET amount = (amount + 1)
// WHERE id='1'");
//
// mysqli_close($connection);
//
// echo 'OK';   ?>
