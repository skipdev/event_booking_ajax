$(document).ready(function() {
      //Display search results when the user starts typing, otherwise hide the results div.
      $('#search_field').unbind().keyup(function(e) {
            let value = $(this).val();
            if (value.length>0) {
               searchData(value);
            }
            else {
               $('#search_results').hide();
            }
         }
      );
   }
);
function searchData(val){
   $('#search_results').show();
   //Show a loading spinner before the results show
   $('#search_results').html('<div><img src="https://loading.io/spinners/double-ring/lg.double-ring-spinner.gif" width="50px;" height="50px"> <span class="wait_text">Loading...</span></div>');
   //Send user input to the control file
   $.post('control.php', {'search_field': val}, function(data) {
         //If the data isnt empty, show results, otherwise display 'No results found...'
         if(data != "")
            $('#search_results').html(data);
         else
            $('#search_results').html("<div class='search-result'>No Results Found...</div>");
      })
      //If it fails, throw an error
      .fail(function(xhr, ajaxOptions, thrownError) {
         alert(thrownError);
      }
   );
}