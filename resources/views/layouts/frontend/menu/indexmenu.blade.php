<!DOCTYPE html>
<html lang="en">
<head>
	<title>TripOrbitZ</title>
	<!-- custom-theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Travel a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!--bootstrap and other plugin css -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
<link href="{{asset('triporbitz/public/frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('triporbitz/public/frontend/css/jquery-ui.css')}}" />
<link rel="stylesheet" href="{{asset('triporbitz/public/frontend/css/poposlides.css')}}" type="text/css" media="all" />
<link href="{{asset('triporbitz/public/frontend/css/lightbox.css')}}" rel="stylesheet">
<link href="{{asset('triporbitz/public/frontend/css/owl.carousel.css')}}" rel="stylesheet">
<!-- Owl-carousel-CSS -->
<link href="{{asset('triporbitz/public/frontend/css/popup-box.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link rel="stylesheet" href="{{asset('triporbitz/public/frontend/css/font-awesome.min.css')}}"/>
<link rel="stylesheet" href="{{asset('triporbitz/public/datepicker/datepicker3.css')}}" />
<!-- end bootstrap and other plugin............... -->

<!-- bussettingcss......... -->
<link rel="stylesheet" type="text/css" href="{{asset('triporbitz/public/frontend/css/jquery.seat-charts.css')}}">
<link href="{{asset('triporbitz/public/frontend/css/styleforbussetting.css')}}" rel="stylesheet" type="text/css" media="all" /> 
<!-- end bussetting..... -->
<link rel="stylesheet" type="text/css" href="{{asset('triporbitz/public/frontend/css/commonplus.css')}}" media="all">
<!-- ..........end.............................. -->
<!--custom css-->
<link href="{{asset('triporbitz/public/frontend/css/Common.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('triporbitz/public/frontend/css/Index1.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('triporbitz/public/frontend/css/Hotels.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('triporbitz/public/frontend/css/Homesstays.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('triporbitz/public/frontend/css/Flights.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('triporbitz/public/frontend/css/activities.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('triporbitz/public/frontend/css/Buses.css')}}" rel="stylesheet" type="text/css" media="all" />
 <link href="{{asset('triporbitz/public/frontend/css/Footer1.css')}}" rel="stylesheet" type="text/css" media="all" />
 
<!--custom css ends -->
<!-- //banner css -->
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //google fonts -->
    
	<link rel="shortcut icon" href="{{asset('triporbitz/public/frontend/images/favicon.png')}}" type="image/x-icon">
	<link rel="icon" href="{{asset('triporbitz/public/frontend/images/favicon.png')}}" type="image/x-icon">
	
	<link href="{{asset('triporbitz/public/frontend/css/responsive.css')}}" rel="stylesheet" type="text/css" media="all" />
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<!--/main-header-->
	<div class="demo-inner-content" id="home">
		<div class="main_agileits">
			<!--/banner-info-->
			<!-- header -->
			

			<div class="header-w3layouts"> 
				<!-- Navigation -->
				<nav class="navbar navbar-default navbar-fixed-top"> 
					<div class="container">
						
						<div class="navbar-header page-scroll">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">TripOrbitZ</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div> 
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="navbar-collapse collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav navbar-right cl-effect-15">
								<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
								<li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
								<li><a class="page-scroll scroll" href="{{url('/')}}">Home</a></li>
								<li><a class="page-scroll scroll" href="{{route('property.listing')}}">Add your property</a></li>
								<li><a class="page-scroll scroll" href="#popular">Popular offers</a></li>
								<li class="pull-right"><a class="" href="{{url('hotels/admin')}}">Sign In</a></li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</div>
					<!-- /.container -->
				</nav>  
			</div>	
			<!-- //header -->

			<div class="w3-banner-head-info">
				<div class="container">
					<div class="banner-text">
					 <label id="discription">
					 Find The Best Hotels, Flight For The Right Price In Nepal.
					</label>
				<!-- <p>The Nature are calling and I must go</p> -->

	<div class="tab book-form top-navbar1">
<button  data-toggle="collapse"   class="nav-icon fontwei tablinks active" id="Hotel" onclick="openCity(event, 'Hotels')"><i class="fa fa-bed"></i>&nbsp;&nbsp;Hotels</button>
	<button  data-toggle="collapse"   class="nav-icon fontwei tablinks" id="Homestay" onclick="openCity(event, 'Homestays')"><i class="fa fa-home"></i>&nbsp;&nbsp;Home Stays</button>
		<button  data-toggle="collapse" class="fontwei tablinks" onclick="openCity(event, 'Flight')" id="Fligh"><i class="fa fa-plane"></i>&nbsp;&nbsp;Flights</button>
		<button  data-toggle="collapse" class="fontwei tablinks " onclick="openCity(event, 'Activities')" id="Activitie"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;Activities</button>
		<button  data-toggle="collapse" class="fontwei tablinks " onclick="openCity(event, 'Bus')" id="Bu"><i class="fa fa-bus"></i>&nbsp;&nbsp;Buses</button>
		
		<button  data-toggle="collapse" class="fontwei tablinks " onclick="openCity(event, 'CarRentals')" id="CarRental"><i class="fa fa-car"></i>&nbsp;&nbsp;Car Rentals</button>
	</div>

					<!--   Hotels   -->
					<div id="Hotels" class="tabcontent book-form top-navbar2 mytab">
				    <form action="{{route('hotels')}}" method="post"  onsubmit="myFunction()" id="my-form">	
				    	<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
				    	<input type="hidden" name="total" id="total">
				    	<input type="hidden" name="checkindata" id="checkindata">
				    	
   
  
						<div class="col-md-4 col-xs-5 form-time-w3layouts editContent">
							<div class="input-group search-box">
								<input type="text" class="form-control home-button inputs" placeholder="Enter City Name Or Hotel Name" required="required" name="from" id="area" autocomplete="off">
								
									<i class="fa fa-map-marker"></i>
								
							    <ul class="list-group"><li id="areahotel" class="areahotel"></li></ul> 
							</div>
						</div>

						<div class="col-md-2 col-xs-4 form-time-w3layouts editContent">
							<div class="input-group editContent1"  id="checkinhotels">
								<input type="text" id="checkin" class="form-control date has Datepicker home-button inputs" placeholder="Check-In" name="checkin" required="required" autocomplete="off"  readonly="readonly">
								
									<i class="glyphicon glyphicon-calendar"></i>
								
							</div>
						</div>
						
						<div class="col-md-2 col-xs-4 form-time-w3layouts editContent">
							<div class="input-group editContent1"  id="checkouthotels">
								<input type="text" id="checkout" name="checkout" class="form-control date has Datepicker home-button inputs" placeholder="Check-Out"  required="required" autocomplete="off" readonly="readonly">
								<i class="glyphicon glyphicon-calendar"></i>
				
							</div>
						</div>
							    
						
                        <div class="col-md-2 col-xs-3 form-time-w3layouts editContent">
							  <div class="input-group editContent12">
							  <button data-trigger="manual" class="btn btn-default btn-popover" id="popRooms" data-placement="bottom" data-toggle="popover" data-container="body" data-html="true">
							            Select Rooms
							  </button>
							   </div>     
							    
								<div  id="dropdown-roomlist">
									<div id="roomlist">
										<div class="room" data-id="1">
											<h5>Room <span class="room-number">1</span></h5>
											<span><span class="adult-count" id="adult-count">1</span> Adults</span>
											<button class="btn btn-default btn-sm pull-right btn-dec-adult">-</button>
											<button class="btn btn-default btn-sm pull-right btn-inc-adult">+</button>
											<hr/>
											<span><span class="child-count" id="child-count">0</span> Children <span>(2-12 Years)</span></span>
											<button class="btn btn-default btn-sm pull-right btn-dec-child">-</button>
											<button class="btn btn-default btn-sm pull-right btn-inc-child">+</button>
											<hr/>
										 </div>
									</div>
			                             <button class="btn btn-primary" id="addRoom">Add Room</button>
			                             <button class="btn btn-danger" id="removeRoom" style="display:none;">Remove</button>
                                </div>
						</div>
						

						<div class="col-md-2 col-xs-4 form-time-w3layouts editContent13" id="submitHotel">
							<button type="submit" value="Search" class="button button--nina btn btn-success btn-block form-control home-button buttonText-align enableOnInputHotel" id="Hotelsubmit" disabled="disabled">SEARCH</button>
						</div>
						<div class="clearfix"></div>
					  
					  </form>				
					</div>
					<!--end   Hotels   -->
     
					<!-- Homestays -->
					<div id="Homestays" class="tabcontent book-form top-navbar2 mytab" style="display: none;" >

                    <form action="{{route('homestays')}}" method="post"  onsubmit="homestay()" id="homestay-form">							
				    	<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
				    	<input type="hidden" name="totalHomestay" id="totalHomestay">
						<div class="col-md-4 col-xs-5 form-time-w3layouts editContent">
							<div class="input-group search-box-homestay">
								<input type="text" class="form-control home-button" placeholder="Enter City Name Or Homestay Name" name="fromhomestay" id="fromhomestay" autocomplete="off">
								
										<i class="fa fa-map-marker"></i>
									
								<ul class="list-group-homestay"><li id="areahomestay" class="areahomestay"></li></ul> 
							</div>
						</div>
						<div class="col-md-2 col-xs-4 form-time-w3layouts editContent">
							<div class="input-group editContent1">
		<input type="text" id="checkinhomestay" class="form-control date has Datepicker home-button" placeholder="Check-In" name="checkinhomestay" required="required" autocomplete="off" readonly="readonly">
								<i class="glyphicon glyphicon-calendar"></i>
							</div>
						</div>
						<div class="col-md-2 col-xs-4 form-time-w3layouts editContent">
							<div class="input-group editContent1" id="homestayscheckout">
								<input type="text" id="checkouthomestay" class="form-control date has Datepicker home-button" placeholder="Check-Out" name="checkouthomestay" required="" autocomplete="off" readonly="readonly">
								<i class="glyphicon glyphicon-calendar"></i>
							</div>
						</div>

						<div class="col-md-2 col-xs-3 form-time-w3layouts editContent">
								 <div class="input-group editContent12">
							        <button data-trigger="manual" class="btn btn-default btn-popover" id="popRoomsHomestay" data-placement="bottom" data-toggle="popover" data-container="body" data-html="true">
							            Select Rooms
							        </button>
							        
							    </div>
							    
								<div id="dropdown-roomlisthomestay">
									<div id="roomlisthomestay">
										<div class="roomhomestay" data-id="1">
											<h5>Room <span class="room-number-homestay">1</span></h5>
											<span><span class="adult-count-homestay" id="adult-count-homestay">1</span> Adults</span>
											<button class="btn btn-default btn-sm pull-right btn-dec-adult-homestay">-</button>
											<button class="btn btn-default btn-sm pull-right btn-inc-adult-homestay">+</button>
											<hr/>
											<span><span class="child-count-homestay" id="child-count-homestay">0</span> Children <span>(2-12 Years)</span></span>
											<button class="btn btn-default btn-sm pull-right btn-dec-child-homestay">-</button>
											<button class="btn btn-default btn-sm pull-right btn-inc-child-homestay">+</button>
											<hr/>
										</div>
									</div>

									<button class="btn btn-primary" id="addRoomHomestay">Add Room</button>

									<button class="btn btn-danger" id="removeRoomHomestay" style="display:none;">Remove</button>

								</div>
							</div>
						
						<div class="col-md-2 col-xs-4 form-time-w3layouts editContent13" id="submitHomestay">
							<button type="submit" value="" class="button button--nina btn btn-success btn-block form-control home-button buttonText-align enableOnInputHomestay" id="homestay" disabled="disabled">SEARCH</button>
						</div>


						<div class="clearfix"></div>
						</form>	
					</div>
					<!-- end- Homestays  -->
    
                    <!--   Flights   -->
						<div id="Flight" class="tabcontent book-form top-navbar2 mytab" style="display: none;">
							<form action="#" method="post"  onsubmit="flight()" id="flight-form">		
							
							<div class="col-md-3 col-xs-4 form-time-w3layouts editContent">
								<div class="input-group search-box-Flight">
									<input type="text" class="form-control home-button" placeholder="From" >
									
											<i class="fa fa-map-marker"></i>
										
								</div>
							</div>
							
							<div class="col-md-3 col-xs-4  form-time-w3layouts editContent">
								<div class="input-group search-box-Flight">
									<input type="text" class="form-control home-button" placeholder="To" >
									
											<i class="fa fa-map-marker"></i>
										
								</div>
							</div>
							
							<div class="col-md-2 col-xs-3 form-time-w3layouts editContent">
								<div class="input-group editContent1">
									<input type="text" id="datepickern" class="form-control date has Datepicker home-button" placeholder="To" value="Departure" required="" autocomplete="off" readonly="readonly">
									     <i class="glyphicon glyphicon-calendar"></i>
				                     
								</div>
							</div>
							
							<div class="twowaydiv" id="twowaydiv1">

		
							</div>
							
							
							<div class="col-md-1 form-time-w3layouts editContent">
								<div class="btn-pop btnpop editContent123">
									<button type="button" class="btn btn-default btn-popover" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true"
									data-content='
									<p class="spinner" style="margin-left: 100px; margin-top: 22px;">
										<i class="fa fa-spinner fa-spin"></i>
									</p>            
									<div class="pop-content">
									<div id="traveller-content">
										<h4 id="total-traveller">Traveller:</h4>
										<ul class="em-ul" style="margin-top: 10px;">
										<li id="traveller-adult" class="em-li">
										<h5><span id="traveller-adult-count"></span>
											<span id="traveller-adult-name"></span>
											<small class="text-muted"> Above <span id="traveller-adult-age"></span>years</small>
											<button id="1" class="btn btn-default btn-sm pull-right traveller-btn-inc-adult" onclick="increaseCountPassenger(this.id,this)">+</button>
											<button id="1" class="btn btn-default btn-sm pull-right traveller-btn-dec-adult" onclick="decreaseCountPassenger(this.id,this)">-</button>
										</h5>
										<hr class="em-seperator">
										</li>
										<li id="child" class="em-li">
										<h5><span id="traveller-child-count"></span> <span id="traveller-child-name"></span>
											<small class="text-muted"> Below <span id="traveller-child-age"></span> years</small>
											<button id="2" class="btn btn-default btn-sm pull-right traveller-btn-inc-child" onclick="increaseCountPassenger(this.id,this)">+</button>
											<button id="2" class="btn btn-default btn-sm pull-right traveller-btn-dec-child" onclick="decreaseCountPassenger(this.id,this)">-</button>
										</h5>
										<hr class="em-seperator">
										</li>
										<li id="child" class="em-li">
										<h5><span id ="traveller-infant-count"></span> <span id ="traveller-infant-name"> </span>
											<small class="text-muted"> Below <span id="traveller-infant-age"></span> years</small>
											<button id="3" class="btn btn-default btn-sm pull-right traveller-btn-inc-infant" onclick="increaseCountPassenger(this.id,this)">+</button>
											<button id="3" class="btn btn-default btn-sm pull-right traveller-btn-dec-infant" onclick="decreaseCountPassenger(this.id,this)">-</button>
										</h5>
										<hr class="em-seperator">
										</li>
										</ul>
								
										<button id="done-button" class="btn btn-success btn-sm pull-right" onclick="doneBtn()">Done</button>
										
									</div>
								   </div>'>
									<span id="total-passenger"></span>
									 <i class="caret margin"></i>
								</button>
							</div>
						
						</div>
					
							<div class="col-md-1 col-xs-3 form-time-w3layouts editContent13" id="submitflight">
							 <button type="submit" value="" class="button button--nina btn btn-success btn-block form-control home-button buttonText-align enableOnInputFlight" id="flightsubmit" disabled="disabled">SEARCH</button>
							</div>
					
						<div class="clearfix"></div>	
  				 </form>
					<div class="row rowonetwoway">
					<div class="col-sm-2">
					   <input type="radio" name="direction" id="oneway" value="" checked>One way</div>
					   <div class="col-sm-2">
					  <input type="radio" name="direction" id="twoway"  value="">Two way</div>
					</div>
					</div>


<!-- end flight  -->

 <!--   Activities   -->
  <div id="Activities" class="tabcontent book-form top-navbar2 mytab" style="display: none;">
		<form method="POST" action="{{route('activities')}}">
			<input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
	<!-- <div id="Activities" class="tabcontent book-form top-navbar2 mytab" style="display: none;"> -->
				<div class="col-md-10 col-xs-10 form-time-w3layouts editContent">
					<div class="input-group search-box-activity">
						<input type="text" name="activity" class="form-control home-button inputs" placeholder="Enter Activities Name (e.g.Jungle Safari,Bungy etc)" id="searchactivity" autocomplete="off" required="required">
								
											<i class="fa fa-map-marker"></i>
										
								
								<ul class="list-group-activity"><li id="activity" class="activity"></li></ul>   
					 </div>
							</div>
							<div class="col-md-2 col-xs-4 form-time-w3layouts editContent13" id="submitactivities">
								<button type="submit" value="" class="button button--nina btn btn-success btn-block form-control home-button buttonText-align enableOnInputactivities" id="activitiessubmit">SEARCH</button>
							</div>
						
					<div class="clearfix"></div>			
		     </form>
	      </div>
						<!--endActivities   -->

						<!--   Buses   -->
						 <div id="Bus" class="tabcontent book-form top-navbar2 mytab" style="display: none;">
						<form method="POST" action="{{route('buses')}}">
						<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
						<!-- <div id="Bus" class="tabcontent book-form top-navbar2 mytab" style="display: none;"> -->
							<div class="col-md-3 col-xs-4 form-time-w3layouts editContent">
								<div class="input-group search-box-bus-from">
					<input type="text" class="form-control home-button" placeholder="From" id="frombus" name="frombus" autocomplete="off">
									
											<i class="fa fa-map-marker"></i>
										
									<ul class="list-group-bus-from"><li id="busfrom" class="busfrom"></li></ul>
								</div>
							</div>
							<div class="col-md-3 col-xs-4 form-time-w3layouts editContent">
								<div class="input-group search-box-bus-to">
									<input type="text" class="form-control home-button" placeholder="To" id="tobus" name="tobus" autocomplete="off">
									
											<i class="fa fa-map-marker"></i>
										
									<ul class="list-group-bus-to"><li id="busto" class="busto"></li></ul>
								</div>
							</div>

							
							
							<div class="col-md-2 col-xs-4 form-time-w3layouts editContent">
								<div class="input-group editContent1">
									<input type="text" id="departurebus" name="departure" class="form-control date has Datepicker home-button" placeholder="departure date"  required="required" readonly="readonly">
										 <i class="glyphicon glyphicon-calendar"></i>
								</div>
							</div>
                        
                   <div class="col-md-2 col-sm-12 form-time-w3layouts editContent">
								<div class="input-group">
									<span class="input-group-btn">
										<button id="down" class="btn btn-default" onclick="downseat()"><i class="glyphicon glyphicon-minus"></i></button>
									</span>
									<input type="text" id="myNumber" class="form-control number-control input-number home-button" value="1 Seats" name="seats">
									<span class="input-group-btn">
					<button id="up6" class="btn btn-default number-control input-number " onclick="upseat()"><i class="glyphicon glyphicon-plus"></i>
										</button>
								  </span>
							</div>
							</div>

                        <div class="col-md-2 col-xs-4 form-time-w3layouts editContent13" id="submitbus">
							<button type="submit" value="" class="button button--nina btn btn-success btn-block form-control home-button buttonText-align enableOnInputBus" id="bussubmit" disabled="disabled">SEARCH</button>
						</div>

							<div class="clearfix"></div>		
					</form>
				</div>
						<!-- endBuses    -->
					
						
					
						
				</div>
			</div>
		</div>

		<!-- //banner-info-->
		<div class="slides-box" id="slidebox">
			<ul class="slides">
				<li style="background: url(triporbitz/public/frontend/images/swoyambhu.jpg) no-repeat;background-size:cover;"></li>
				<li style="background: url(triporbitz/public/frontend/images/namche.jpg) no-repeat;background-size:cover;"></li>
				<li style="background: url(triporbitz/public/frontend/images/honeyhunter.jpg) no-repeat;background-size:cover;"></li>
				<li style="background: url(triporbitz/public/frontend/images/nepal.jpg) no-repeat;background-size:cover;"></li>
				<li style="background: url(triporbitz/public/frontend/images/sadhu.jpg) no-repeat;background-size:cover;"></li>
			</ul>
		</div>
		<!-- //banner  -->
	</div>
</div>
<!--/banner-section-->
  
    

<script>
	
 // $(function() {
//  $( '#datepickern,#twowaysdatepicker').datepicker();
   
  //menu display text message after clicking tabs
	$('#Hotel').click(function (e) {
		var discrip="Book The Best Hotel In Nepal.";
		document.getElementById('discription').innerHTML = discrip;

	});
	$('#Homestay').click(function (e) {
		var discrip1="Book The Best Hotels In Nepal.";
		document.getElementById('discription').innerHTML = discrip1;
	});

	$('#Fligh').click(function (e) {
		
		var discrip2="Book Domenstic And Mountain Flight.";
		 document.getElementById('twowaydiv1').innerHTML=" ";
		document.getElementById('discription').innerHTML = discrip2;


	});

	$('#Activitie').click(function (e) {
		var discrip3="Activities And Adventure To Do.";
		document.getElementById('discription').innerHTML = discrip3;

	});

	$('#Bu').click(function (e) {
		var discrip4="Book Buses Ticket In Nepal.";
		document.getElementById('discription').innerHTML = discrip4;

	});

	$('#CarRental').click(function (e) {
		var discrip5="Hire Car And Bike  In Rent.";
		document.getElementById('discription').innerHTML = discrip5;

	});

</script>
<script>
//Hotel Select Room Section 
	$(document).ready(function(){
    var roomCount = 1;
    var globalAdultCount = 1;
    var globalChildCount = 0; 
    var initializePopover = function() {
    event.preventDefault();  
        $("#popRooms").popover({
            content: $("#dropdown-roomlist").html()
        });
    };
    initializePopover();
    $("#popRooms").on("click", function(){
        event.preventDefault(); 
          $(this).popover('show');    
        changeTotalPeopleCountAndRoomCount(); 
      
    });
    $(document).on('click','.btn-inc-adult',function(event){
        event.preventDefault(); 
        var adultCountEl = $(this).parent().find('.adult-count');
        var childCountEl = $(this).parent().find('.child-count');
        var adultCount = parseInt($(adultCountEl).html());
        var childCount = parseInt($(childCountEl).html());
        if(adultCount + childCount == 8 || childCount == 7) {
            alert("maximum reached");
        }
        else {
            $(adultCountEl).html(++adultCount);
            globalAdultCount++;
            $("#roomlist").html($(".popover-content > #roomlist").html());  
	        var popover = $("#popRooms").data('bs.popover');
	        popover.options.content = $("#dropdown-roomlist").html();
	        changeTotalPeopleCountAndRoomCount();
        }
         
    });
    $(document).on('click','.btn-dec-adult',function(){
        event.preventDefault(); 
        var adultCountEl = $(this).parent().find('.adult-count');
        var childCountEl = $(this).parent().find('.child-count');
        var adultCount = parseInt($(adultCountEl).html());
        var childCount = parseInt($(childCountEl).html());
         
        if(adultCount + childCount == 1 || adultCount == 1) {
            alert("minimum reached");
        }
        else {
            $(adultCountEl).html(--adultCount);
            globalAdultCount--;
             $("#roomlist").html($(".popover-content > #roomlist").html());  
	        var popover = $("#popRooms").data('bs.popover');
	        popover.options.content = $("#dropdown-roomlist").html();
	        changeTotalPeopleCountAndRoomCount();
        }
    });

    $(document).on('click','.btn-inc-child',function(){
        event.preventDefault(); 
        var adultCountEl = $(this).parent().find('.adult-count');
        var childCountEl = $(this).parent().find('.child-count');
        var adultCount = parseInt($(adultCountEl).html());
        var childCount = parseInt($(childCountEl).html());
        if(adultCount + childCount == 8||adultCount == 8) {
            alert("maximum reached");
        }
        else {
            $(childCountEl).html(++childCount);
            globalChildCount++;
            $("#roomlist").html($(".popover-content > #roomlist").html());  
	        var popover = $("#popRooms").data('bs.popover');
	        popover.options.content = $("#dropdown-roomlist").html();
	        changeTotalPeopleCountAndRoomCount();
           
        }
    });

    $(document).on('click','.btn-dec-child',function(){
        event.preventDefault(); 
        var adultCountEl = $(this).parent().find('.adult-count');
        var childCountEl = $(this).parent().find('.child-count');
        var adultCount = parseInt($(adultCountEl).html());
        var childCount = parseInt($(childCountEl).html());
        if(adultCount + childCount == 1 || childCount == 0) {
            alert("minimum reached");
        }
        else {
            $(childCountEl).html(--childCount);
            globalChildCount--;
            $("#roomlist").html($(".popover-content > #roomlist").html());  
	        var popover = $("#popRooms").data('bs.popover');
	        popover.options.content = $("#dropdown-roomlist").html();
	        changeTotalPeopleCountAndRoomCount();
        }

    });
   
    $(document).on('click','#addRoom',function(){
        event.preventDefault();
          if(roomCount >=1) {
              $('#removeRoom').show();
            }

        roomCount++;
        $("#roomlist").html($(".popover-content > #roomlist").html());
        $("#roomlist").append('<div class="room" data-id="'+roomCount+'">\
                <h5>Room <span class="room-number">'+roomCount+'</span></h5>\
                <span><span class="adult-count">1</span> Adults </span>\
                <button class="btn btn-default btn-sm pull-right btn-dec-adult">-</button>\
                <button class="btn btn-default btn-sm pull-right btn-inc-adult">+</button>\
                <hr/>\
                <span><span class="child-count">0</span> Children <span>(2-12 Years)</span></span>\
                <button class="btn btn-default btn-sm pull-right btn-dec-child">-</button>\
                <button class="btn btn-default btn-sm pull-right btn-inc-child">+</button>\
                <hr/>\
            </div>'
        );

        globalAdultCount += 1;

        // $("#roomlist").append();
        var popover = $("#popRooms").data('bs.popover');
        popover.options.content = $("#dropdown-roomlist").html();
        $("#popRooms").popover('show');
        changeTotalPeopleCountAndRoomCount();
        
    });

    $(document).on('click','#removeRoom',function(){
        event.preventDefault(); 
               if(roomCount <=2) {
              $('#removeRoom').hide();
            }

        
        $("#roomlist").html($(".popover-content > #roomlist").html());
        var recentRoom = $(".room[data-id='"+roomCount+"']");
        var recentRoomAdultCount = parseInt($(recentRoom).find("span.adult-count").html());
        var recentRoomChildCount = parseInt($(recentRoom).find("span.child-count").html());
        // console.log(recentRoomAdultCount, recentRoomChildCount);
        globalAdultCount -= recentRoomAdultCount;
        globalChildCount -= recentRoomChildCount;

        $(recentRoom).remove();
        roomCount--;
         // $("#roomlist").append();
        var popover = $("#popRooms").data('bs.popover');
        popover.options.content = $("#dropdown-roomlist").html();
        $("#popRooms").popover('show');
        changeTotalPeopleCountAndRoomCount();
    });

    function changeTotalPeopleCountAndRoomCount(value){
      var hell = $("#popRooms").html(globalAdultCount+" adult "+ globalChildCount + " child in "+roomCount+" room");
      var totalPeopleRoom = hell.text();
       $("#total").val(totalPeopleRoom); 
    }
    
});

//Homestay Select Room Section
  
	$(document).ready(function(){
    var roomCountHomestay = 1;
    var globalAdultCountHomestay = 1;
    var globalChildCountHomestay = 0; 
    var initializePopoverHomestay = function() { 
        $("#popRoomsHomestay").popover({
            content: $("#dropdown-roomlisthomestay").html()
        });
    };
    initializePopoverHomestay();
    $("#popRoomsHomestay").click(function(event){
        event.preventDefault(); 
        $(this).popover('show');  
        changeTotalPeopleCountAndRoomCountHomestay();
    });
    $(document).on('click','.btn-inc-adult-homestay',function(event){
        event.preventDefault(); 
        var adultCountElhomestay = $(this).parent().find('.adult-count-homestay');
        var childCountElhomestay = $(this).parent().find('.child-count-homestay');
        var adultCounthomestay = parseInt($(adultCountElhomestay).html());
        var childCounthomestay = parseInt($(childCountElhomestay).html());
        if(adultCounthomestay + childCounthomestay == 8|| childCounthomestay == 7) {
            alert("maximum reached");
        }
        else {
            $(adultCountElhomestay).html(++adultCounthomestay);
            globalAdultCountHomestay++;
            $("#roomlisthomestay").html($(".popover-content > #roomlisthomestay").html());
	        var popover = $("#popRoomsHomestay").data('bs.popover');
	        popover.options.content = $("#dropdown-roomlisthomestay").html();
	        changeTotalPeopleCountAndRoomCountHomestay();
           
        }
    });
    $(document).on('click','.btn-dec-adult-homestay',function(event){
        event.preventDefault(); 
        var adultCountElhomestay = $(this).parent().find('.adult-count-homestay');
        var childCountElhomestay = $(this).parent().find('.child-count-homestay');
        var adultCounthomestay = parseInt($(adultCountElhomestay).html());
        var childCounthomestay = parseInt($(childCountElhomestay).html());

        if(adultCounthomestay + childCounthomestay == 1|| adultCounthomestay == 1) {
            alert("minimum reached");
        }
        else {
            $(adultCountElhomestay).html(--adultCounthomestay);
            globalAdultCountHomestay--;
            $("#roomlisthomestay").html($(".popover-content > #roomlisthomestay").html());
	        var popover = $("#popRoomsHomestay").data('bs.popover');
	        popover.options.content = $("#dropdown-roomlisthomestay").html();
	        changeTotalPeopleCountAndRoomCountHomestay();
        }
    });

    $(document).on('click','.btn-inc-child-homestay',function(event){
        event.preventDefault(event); 
        var adultCountElhomestay = $(this).parent().find('.adult-count-homestay');
        var childCountElhomestay = $(this).parent().find('.child-count-homestay');
        var adultCounthomestay = parseInt($(adultCountElhomestay).html());
        var childCounthomestay = parseInt($(childCountElhomestay).html());
        if(adultCounthomestay + childCounthomestay == 8 ||adultCounthomestay==8 ) {
            alert("maximum reached");
        }
        else {
            $(childCountElhomestay).html(++childCounthomestay);
            globalChildCountHomestay++;
             $("#roomlisthomestay").html($(".popover-content > #roomlisthomestay").html());
	        var popover = $("#popRoomsHomestay").data('bs.popover');
	        popover.options.content = $("#dropdown-roomlisthomestay").html();
	        changeTotalPeopleCountAndRoomCountHomestay();
        }
    });

    $(document).on('click','.btn-dec-child-homestay',function(event){
        event.preventDefault(event); 
        var adultCountElhomestay = $(this).parent().find('.adult-count-homestay');
        var childCountElhomestay = $(this).parent().find('.child-count-homestay');
        var adultCounthomestay = parseInt($(adultCountElhomestay).html());
        var childCounthomestay = parseInt($(childCountElhomestay).html());

        if(adultCounthomestay + childCounthomestay == 1 || childCounthomestay == 0) {
            alert("minimum reached");
        }
        else {
            $(childCountElhomestay).html(--childCounthomestay);
            globalChildCountHomestay--;
            $("#roomlisthomestay").html($(".popover-content > #roomlisthomestay").html());
	        var popover = $("#popRoomsHomestay").data('bs.popover');
	        popover.options.content = $("#dropdown-roomlisthomestay").html();
	        changeTotalPeopleCountAndRoomCountHomestay();
        }

    });
    $(document).on('click','#addRoomHomestay',function(event){
        event.preventDefault();
        if(roomCountHomestay >=1) {
        $('#removeRoomHomestay').show();
         } 
        roomCountHomestay++;
        $("#roomlisthomestay").html($(".popover-content > #roomlisthomestay").html());
        $("#roomlisthomestay").append('<div class="room" data-id="'+roomCountHomestay+'">\
                <h5>Room <span class="room-number-homestay">'+roomCountHomestay+'</span></h5>\
                <span><span class="adult-count-homestay">1</span> Adults </span>\
                <button class="btn btn-default btn-sm pull-right btn-dec-adult-homestay">-</button>\
                <button class="btn btn-default btn-sm pull-right btn-inc-adult-homestay">+</button>\
                <hr/>\
                <span><span class="child-count-homestay">0</span> Children <span>(2-12 Years)</span></span>\
                <button class="btn btn-default btn-sm pull-right btn-dec-child-homestay">-</button>\
                <button class="btn btn-default btn-sm pull-right btn-inc-child-homestay">+</button>\
                <hr/>\
            </div>'
        );

        globalAdultCountHomestay += 1;

        // $("#roomlisthomestay").append();
        var popover = $("#popRoomsHomestay").data('bs.popover');
        
        popover.options.content = $("#dropdown-roomlisthomestay").html();
        $("#popRoomsHomestay").popover('show');
        changeTotalPeopleCountAndRoomCountHomestay();
        
    });

    $(document).on('click','#removeRoomHomestay',function(event){
        event.preventDefault(); 
        if(roomCountHomestay <=2) {
        $('#removeRoomHomestay').hide();
         }
        
        $("#roomlisthomestay").html($(".popover-content > #roomlisthomestay").html());
        var recentRoomHomestay = $(".room[data-id='"+roomCountHomestay+"']");

        var recentRoomAdultCountHomestay = parseInt($(recentRoomHomestay).find("span.adult-count-homestay").html());
        var recentRoomChildCountHomestay = parseInt($(recentRoomHomestay).find("span.child-count-homestay").html());
        // console.log(recentRoomAdultCount, recentRoomChildCount);
        globalAdultCountHomestay -= recentRoomAdultCountHomestay;
        globalChildCountHomestay -= recentRoomChildCountHomestay;

        $(recentRoomHomestay).remove();
        roomCountHomestay--;
         // $("#roomlisthomestay").append();
        var popoverhomestay = $("#popRoomsHomestay").data('bs.popover');
        popoverhomestay.options.content = $("#dropdown-roomlisthomestay").html();
        $("#popRoomsHomestay").popover('show');
        changeTotalPeopleCountAndRoomCountHomestay();
    });

    function changeTotalPeopleCountAndRoomCountHomestay(value){
      var heaven = $("#popRoomsHomestay").html(globalAdultCountHomestay+" adult "+ globalChildCountHomestay + " child in "+roomCountHomestay+" room");
      var totalPeopleRoomHomestay = heaven.text();
       $("#totalHomestay").val(totalPeopleRoomHomestay); 
    } 
});
</script>


