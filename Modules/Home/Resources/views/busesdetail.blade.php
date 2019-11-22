@include('layouts.frontend.menu.commonmenu')

@section('content')

<div class="container-fluid">
		<div class="jumbotron">
			<div class="container polaroid-box">
				<div class="row">
					<div class="col-md-9 col-sm-8 col-xs-12">
						<h3>Bus Name</h3>
						<small>Description</small>
						<small>Description location</small>
						<hr>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="container">
							<div class="room-selector">
								<h4 class="">Rs&nbsp;{{$busdetail->price}}</h4>
								<input type="button" class="btn btn-primary" value="Choose Bus">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-9 col-sm-8 col-xs-12">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#flights">Bus</a></li>
							<li><a data-toggle="tab" href="#policies">Policies</a></li>
						</ul>
						<div class="tab-content">
							<div id="flights" class="tab-pane fade in active">
								<h3>Bus</h3>
								<div class="container w3-example " style="padding: 22px;">
									<div class="row" style="margin-right: 10px;">
										<div class="col-md-4 form-left-agileits-w3layouts editContent" id="tdate">
											<label class="editContent"><span class="fa fa-bus" aria-hidden="true"></span> Travel Date</label>
											<div class="agileits_w3layouts_main_gridl">
												<input class="date has Datepicker btn-height" id="datepicker1" type="text" value="{{$departurebus}}" required="required" name="tdate">
											</div>
										</div>

										<div class="col-md-4 form-left-agileits-w3layouts editContent" id="nseats">
											<label class="editContent">Number of Seats</label>
											<div class="agileits_w3layouts_main_gridl">
												<input  name="nseats" type="text" value="{{$numseats}}" required="required" id="numseats">
											</div>
										</div>
										
										<div class="col-md-4 form-left-agileits-w3layouts">
											<label class="editContent">
												<span class="" aria-hidden="true"></span>
											</label>		
											<button class="btn btn-primary btn-block busavailibility" type="button"  onclick="search_databus()">Check Availability</button>

											
										</div>
									</div>
									<div class="container">

										<div class="row w3-example zoom" id="availablebus">
											<div class="col-md-3">
												<div>
													
													<img class="photo-container" src="{{url('triporbitz/public/images/'.$busdetail->image)}}" alt="hotelImage">
													<br>
													<small>{{$busdetail->oname}}</small>
												</div>
											</div>

										</p>
											<div class="col-md-3">
												<h5>From</h5>
											<i class="fa fa-bus"></i>
											
												<small>{{$frombus}}</small>

												<hr>
												
												<li style="text-decoration: underline;">Highlights
													<i class="glyphicon glyphicon-ok"> Free Meal </i>
													
												</li>
											</div>
											<div class="col-md-3">
												<h5>To </h5>
												<i class= "fa fa-bus"></i>
												<small>{{$tobus}}</small>
												<hr>
												
												
											</div>
											<div class="col-md-3">
												<label class="editContent">
													<span class="" aria-hidden="true"></span>
												</label>	
												<p class="pull-right" style="text-decoration:underline;">Rs &nbsp;{{$busdetail->price}}</p>
<a class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#completeBooking" style="margin-top: 35px;">Book Seat 
												</a>		
												<br>
												<small class="pull-right">4 Seats left</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							
							<div id="policies" class="tab-pane fade">
								<h3>Policies</h3>
								<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
							</div>
						</div>


					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<!-- Average Rating -->
					</div>
				</div>
			</div>

		</div>
	</div>
	

		

 
@include('layouts.frontend.main')