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
					<div id="wrapper">
						<div id="register" class="animate w3layouts agileits form">
							@if(Session::has('success_msg'))
							<p style="color:navajowhite">{{ Session::get('success_msg') }}</p>
							@endif
							<h2>Sign up</h2>
								<form action="{{route('signup.password.submit')}}" method="post">
								<input type="hidden" name="property_id" value="{{$id}}">
								       {{ csrf_field() }}
									<label>password</label>
									<input type="password" class="name w3layouts agileits" name="password" required="required">
									<div>
									@if ($errors->has('password'))
                                                                     <span class="help-block">
                                                                    <strong style="color:red">{{ $errors->first('password') }}</strong>
                                                                      </span>
                                                                      @endif
                                                                      </div>
                                                                      <br>
									<label>Retyped Password</label>
									<input type="password" class="phone w3layouts agileits" name="password_confirmation" required="required">
									
							
									<div class="send-button w3layouts agileits">
										
									<input type="submit" value="Submit" style="float:left;">
										
									</div>
								</form>
								
								<div class="clear"></div>
						</div>
						<div class="clear"></div>
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