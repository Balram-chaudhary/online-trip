// Activities submit button enable disable
$(document).ready(function(){
    $('#searchactivity').on('change',function(){
    $('.enableOnInputactivities').attr('disabled',true);
    var count=0;
      count++;
     if(count > 0 )
            $('.enableOnInputactivities').attr('disabled', false);            
        else
            $('.enableOnInputactivities').attr('disabled',true);
   
})

   // Activities Search List
  $('.search-box-activity input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var searchactivities = $(this).val();
            var url="{{route('activities.search')}}";
           $.ajax({
              url: url,
              data:{"srhText":searchactivities, "_token": "{{ csrf_token() }}"},   
              method: 'get'
          }).done(function(response){
              $('#activity').html(response); // put the returning html in the 'results' div
          });
        });
        
        // Set search input value on click of result item
        $(document).on("click", ".activity li", function(){
         var activityText = $(this).text();
         document.getElementById('searchactivity').value=activityText;
             $(this).parents(".search-box-activity").find('#searchactivity').val($(this).text()); 
             $(this).parents(".list-group-activity li").empty();
        });

   // Activities Search List
  


});


   


