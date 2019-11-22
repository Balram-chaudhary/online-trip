<html>
<head>
</head>
<body bgcolor="grey">

<table class="body-wrap" >
	<tbody><tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

			<div class="content">
			<table>
				<tbody><tr>
					<td>
						
						<h3 style="color:green">Welcome, {{ $maildata['name'] }}</h3>
						
						
						<!-- A Real Hero (and a real human being) -->
						<!-- /hero -->
						
						<!-- Callout Panel -->
						<p class="callout">
						You are invited to create a new account on  by Triporbtz.com.Follow the link to complete your Signup profile.
							 <a href="{{route('signup.password',[$maildata['id']])}}">Click Here»</a>
						</p><!-- /Callout Panel -->
					
												
						<br>
						<br>							
									
					
					
					</td>
				</tr>
			</tbody></table>
			</div>
									
		</td>
		<td></td>
	</tr>
</tbody></table><!-- /BODY -->
</body>
</html>