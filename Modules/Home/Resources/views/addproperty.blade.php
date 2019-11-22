<!DOCTYPE html>
<html>
<!-- Head -->
<head>
	<title>Trip Orbitz</title>
	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Travel Agency Sign In Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
	<!-- Custom-Styleheet-Links -->
		<link rel="stylesheet" href="{{asset('triporbitz/public/frontend/css/login.css')}}" type="text/css" media="all">
		<link rel="stylesheet" href="{{asset('triporbitz/public/frontend/css/animate-custom-login.css')}}" type="text/css" media="all">
			<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

	<!-- //Custom-Styleheet-Links -->

	<!-- Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" type="text/css" media="all">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700" 		  type="text/css" media="all">
	<!-- //Fonts -->

</head>
<!-- //Head -->
<!-- Body -->
<body>
	<h1 class="w3layouts agileits">TripOrbitz</h1>
	<div class="container w3layouts agileits">
		<div class="content-left w3layouts agileits">
			<img src="{{url('triporbitz/public/frontend/images/buddhaeyes.jpg')}}" height="575px" width="590px" alt="W3layouts Agileits">
			<p>Better prices. Exceptional people.</p>
			<a class="more w3layouts agileits" href="#">LEARN MORE</a>
			<div class="list w3layouts agileits">
				<ul class="w3layouts agileits">
					<li class="w3layouts agileits"><a href="#">About</a></li>
					<li class="li2 w3layouts agileits"><a href="#">Terms Of Use</a></li>
					<li class="w3layouts agileits"><a href="#">Contact</a></li>
				</ul>
			</div>
		</div>
		<div class="content-right w3layouts agileits">
			<section>
				<div id="container_demo">
					<a class="hiddenanchor w3layouts agileits" id="tologin"></a>
					<a class="hiddenanchor w3layouts agileits" id="toregister"></a>

					<div id="wrapper">
						<div id="login" class="animate w3layouts agileits form">
							
							
							<div class="social-icons w3layouts agileits">
								<p>OR USE YOUR SOCIAL ACCOUNTS</p>
								<ul>
									<li class="fb w3ls w3layouts agileits"><a href="#"><span class="icons w3layouts agileits"></span><span class="text w3layouts agileits">Facebook</span></a></li>
									<li class="twt w3ls w3layouts agileits"><a href="#"><span class="icons w3layouts agileits"></span><span class="text w3layouts agileits">Twitter</span></a></li>
									<div class="clear"></div>
								</ul>
							</div>
							<div class="clear"></div>
						</div>
						<div id="register" class="animate w3layouts agileits form">
							@if(Session::has('success_msg'))
							<p style="color:navajowhite">{{ Session::get('success_msg') }}</p>
							@endif
							<h2>Sign up</h2>
								<form action="{{route('addproperty.signup.submit')}}" method="post">
								       {{ csrf_field() }}
								       
									<label>Name</label>
									<input type="text" class="name w3layouts agileits" name="name" required="required">
									
									<label>Phone Number</label>
									<input type="text" class="phone w3layouts agileits" name="phone" required="required">
									   <div>
										@if ($errors->has('phone'))
	                                                                     <span class="help-block">
	                                                                    <strong style="color:red">{{ $errors->first('phone') }}</strong>
	                                                                      </span>
	                                                                      @endif
	                                                                      </div>
									<label>E-mail</label>
									<input type="email" class="email w3layouts agileits" name="email" required="required">
									 <div>
										@if ($errors->has('email'))
	                                                                     <span class="help-block">
	                                                                    <strong style="color:red">{{ $errors->first('email') }}</strong>
	                                                                      </span>
	                                                                      @endif
	                                                                      </div>
									<div class="send-button w3layouts agileits">
										
									<input type="submit" value="SIGN UP">
										
									</div>
								</form>
								<p class="change_link w3layouts agileits">
									Already a member? <a href="{{route('hotels.login')}}" class="to_register">Sign In</a>
								</p>
								<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</section>
		</div>
		<div class="clear"></div>

	</div>

	<div class="footer w3layouts agileits">
		<p> &copy; 2018 Travel Agency Sign In Form. All Rights Reserved | Template by <a target="_blank">Instant Innovations</a></p>
	</div>

</body>
<!-- //Body -->

</html>