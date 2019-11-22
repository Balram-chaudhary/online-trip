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
	<link href="{{asset('triporbitz/public/frontend/css/footerforeview.css')}}" rel="stylesheet" type="text/css" media="all" />
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
								<li><a class="page-scroll scroll" href="#home">Home</a></li>
								<li><a class="page-scroll scroll" href="{{route('property.listing')}}">Add your property</a></li>
								<li><a class="page-scroll scroll" href="#popular">Popular offers</a></li>
								<li class="pull-right"><a class="" href="#signIn">Sign In</a></li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</div>
					<!-- /.container -->
				</nav>  
			</div>	
			<!-- //header -->
<div class="col-sm-8">
<div class="travellerdetail-title2 col-sm-4">
<h3>Booking Details</h3>
</div>
</div>
<div class="reviewdetails col-sm-8">
	 <div class="row col-sm-12">
	<div class="col-sm-4">
		<img class="modal-photo-container12" src="{{asset('triporbitz/public/frontend/images/chitwan.jpg')}}" alt="hotelImage">
	</div>
	<div class="col-sm-8 inform">
		<h3 class="marginh">Hotel Name</h3>
		<h4 class="marginh">Address</h4>
		<h4 class="marginh">Room Type</h4>
		<h4 class="marginh">Amenities</h4>
         <ul class="facility">
         	<li>facilities1</li>
         	<li>facilities2</li>
         	<li>facilities3</li>
         	<li>facilities4</li>
         </ul>

	</div>
</div>
<div class="row col-sm-12 informdate">
	<div class="col-sm-2">
		<h4>Check In Date</h4>
		<h5>2018/03/23</h5>
	</div>
	<div class="col-sm-2">
		<h4>Check Out Date</h4>
		<h5>2018/03/26</h5>

	</div>
	<div class="col-sm-2">
		
		<h4>No. of Days</h4>
		<h5>23</h5>
	</div>
	<div class="col-sm-2">
		<h4>No. of aduit/child</h4>
		<h5>23</h5>
	</div>

	<div class="col-sm-2">
		<a  data-toggle="modal" data-target="#cancelation">
		<h5 class="underline">Cancelation Policy</h5></a>
	</div>
</div>
</div>
<div class="col-sm-4 amountdetaidiv fixed">
	<ul class="amountdetai">
         	<li><label  class="col-sm-5">Hotel Charges:</label><span>234</span> </li>
         	<li><label class="col-sm-5">Duty And Tax:</label><span>235</span></li>
         	<li><label class="col-sm-5">Convenience fee:</label><span>235</span></li>
         	<li><label class="col-sm-5">Tatal Amoutn:</label><span>234</span></li>
         	<li><label class="col-sm-5">Discount:</label><span>233</span></li>
         	<li><label class="col-sm-5">Net Amount:</label><span>234</span></li>
         </ul>
</div>
<div class="container-fluid">
			<div id="cancelation" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<div class="class-center">
								<h4 class="modal-title">
									Cancelation Policy
								</h4>
							</div>
						</div>
						<div class="modal-body">
	The first step prior to writing the cancellation letter is to look to your policy to see if there are any provisions regarding cancellation and notification of your insurer. There may be instructions regarding how to cancel your policy – how many days notice you need to provide and to whom the letter should be addressed. You will want to follow any specific instructions contained in your insurance policy regarding cancellation. However, oftentimes the cancellation provision in an insurance policy only references cancellation by the insurer. If there are no specific instructions regarding cancellation by you, all you will need is your insurer’s contact information.

	Once you have reviewed your policy for specific instructions regarding cancellation, if any, and the contact information for your insurance company, you’ll be ready to write the letter. Here is an insurance sample cancellation letter to use as a starting point – remember, be sure to follow any specific requirements in your insurance policy as well:
						</div>
					</div>
				</div>
            </div>
		</div>				
	</div>
	 <div class="container-fluid container-fluid2 col-sm-8">
	 	<div class="travellerdetail-title2 col-sm-4">
						
						<h3>Enter Traveller Details</h3>
						
					</div>
			
			<div class="travellerdetail2 col-sm-4">
				
					<div class="travellerdetail-form2">
						<form action="{{route('hotel.payment')}}" id="travellerDetail_form" method="POST">
							{{csrf_field()}}
						<div class="container-fluidw">
							<div class="row form-group travellerdetail">
								
									<div class="col-md-4">
										
										<input type="email" class="form-control " id="travelleremail" name="emailCompleteBooking" placeholder="Enter Email address" required="required">
									</div>
									<div class="col-md-4">
									 
							<select name="countryCode" id="travellercountrycode">	
								<optgroup label="something">
									<option data-countryCode="GB" value="44">UK (+44)</option>
									<option data-countryCode="US" value="1">USA (+1)</option>
									<option data-countryCode="DZ" value="213">Algeria (+213)</option>
									<option data-countryCode="AD" value="376">Andorra (+376)</option>
									<option data-countryCode="AO" value="244">Angola (+244)</option>
									<option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
									<option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
									<option data-countryCode="AR" value="54">Argentina (+54)</option>
									<option data-countryCode="AM" value="374">Armenia (+374)</option>
									<option data-countryCode="AW" value="297">Aruba (+297)</option>
									<option data-countryCode="AU" value="61">Australia (+61)</option>
									<option data-countryCode="AT" value="43">Austria (+43)</option>
									<option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
									<option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
									<option data-countryCode="BH" value="973">Bahrain (+973)</option>
									<option data-countryCode="BD" value="880">Bangladesh (+880)</option>
									<option data-countryCode="BB" value="1246">Barbados (+1246)</option>
									<option data-countryCode="BY" value="375">Belarus (+375)</option>
									<option data-countryCode="BE" value="32">Belgium (+32)</option>
									<option data-countryCode="BZ" value="501">Belize (+501)</option>
									<option data-countryCode="BJ" value="229">Benin (+229)</option>
									<option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
									<option data-countryCode="BT" value="975">Bhutan (+975)</option>
									<option data-countryCode="BO" value="591">Bolivia (+591)</option>
									<option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
									<option data-countryCode="BW" value="267">Botswana (+267)</option>
									<option data-countryCode="BR" value="55">Brazil (+55)</option>
									<option data-countryCode="BN" value="673">Brunei (+673)</option>
									<option data-countryCode="BG" value="359">Bulgaria (+359)</option>
									<option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
									<option data-countryCode="BI" value="257">Burundi (+257)</option>
									<option data-countryCode="KH" value="855">Cambodia (+855)</option>
									<option data-countryCode="CM" value="237">Cameroon (+237)</option>
									<option data-countryCode="CA" value="1">Canada (+1)</option>
									<option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
									<option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
									<option data-countryCode="CF" value="236">Central African Republic (+236)</option>
									<option data-countryCode="CL" value="56">Chile (+56)</option>
									<option data-countryCode="CN" value="86">China (+86)</option>
									<option data-countryCode="CO" value="57">Colombia (+57)</option>
									<option data-countryCode="KM" value="269">Comoros (+269)</option>
									<option data-countryCode="CG" value="242">Congo (+242)</option>
									<option data-countryCode="CK" value="682">Cook Islands (+682)</option>
									<option data-countryCode="CR" value="506">Costa Rica (+506)</option>
									<option data-countryCode="HR" value="385">Croatia (+385)</option>
									<option data-countryCode="CU" value="53">Cuba (+53)</option>
									<option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
									<option data-countryCode="CY" value="357">Cyprus South (+357)</option>
									<option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
									<option data-countryCode="DK" value="45">Denmark (+45)</option>
									<option data-countryCode="DJ" value="253">Djibouti (+253)</option>
									<option data-countryCode="DM" value="1809">Dominica (+1809)</option>
									<option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
									<option data-countryCode="EC" value="593">Ecuador (+593)</option>
									<option data-countryCode="EG" value="20">Egypt (+20)</option>
									<option data-countryCode="SV" value="503">El Salvador (+503)</option>
									<option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
									<option data-countryCode="ER" value="291">Eritrea (+291)</option>
									<option data-countryCode="EE" value="372">Estonia (+372)</option>
									<option data-countryCode="ET" value="251">Ethiopia (+251)</option>
									<option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
									<option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
									<option data-countryCode="FJ" value="679">Fiji (+679)</option>
									<option data-countryCode="FI" value="358">Finland (+358)</option>
									<option data-countryCode="FR" value="33">France (+33)</option>
									<option data-countryCode="GF" value="594">French Guiana (+594)</option>
									<option data-countryCode="PF" value="689">French Polynesia (+689)</option>
									<option data-countryCode="GA" value="241">Gabon (+241)</option>
									<option data-countryCode="GM" value="220">Gambia (+220)</option>
									<option data-countryCode="GE" value="7880">Georgia (+7880)</option>
									<option data-countryCode="DE" value="49">Germany (+49)</option>
									<option data-countryCode="GH" value="233">Ghana (+233)</option>
									<option data-countryCode="GI" value="350">Gibraltar (+350)</option>
									<option data-countryCode="GR" value="30">Greece (+30)</option>
									<option data-countryCode="GL" value="299">Greenland (+299)</option>
									<option data-countryCode="GD" value="1473">Grenada (+1473)</option>
									<option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
									<option data-countryCode="GU" value="671">Guam (+671)</option>
									<option data-countryCode="GT" value="502">Guatemala (+502)</option>
									<option data-countryCode="GN" value="224">Guinea (+224)</option>
									<option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
									<option data-countryCode="GY" value="592">Guyana (+592)</option>
									<option data-countryCode="HT" value="509">Haiti (+509)</option>
									<option data-countryCode="HN" value="504">Honduras (+504)</option>
									<option data-countryCode="HK" value="852">Hong Kong (+852)</option>
									<option data-countryCode="HU" value="36">Hungary (+36)</option>
									<option data-countryCode="IS" value="354">Iceland (+354)</option>
									<option data-countryCode="IN" value="91">India (+91)</option>
									<option data-countryCode="ID" value="62">Indonesia (+62)</option>
									<option data-countryCode="IR" value="98">Iran (+98)</option>
									<option data-countryCode="IQ" value="964">Iraq (+964)</option>
									<option data-countryCode="IE" value="353">Ireland (+353)</option>
									<option data-countryCode="IL" value="972">Israel (+972)</option>
									<option data-countryCode="IT" value="39">Italy (+39)</option>
									<option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
									<option data-countryCode="JP" value="81">Japan (+81)</option>
									<option data-countryCode="JO" value="962">Jordan (+962)</option>
									<option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
									<option data-countryCode="KE" value="254">Kenya (+254)</option>
									<option data-countryCode="KI" value="686">Kiribati (+686)</option>
									<option data-countryCode="KP" value="850">Korea North (+850)</option>
									<option data-countryCode="KR" value="82">Korea South (+82)</option>
									<option data-countryCode="KW" value="965">Kuwait (+965)</option>
									<option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
									<option data-countryCode="LA" value="856">Laos (+856)</option>
									<option data-countryCode="LV" value="371">Latvia (+371)</option>
									<option data-countryCode="LB" value="961">Lebanon (+961)</option>
									<option data-countryCode="LS" value="266">Lesotho (+266)</option>
									<option data-countryCode="LR" value="231">Liberia (+231)</option>
									<option data-countryCode="LY" value="218">Libya (+218)</option>
									<option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
									<option data-countryCode="LT" value="370">Lithuania (+370)</option>
									<option data-countryCode="LU" value="352">Luxembourg (+352)</option>
									<option data-countryCode="MO" value="853">Macao (+853)</option>
									<option data-countryCode="MK" value="389">Macedonia (+389)</option>
									<option data-countryCode="MG" value="261">Madagascar (+261)</option>
									<option data-countryCode="MW" value="265">Malawi (+265)</option>
									<option data-countryCode="MY" value="60">Malaysia (+60)</option>
									<option data-countryCode="MV" value="960">Maldives (+960)</option>
									<option data-countryCode="ML" value="223">Mali (+223)</option>
									<option data-countryCode="MT" value="356">Malta (+356)</option>
									<option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
									<option data-countryCode="MQ" value="596">Martinique (+596)</option>
									<option data-countryCode="MR" value="222">Mauritania (+222)</option>
									<option data-countryCode="YT" value="269">Mayotte (+269)</option>
									<option data-countryCode="MX" value="52">Mexico (+52)</option>
									<option data-countryCode="FM" value="691">Micronesia (+691)</option>
									<option data-countryCode="MD" value="373">Moldova (+373)</option>
									<option data-countryCode="MC" value="377">Monaco (+377)</option>
									<option data-countryCode="MN" value="976">Mongolia (+976)</option>
									<option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
									<option data-countryCode="MA" value="212">Morocco (+212)</option>
									<option data-countryCode="MZ" value="258">Mozambique (+258)</option>
									<option data-countryCode="MN" value="95">Myanmar (+95)</option>
									<option data-countryCode="NA" value="264">Namibia (+264)</option>
									<option data-countryCode="NR" value="674">Nauru (+674)</option>
									<option data-countryCode="NP" value="977">Nepal (+977)</option>
									<option data-countryCode="NL" value="31">Netherlands (+31)</option>
									<option data-countryCode="NC" value="687">New Caledonia (+687)</option>
									<option data-countryCode="NZ" value="64">New Zealand (+64)</option>
									<option data-countryCode="NI" value="505">Nicaragua (+505)</option>
									<option data-countryCode="NE" value="227">Niger (+227)</option>
									<option data-countryCode="NG" value="234">Nigeria (+234)</option>
									<option data-countryCode="NU" value="683">Niue (+683)</option>
									<option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
									<option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
									<option data-countryCode="NO" value="47">Norway (+47)</option>
									<option data-countryCode="OM" value="968">Oman (+968)</option>
									<option data-countryCode="PW" value="680">Palau (+680)</option>
									<option data-countryCode="PA" value="507">Panama (+507)</option>
									<option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
									<option data-countryCode="PY" value="595">Paraguay (+595)</option>
									<option data-countryCode="PE" value="51">Peru (+51)</option>
									<option data-countryCode="PH" value="63">Philippines (+63)</option>
									<option data-countryCode="PL" value="48">Poland (+48)</option>
									<option data-countryCode="PT" value="351">Portugal (+351)</option>
									<option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
									<option data-countryCode="QA" value="974">Qatar (+974)</option>
									<option data-countryCode="RE" value="262">Reunion (+262)</option>
									<option data-countryCode="RO" value="40">Romania (+40)</option>
									<option data-countryCode="RU" value="7">Russia (+7)</option>
									<option data-countryCode="RW" value="250">Rwanda (+250)</option>
									<option data-countryCode="SM" value="378">San Marino (+378)</option>
									<option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
									<option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
									<option data-countryCode="SN" value="221">Senegal (+221)</option>
									<option data-countryCode="CS" value="381">Serbia (+381)</option>
									<option data-countryCode="SC" value="248">Seychelles (+248)</option>
									<option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
									<option data-countryCode="SG" value="65">Singapore (+65)</option>
									<option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
									<option data-countryCode="SI" value="386">Slovenia (+386)</option>
									<option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
									<option data-countryCode="SO" value="252">Somalia (+252)</option>
									<option data-countryCode="ZA" value="27">South Africa (+27)</option>
									<option data-countryCode="ES" value="34">Spain (+34)</option>
									<option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
									<option data-countryCode="SH" value="290">St. Helena (+290)</option>
									<option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
									<option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
									<option data-countryCode="SD" value="249">Sudan (+249)</option>
									<option data-countryCode="SR" value="597">Suriname (+597)</option>
									<option data-countryCode="SZ" value="268">Swaziland (+268)</option>
									<option data-countryCode="SE" value="46">Sweden (+46)</option>
									<option data-countryCode="CH" value="41">Switzerland (+41)</option>
									<option data-countryCode="SI" value="963">Syria (+963)</option>
									<option data-countryCode="TW" value="886">Taiwan (+886)</option>
									<option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
									<option data-countryCode="TH" value="66">Thailand (+66)</option>
									<option data-countryCode="TG" value="228">Togo (+228)</option>
									<option data-countryCode="TO" value="676">Tonga (+676)</option>
									<option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
									<option data-countryCode="TN" value="216">Tunisia (+216)</option>
									<option data-countryCode="TR" value="90">Turkey (+90)</option>
									<option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
									<option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
									<option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
									<option data-countryCode="TV" value="688">Tuvalu (+688)</option>
									<option data-countryCode="UG" value="256">Uganda (+256)</option>
									<!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
									<option data-countryCode="UA" value="380">Ukraine (+380)</option>
									<option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
									<option data-countryCode="UY" value="598">Uruguay (+598)</option>
									<!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
									<option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
									<option data-countryCode="VU" value="678">Vanuatu (+678)</option>
									<option data-countryCode="VA" value="379">Vatican City (+379)</option>
									<option data-countryCode="VE" value="58">Venezuela (+58)</option>
									<option data-countryCode="VN" value="84">Vietnam (+84)</option>
									<option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
									<option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
									<option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
									<option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
									<option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
									<option data-countryCode="ZM" value="260">Zambia (+260)</option>
									<option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
								</optgroup>
							</select>
									</div>
									<div class="col-md-4">
										
										<input type="tel" class="form-control" id="travellerphone" name="phoneNoCompleteBooking" placeholder="Enter phone number" required="required">
									</div>
							</div>
							<div class="Itinerary">
								<label>Your xyz Itinerary Will be sent to this address</label>
							    <label>Gest:1</label>
							     <div class="row">
		                           
		                            <table class="table traveller" id="traveller">
									<thead>
										<tr>
										<td>
											<div class="fname">	
											<input type="text" class="form-control" name="firstName[]" id="travellerfirstName"  placeholder="                 Enter first name" required="required">

											<div class="genderlist">
													<select class="selection">
														<option>Ms</option>
														<option>Mr</option>
														<option>Mrs</option>
													</select>
												</div>
									  </div>

									  </td>
										<td>			
											<input type="text" name="middleName[]" class="form-control"  id="travellermiddleName" placeholder="Enter middle name" required="required">
										</td>
											<td>
											<input type="text" name="lastName[]"  class="form-control" id="travellerlastName" required="required" placeholder="Enter last name">
									  </td>
										
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
                                  </div>
							</div>
						</div>
						
					  </form>
					</div>
				</div>
	</div>
<div class="col-sm-8">
<div class="travellerdetail-title2 col-sm-4">
	<h3>Payment Details</h3>
</div>
</div>
<div class="col-sm-12 paymentdiv">
<div class="tab col-sm-3 tabitemimg">
			<button class="tablinks" onclick="openCity(event, 'tab_item-0')" id="defaultOpen">Creditcard</button>
			<button class="tablinks"  onclick="openCity(event, 'tab_item-1')">Net Banking</button>
			<button  class="tablinks" onclick="openCity(event, 'tab_item-2')">Paypal</button> 
			<button class="tablinks" onclick="openCity(event, 'tab_item-3')">Debitcard</button>
</div>
<div class="paymentclass col-sm-6">
<div id="tab_item-0" class="tabcontent">
  <div class="payment-info">
     <h3>Personal Information</h3>
         <form class="form-horizontal">
         	 <div class="form-group">       
                <label class="control-label">EMAIL ADDRESS</label>
             </div>
     
		     <div class="form-group">   
		        <input type="text" class="form-control" value="">
		    </div>

		    <div class="form-group">   
		      <label class="control-label">FIRST NAME</label>   
		    </div>
      
		     <div class="form-group">                           
		      <input type="text" class="form-control" value="">
		     </div>      

			<div class="form-group">       
	          <label class="control-label">NAME ON CARD</label>
	        </div>

		     <div class="form-group"> 
		        <input type="text" class="form-control" value="">
		    </div>
     
            <div class="form-group"> 
             <label class="control-label">CARD NUMBER</label> 
            </div>                        
        
            <div class="form-group"> 
             <input class="form-control" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
             </div>  
        <div class="row">
	        <div class="form-group col-sm-4 expiraionnextfieldone">
	         	<label class="control-label">EXPIRATION</label>
	            <input type="number" class="form-control col-sm-2" value="6" min="1" />
	        </div>
	        <div class="form-group col-sm-3  expiraionnextfield">
	            <input type="number" class="form-control col-sm-2" value="1988" min="1" />
	       </div>
	      <div class="form-group col-sm-5 expiraionnextfieldtwo">
	        <label class="control-label ">CVV NUMBER</label>                   
	        <input type="PASSWORD" class="form-control col-sm-2" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required="">
	      </div>
        </div>
		  <div class="form-group">
			 <input type="checkbox" class="" id="brand" value="">
			 <label class="labelforbrand" for="brand">By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
		 </div>
			 <div class="form-group paymentsumit col-sm-3">
			    <input type="submit" class="form-control" value="SUBMIT">
			 </div>
    </form>
  </div>
</div>
<div id="tab_item-1" class="tabcontent" style="display: none;">
 <div class="payment-info">
  <h3>Net Banking</h3>
  <div class="radio-btns radioforgrid">
    <div class="swit">                
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>Rastriya Banijya Bank </label> </div></div>
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Prabhu Bank  </label> </div></div>
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Janata Bank Nepal</label> </div></div>
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Nabil Bank  </label> </div></div>  
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Nepal Investment Bank </label> </div></div>
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Laxmi Bank  </label> </div></div>  
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Himalayan Bank </label> </div></div> 
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Everest Bank </label> </div></div> 
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Kumari Bank </label> </div></div>
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Bank of Kathmandu </label> </div></div>    
    </div>
    <div class="swit">                
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>Global IME Bank </label> </div></div>
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Citizens Bank International </label> </div></div>
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Prime Commercial Bank </label> </div></div>
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Sunrise Bank </label> </div></div>
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>NMB Bank </label> </div></div> 
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>NIC Asia Bank </label> </div></div>
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Machhapuchhre Bank </label> </div></div> 
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Mega Bank Nepal </label> </div></div>  
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Civil Bank </label> </div></div> 
      <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Century Bank </label> </div></div> 
    </div>
    <div class="clear"></div>
  </div>
  <a href="#">Continue</a>
 </div>
</div>
<div id="tab_item-2" class="tabcontent" style="display: none;">
 <div class="payment-info">
  <div class="form-group">
     <h3>PayPal</h3>
   </div>
 <div class="form-group">
  <label class="control-label">Already Have A PayPal Account?</label>
  </div>
   <div class="form-group">
     <label class="control-label"> Login</label>
   </div>   
 <form class="form-horizontal">     
	<div class="form-group">
	<input type="text" class="form-control" value="name@email.com" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'name@email.com';}" required="">
	</div>
	<div class="form-group">
	<input type="password" class="form-control" value="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}" required="">
	</div>
	 <div class="form-group">
	 <input type="checkbox" value=""><label  class="labelforbrand" for="brand">Remember me?</label>
	</div>     
	<div class="form-group paymentsumit col-sm-3">
	<input type="submit" class="form-control" value="LOGIN">
	</div>
 </form>
 </div>
</div>
<div id="tab_item-3" class="tabcontent" style="display: none;">
  <div class="payment-info">
  
   <div class="form-group">
  <h3>Dedit Card Info</h3>
</div>
  
  <form class="form-horizontal">    
       <h5>NAME ON CARD</h5>
	        <div class="form-group">
	        <input class="form-control" type="text" value="">
	        </div>
        <h5>CARD NUMBER</h5>                          
       
       <div class="form-group">
        <input class="form-control" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
       </div>  
    

     <div class="row debitcard">
        <div class="form-group col-sm-4">
         	<label class="control-label">EXPIRATION</label>
            <input type="number" class="form-control col-sm-2" value="6" min="1" />
        </div>
        <div class="form-group col-sm-4 classexpitration">
            <input type="number" class="form-control col-sm-2" value="1988" min="1" />
        </div>
        <div class="form-group col-sm-4">
        <label class="control-label">CVV NUMBER</label>                   
        <input type="text" class="form-control col-sm-2" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required="">
      </div>
    </div>

	  <div class="form-group">
		 <input type="checkbox" class="" value="">
		 <label  class="labelforbrand" for="brand">By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
	 </div>
	      
	 <div class="form-group paymentsumit col-sm-3">
	    <input type="submit" class="form-control" value="SUBMIT">
	 </div>
 </form>
</div>
</div>
</div>
</div>		
</div>

@include('layouts.frontend.main')