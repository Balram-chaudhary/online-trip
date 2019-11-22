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
	
	<link href="{{asset('triporbitz/public/frontend/css/responsiveplus.css')}}" rel="stylesheet" type="text/css" media="all" />
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
				<nav class="navbar navbar-default navbarcommon"> 
					<div class="container">
						
						<div class="navbar-header page-scroll">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">TripOrbitZ</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<!-- <h1><a class="navbar-brand" href="travelpackages.html">Travel Packages</a></h1> -->
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