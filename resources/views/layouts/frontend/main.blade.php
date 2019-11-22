@yield('content')
<!-- footer start here -->
<div class="footerdiv">
	<div class="col-sm-12 footer-top">
         <div class="col-sm-offset-3 col-sm-8 footer-Subscribe">
			<form action="#" method="post">
				<input type="email" placeholder="Enter Your Email Address" name="email" required="">
				<input type="submit" value="Subscribe">
			</form>
		  </div>
    
   </div>

<div class=" col-sm-12 footerlink">
<div class="col-sm-12 footerlinks">
        <a href="#aboutus" data-toggle="collapse">About Us</a>
        <a  href="#OurProduct" data-toggle="collapse">Our Product</a>
        <a href="#Feedback" data-toggle="collapse">Feedback</a>
</div>        


        <div class="col-sm-12 collapse  collapse1" id="aboutus">
        about us If your spaces turn into strange symbols on the web browser. 
        </div>
       

       <div class="col-sm-12 collapse  collapse1" id="OurProduct">
       	<div class="OurProduct">
       	<a href="#">Hotels</a>
       	<a href="#">Home Stays</a>
       	<a href="#">Flights</a>
       	<a href="#">Activities</a>
       	<a href="#">Buses</a>
       	<a href="#"> Car Rentals</a>
       </div>
        </div>
        

        <div class=" col-sm-12 collapse  collapse1" id="Feedback">
        	
       <form  enctype="multipart/form-data" class="form-horizontal" action="#">
     

      <div class="col-sm-offset-1 col-sm-3">
       	<div class="form-group">
       		<input type="text" class="form-control" value=""  placeholder=" Email">
       		<input type="text" class="form-control"  placeholder="First Name">
       	</div>
      </div>
      
      <div class="col-sm-offset-1 col-sm-3">

       	<div class="form-group">
       		<input type="text" class="form-control"  placeholder="Country">
       		<input type="text" class="form-control"  placeholder="Last Name">
       </div>
</div>
  
<div class="col-sm-offset-1 col-sm-3">
       	<div class="form-group">
            <input type="text" class="form-control"  placeholder="Phone Number(optional)"> 
           <textarea class="form-control" placeholder="Your comment">   </textarea>   		
       	</div>
</div>

<div class="col-sm-2 feedbacksubmit">
<div class="form-group ">
  <button type="submit" class="form-control" value="Submit">submit</button>
</div>
</div>

       </form>


        </div>

     

      
      
   <div class=" col-sm-12 footerlinks">

     <a href="#Coustomercare" data-toggle="collapse">Coustomer care</a>
     <a href="#Partnerwithtriporbitz" data-toggle="collapse">Partner with triporbitz</a>
     <a href="#QuickLinks" data-toggle="collapse">Quick Links</a>
 </div>
     
     <div class="col-sm-12 collapse  collapse1" id="Coustomercare">
     	<div class="OurProduct">
       	<a href="#">Policy</a>
       	<a href="#">Term and condition</a>
       </div>
     </div>
     <div class=" col-sm-12 collapse  collapse1" id="Partnerwithtriporbitz">
     	
    <div class="OurProduct">
       	<a href="#">List your Hotels</a>
       	<a href="#"> List your Activities</a>
       	<a href="#">BE-AN-Agent</a>
       </div>

     </div>	
     <div class=" col-sm-12 collapse  collapse1" id="QuickLinks">
     	
     	<div class="OurProduct">
       	<a href="#">Home</a>
       	<a href="#">Other links</a>
       </div>
     </div>

</div>


<div class="col-sm-12 connections">
	
<div class="col-sm-offset-1 col-sm-3 connectionlogo">logos</div>
<div class="col-sm-offset-1 col-sm-3 connectionwithus">
	<label> connection with us</label><br>
	            <a href="#" class="social-button twitter"><i class="fab fa-twitter"></i></a>
				<a href="#" class="social-button facebook"><i class="fab fa-facebook"></i></a>
				<a href="#" class="social-button google"><i class="fab fa-google-plus"></i></a>
				<a href="#" class="social-button dribbble"><i class="fab fa-dribbble"></i></a>
</div>

<div class="col-sm-offset-1 col-sm-3 connectionweaccept">
	<label> We accepts</label><br>
	
                 <a href="#" class="weaccept"><i class="fab fa-cc-mastercard" ></i></a>
				<a href="#" class="weaccept"><i class="fab fa-cc-visa"></i></a>
				<a href="#" class="weaccept"><i class="fab fa-cc-paypal"></i></a>
				<a href="#" class="weaccept"><i class="fa fa-credit-card"></i></a>
				<a href="#" class="weaccept"><i class="far fa-credit-card"></i></a>


</div>
</div>



<div class="copywrite">
<p>
	© 2017 Travel. All rights reserved | Design by Instant Innovations
	</p>

</div>
</div>








				<!-- popup signup form -->
				<div class="wthree_pop_up"> 
					<div id="small-dialog" class="mfp-hide agile_signup_form">
						<h2>BOOK OUR TRAVEL </h2>
						<form action="#" method="post">

							<div class="form-control"> 
								<label class="header1">Traveller Name <span>:</span></label>
								<input type="text" id="firstname" name="firstname" placeholder="Full Name" title="Please enter your Full Name" required="">
							</div>

							<div class="form-control">
								<label class="editContent">Travel Location <span>:</span></label>
								<select class="form-control">
									<option>Bus</option>
									<option>Flight</option>
								</select>
							</div>

							<div class="form-control">	
								<label class="header1">Email Address <span>:</span></label>
								<input type="email" id="email" name="email" placeholder="mail@example.com" title="Please enter a valid email" required="">
							</div>

							<div class="form-control">	
								<label class="header1">Phone Number <span>:</span></label>
								<input type="tel" id="tel" name="tel" placeholder="Phone number" title="Please enter a valid Phone number" required="">
							</div>

							<div class="form-control">	
								<label class="editContent">Journey start date <span>:</span></label>
								<input class="date has Datepicker" id="datepickerstart" name="Text" type="text" value="Start Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '21/11/2017';}" required="">
							</div>

							<div class="form-control">	
								<label class="editContent">Journey return date <span>:</span></label>
								<input class="date has Datepicker" id="datepickerreturn" name="Text" type="text" value="Return Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '21/11/2017';}" required="">
							</div>

							<div class="form-control">
								<label class="editContent">No: of travellers <span>:</span></label>
								<select class="form-control">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5 or more</option>
								</select>
							</div>
							<br>
							<div class="w3_submit center-classforsumit">
								<a  href="activitiesSearch.html" class="btn btn-success">Submit</a>
							</div>

						</form>
					</div>
				</div>

     <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span>To Top</a>
	<script src="{{asset('triporbitz/public/frontend/js/jquery-ui.js')}}"></script>
	<script src="{{asset('triporbitz/public/frontend/js/waypoints.min.js')}}"></script> 
	<script src="{{asset('triporbitz/public/frontend/js/counterup.min.js')}}"></script> 
	<script src="{{asset('triporbitz/public/frontend/js/poposlides.js')}}"></script>
	<script src="{{asset('triporbitz/public/frontend/js/jquery.magnific-popup.js')}}"></script>
	<script src="{{asset('triporbitz/public/frontend/js/owl.carousel.js')}}"></script>
	
	<script src="{{asset('triporbitz/public/frontend/js/SmoothScroll.min.js')}}"></script>
	<script src="{{asset('triporbitz/public/frontend/js/jquery.nicescroll.js')}}"></script> 
	<script src="{{asset('triporbitz/public/frontend/js/move-top.js')}}"></script>
	
	<script src="{{asset('triporbitz/public/frontend/js/easing.js')}}"></script>
	
	<script src="{{asset('triporbitz/public/frontend/js/scrolling-nav.js')}}"></script>
	
  
	
	<script src="{{asset('triporbitz/public/datepicker/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('triporbitz/public/frontend/js/lightbox.js')}}"></script>
        <script src="{{asset('triporbitz/public/frontend/js/hotelnhomestay.js')}}"></script>
        <script src="{{asset('triporbitz/public/frontend/js/bus.js')}}"></script>
        <script src="{{asset('triporbitz/public/frontend/js/new.js')}}"></script>
        <script src="{{asset('triporbitz/public/frontend/js/flight.js')}}"></script>
        <script src="{{asset('triporbitz/public/frontend/js/activities.js')}}"></script>
    

  
   <script>
  // homestay area search
        $('.search-box-homestay input[type="text"]').on("keyup input", function(e){
            /* Get input value on change */
            this.value = this.value.replace(/\s/g,'');
            $('input#fromhomestay').focus();
            var inputValHomestay = $(this).val();
             if(inputValHomestay==''){
              $('#areahomestay').html('');
            }
            var inputlength=$(this).val().length;
             if(inputlength<3){
             return false;
            }
            var url="{{route('areahomestay.search')}}";
           $.ajax({
              url: url,
              data:{"srhText":inputValHomestay, "_token": "{{ csrf_token() }}"},   
              method: 'get'
          }).done(function(response){
          $('#areahomestay').css({"background-color": "rgb(255, 255, 255)","font-size": "10px","color":"black","left":"-27px","top":"66px","width":"384px"}).html(response); // put the returning html in the 'results' div
          });
        });
        
        // Set search input value on click of result item
        $(document).on("click", ".areahomestay li", function(){
            $(this).parents(".search-box-homestay").find('input[type="text"]').val($(this).text());
            $(this).parents(".list-group-homestay li").empty();
        });
</script>


    <script>
    function search_data_homestay(search) {
      var url="{{route('homestays.search.result')}}";
      var search=search; 
          $.ajax({
          url: url,
          data:{"srcText":search, "_token": "{{ csrf_token() }}"},   
          method: 'get'
      }).done(function(response){
            $('#homestay').empty();
          $('#homestay,#homestayprice,#homestayrating').html(response); // put the returning html in the 'results' div
      });
  }

  //  checkbox checked clicked 
    $(':checkbox').on('change',function(){
     var th = $(this), name = th.attr('name'); 
     if(th.is(':checked')){
         $(':checkbox[name="'  + name + '"]').not(th).prop('checked',false);   
      }
    });
</script>
<script>
	// sort data homestay
    function sort_data_homestay(sort) {
      var url="{{route('homestays.sort.result')}}";
      
      var sort=sort;
                $.ajax({
                    url: url,
                    data:{"type":sort, "_token": "{{csrf_token()}}"},   
                    method: 'GET'
                }).done(function(response){

              
           $('#homestay,#homestayprice,#homestayrating').html(response); // put the returning html in the 'results' div
        });
      }

</script>
<script>
	// sort data homestay
    function sort_data_rating_homestay(sortrating) {
      var url="{{route('homestays.sort.result.rating')}}";
      var sortrating=sortrating;
                $.ajax({
                    url: url,
                    data:{"type":sortrating, "_token": "{{csrf_token()}}"},   
                    method: 'GET'
                }).done(function(response){

              
           $('#homestay,#homestayprice,#homestayrating').html(response); // put the returning html in the 'results' div
        });
      }

</script>
<script>
 // sort data homestay
    function nearbyloacationhomestay(nearbylocationhomestay) {
      var url="{{route('homestay.result.nearbylocation')}}";
      var nearbylocationhomestay=nearbylocationhomestay;
                $.ajax({
                    url: url,
                    data:{"typehomestay":nearbylocationhomestay, "_token": "{{csrf_token()}}"},   
                    method: 'GET'
                }).done(function(response){

              
           $('#homestay,#homestayprice,#homestayrating').html(response); // put the returning html in the 'results' div
        });
      }

</script>

<script>
  function search_data_homestayavailability(){
      var url="{{route('homestay.availability.rooms')}}";
      var checkinhomestay=$('#datepicker').val();
      var checkouthomestay=$('#datepicker1').val();
      var adultshomestay=$('#totaladult').val();
      var childshomestay=$('#totalchild').val();
      var roomshomestay=$('#totalroom').val();
          $.ajax({
          url: url,
          data:{"checkinhomestay":checkinhomestay,"checkouthomestay":checkouthomestay,"adultshomestay":adultshomestay,"childshomestay":childshomestay,"roomshomestay":roomshomestay, "_token": "{{ csrf_token() }}"},   
          method: 'get'
      }).done(function(response){
          $('#avaialablehomestayrooms').html(response); // put the returning html in the 'results' div
      });

}
   
</script>
<script>
   //search data for availability
    $(".bookroomhomestay").click(function() {
   $(this).closest('tr').find('td:first-child').each(function() {
        var textval = $(this).first().text(); // this will be the text of each <td>
        var url="{{route('homestay.book.rooms')}}";
       var search=search;
          $.ajax({
          url: url,
          data:{"bookroomhomestay":textval, "_token": "{{ csrf_token() }}"},   
          method: 'GET'
      });
   });
});
</script>



  
   <script>
   //hotel search
    function search_data_hotel(search){
    var url="{{route('hotels.search')}}";
      var search=search;
          $.ajax({
          url: url,
          data:{"srcText":search, "_token": "{{ csrf_token() }}"},   
          method: 'get'
      }).done(function(response){
            $('#hotels').empty();
          $('#hotels,#hotelsprice,#hotelsrating').html(response); // put the returning html in the 'results' div
      });
}    
</script>
<script>
 //Hotel Area Search
 
        $('.search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            this.value = this.value.replace(/\s/g,'');
            $('input#area').focus();
            var inputVal = $(this).val();
            if(inputVal==''){
              $('#areahotel').html('');
            }
            var inputlength=$(this).val().length;
             if(inputlength<3){
             return false;
            }
           
            var url="{{route('areahotel.search')}}";
           $.ajax({
              url: url,
              data:{"srhText":inputVal, "_token": "{{ csrf_token() }}"},   
              method: 'get'
          }).done(function(response){
              // $('#areahotel').css({"background-color": "rgb(255, 255, 255)","font-size": "10px","color":"black","left":"-27px","top":"66px","width":"384px"}).html(response); // put the returning html in the 'results' div
              $('#areahotel').html(response); 
          });
        
        });
     
        // Set search input value on click of result item
        $(document).on("click", ".areahotel li", function(){
            $(this).parents(".search-box").find('#area').val($(this).text());
            $(this).parents(".list-group li").empty();
            $('#checkin').focus();
        });
      
      // Autoselect first data if enter key is pressed

</script>
<script>
   //search data for availability
    function search_data_availability(){
      var url="{{route('hotels.availability.rooms')}}";
      var checkin=$('#datepicker').val();
      var checkout=$('#datepicker1').val();
      var adults=$('#totaladult').val();
      var childs=$('#totalchild').val();
      var totalroom=$('#totalroom').val();
      var search=search;
          $.ajax({
          url: url,
          data:{"checkin":checkin,"checkout":checkout,"adults":adults,"childs":childs,"totalroom":totalroom, "_token": "{{ csrf_token() }}"},   
          method: 'GET'
      }).done(function(response){
            
          $('#avaialablerooms').html(response); // put the returning html in the 'results' div
      });
}
</script>
<script>
   //search data for availability
    $(".bookroom").click(function() {
   $(this).closest('tr').find('td:first-child').each(function() {
        var textval = $(this).first().text(); // this will be the text of each <td>
       
        var url="{{route('hotels.book.rooms')}}";
       var search=search;
          $.ajax({
          url: url,
          data:{"bookroom":textval, "_token": "{{ csrf_token() }}"},   
          method: 'GET'
      });
   });
});
</script>



<script>
  //hotel sort  
    function sort_data(sort) {
      var url="{{route('hotels.sort')}}";
                $.ajax({
                    url: url,
                    data:{"type":sort, "_token": "{{csrf_token()}}"},   
                    method: 'GET'
                }).done(function(response){

              
           $('#hotels,#hotelsprice,#hotelsrating').html(response); // put the returning html in the 'results' div
      });
  }
</script>
<script>
  // sort data homestay
    function sort_data_rating_hotel(sortrating) {
      var url="{{route('hotels.sort.result.rating')}}";
      var sortrating=sortrating;
                $.ajax({
                    url: url,
                    data:{"type":sortrating, "_token": "{{csrf_token()}}"},   
                    method: 'GET'
                }).done(function(response){

              
           $('#hotels,#hotelsprice,#hotelsrating').html(response); // put the returning html in the 'results' div
        });
      }

</script>
 <script>
 // sort data homestay
    function nearbyloacationhotel(nearbylocation) {
      var url="{{route('hotels.result.nearbylocation')}}";
      var nearbylocation=nearbylocation;
                $.ajax({
                    url: url,
                    data:{"type":nearbylocation, "_token": "{{csrf_token()}}"},   
                    method: 'GET'
                }).done(function(response){

              
           $('#hotels,#hotelsprice,#hotelsrating').html(response); // put the returning html in the 'results' div
        });
      }

</script>
<script>
  //bus result Search
    function search_data_bus(search) {
      var url="{{route('busesresult.search')}}";
      var search=search;
          $.ajax({
          url: url,
          data:{"srcText":search, "_token": "{{ csrf_token() }}"},   
          method: 'get'
      }).done(function(response){
          $('#buses').html(response); // put the returning html in the 'results' div
      });
}
//bus Time Sort
    function sort_data_bus_time(sort) {
    var url="{{route('buses.time.sort')}}";
                $.ajax({
                    url: url,
                    data:{"type":sort, "_token": "{{csrf_token()}}"},   
                    method: 'POST'
                }).done(function(response){
           $('#buses').html(response); // put the returning html in the 'results' div
      });
  }

//bus price sort
function sort_data_bus_price(sort){
 var url="{{route('buses.price.sort')}}";
                $.ajax({
                    url: url,
                    data:{"type":sort, "_token": "{{csrf_token()}}"},   
                    method: 'GET'
                }).done(function(response){
           $('#buses').html(response); // put the returning html in the 'results' div
      });

}








//bus type Sort
    function sort_data_bus_type(sort) {
    var url="{{route('buses.type.sort')}}";
                $.ajax({
                    url: url,
                    data:{"bustype":sort, "_token": "{{csrf_token()}}"},   
                    method: 'POST'
                }).done(function(response){
           $('#buses').html(response); // put the returning html in the 'results' div
      });
  }

//bus availability search
    
    function search_databus() {
      var url="{{route('bus.availability.seats')}}";
      var departuredate=$('#datepicker1').val();
      var nseats=$('#numseats').val();
      var bustype=$('#bustypeselect').val();
      var search=search;
          $.ajax({
          url: url,
          data:{"departuredate":departuredate,"nseats":nseats,"bustype":bustype, "_token": "{{ csrf_token() }}"},   
          method: 'get'
      }).done(function(response){
            
          $('#availablebus').html(response); // put the returning html in the 'results' div
      });
}

//bus from area search
    
        $('.search-box-bus-from input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var url="{{route('busfrom.search')}}";
           $.ajax({
              url: url,
              data:{"srhText":inputVal, "_token": "{{ csrf_token() }}"},   
              method: 'get'
          }).done(function(response){
              $('#busfrom').html(response); // put the returning html in the 'results' div
          });
        });
        
        // Set search input value on click of result item
        $(document).on("click", ".busfrom li", function(){
            $(this).parents(".search-box-bus-from").find('input[type="text"]').val($(this).text());
            $(this).parents(".list-group-bus-from li").empty();
        });


    //bus to area search
    
        $('.search-box-bus-to input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var url="{{route('busto.search')}}";
           $.ajax({
              url: url,
              data:{"srhText":inputVal, "_token": "{{ csrf_token() }}"},   
              method: 'get'
          }).done(function(response){
              $('#busto').html(response); // put the returning html in the 'results' div
               
          });

        });
        
        // Set search input value on click of result item
        $(document).on("click", ".busto li", function(){
            $(this).parents(".search-box-bus-to").find('input[type="text"]').val($(this).text());
            $(this).parents(".list-group-bus-to li").empty();
        });

</script>


<script>
  //confirm bus seat selection
$(document).on('click',"#confirmbusseat" ,function(){
 var seats=$('#selected-seats').val();
 alert(seats);
});
</script>
<script>
  // Activities Search List
        $('.search-box-activity input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            this.value = this.value.replace(/\s/g,'');
            $('input#activity').focus();
            var inputValactivity = $(this).val();
            if(inputValactivity==''){
              $('#searchactivity').html('');
            }
            var inputlengthactivity=$(this).val().length;
             if(inputlengthactivity<=2){
             return false;
            }
           
            var url="{{route('activities.search')}}";
           $.ajax({
              url: url,
              data:{"srhText":inputValactivity, "_token": "{{ csrf_token() }}"},   
              method: 'get'
          }).done(function(response){
              $('#activity').css({"background-color": "rgb(238, 238, 238)","font-size": "10px","color":"black","left":"-27px","top":"55px"}).html(response); // put the returning html in the 'results' div

          });
        });
        
        // Set search input value on click of result item
        $(document).on("click", ".activity li", function(){
         var activityText = $(this).text();
         document.getElementById('searchactivity').value=activityText;
             $(this).parents(".search-box-activity").find('#searchactivity').val($(this).text()); 
             $(this).parents(".list-group-activity li").empty();
        });

</script> 
<script>
//bus result Search
    function search_data_activities(search) {
      var url="{{route('activities.search')}}";
      var search=search;
          $.ajax({
          url: url,
          data:{"srcText":search, "_token": "{{ csrf_token() }}"},   
          method: 'get'
      }).done(function(response){
          $('#activities').html(response); // put the returning html in the 'results' div
      });
}
</script>

<script>
  function activitiesavailability(){
      var url="{{route('activities.availability')}}";
      var checkin=$('#checkin').val();
      var traveller=$('#myNumber1').val();
       alert(traveller);
          $.ajax({
          url: url,
          data:{"checkin":checkin,"traveller":traveller, "_token": "{{ csrf_token() }}"},   
          method: 'GET'
      }).done(function(response){
          $('#availableactivities').html(response); // put the returning html in the 'results' div
      });

}
   
</script>



<script>
      //payment page hotels review
      function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (var j = 0; j < tablinks.length; j++) {
              tablinks[j].className = tablinks[j].className.replace("active");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += "active";
      }
    // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click(); 
           
    </script>

</body>
</html>
