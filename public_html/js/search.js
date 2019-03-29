$(document).ready(function() {
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
   $('#search_results').html('<div><img src="https://loading.io/spinners/double-ring/lg.double-ring-spinner.gif" width="50px;" height="50px"> <span class="wait_text">Please Wait...</span></div>');
   $.post('control.php',{
         'search_field': val}
      , function(data){
         if(data != "")
            $('#search_results').html(data);
         else
            $('#search_results').html("<div class='search-result'>No Result Found...</div>");
      }
   ).fail(function(xhr, ajaxOptions, thrownError) {
         alert(thrownError);
      }
   );
}