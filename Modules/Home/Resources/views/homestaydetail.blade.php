@include('layouts.frontend.menu.commonmenu')
@section('content')
<div class="container-fluid">
		<div class="jumbotron">
			<div class="container polaroid-box">
				<div class="row">


					<div class="col-md-9 col-sm-8 col-xs-12">
						<h3>{{$homestay->hname}}</h3>
						<small>{{$homestay->area}}&nbsp;,{{$homestay->city}}&nbsp;,{{$homestay->country}}</small>
					</div>
					
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="container">
							<div class="room-selector">
								<a href="#rooms"><input type="button" class="btn btn-primary" value="Choose Room"></a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
				   <div class="col-md-9 col-sm-9 col-xs-9 forresponsive">
						<ul class="nav nav-tabs">
					   		<li class="active"><a data-toggle="tab" href="#photos">Photos</a></li>
							<li><a data-toggle="" href="#rooms" class="roomss">Rooms</a></li>
							<li><a data-toggle="tab" href="#description">Description</a></li>
							<li><a  href="#amneties">Amenities</a></li>
							<li><a data-toggle="tab" href="#map">Map</a></li>
							<li><a data-toggle="tab" href="#policies">Policies</a></li>
						</ul>
						
			        <div class="tab-content">
		<!-- ......................... photos..................... -->
					<div id="photos" class="tab-pane fade in active">
                        <div class="col-md-12">
                        

                         <div class="row">
                          
                           <div class="col-md-8 exampleimage">
							  <a href="#" class="example-image-link" data-lightbox="Vacation" >
							  	<!-- <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span> -->
							  <img class="example-image" id="expandedImg" src="{{url('triporbitz/public/images/'.$images[0])}}">
							  </a>
							</div>
							<div class="col-md-1 column imagecolum">
                                             @foreach($images as $image)
			                    <img src="{{url('triporbitz/public/images/'.$image)}}" onmouseover="myFunction(this);">
					     @endforeach		
					       </div> 
					       

                        </div>
                      
                       </div>
                    </div>		


   <!-- ................Description...................... -->
							<div id="description" class="tab-pane fade">
								<h3>Description</h3>
								<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
							</div>
				<!-- ..........end of Description.............. -->

				<!-- ..............map..............			 -->
							<div id="map" class="tab-pane fade">
								<div class="container">
									
									
									<div class="map-sizing">
										{!! Mapper::render() !!}
									</div>
	                                
								</div>
							</div>
							
               <!-- ................policies...................... -->
							<div id="policies" class="tab-pane fade">
								<h3>Policies</h3>
								<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
							</div>
				<!-- ..........end of policies.............. -->
                    </div>
						</div>
                            <div class="col-md-3 chekinout">
								<label>Chekin :</label>{{$homestay->checkin}}  pm<br>
								<label>Chekout :</label>{{$homestay->checkout}} pm
				          </div>
				</div>
		</div>
      </div>
	</div>
	
	
<!-- .....................................Rooms............... -->
	<div id="rooms" class="">
   <label class="managelabel">Manage Rooms</label>
	<div class="container w3-example">
	<div class="row col-sm-12 roomsrow">

	          <div class="col-sm-2 form-left-agileits-w3layouts editContent">
					<label class="editContent"><span class="fa fa-bus" aria-hidden="true"></span>Check in </label>
					<div class="agileits_w3layouts_main_gridl">
						<input class="date has Datepicker btn-height" id="datepicker" name="checkin" type="text" value="{{$checkinhomestay}}" required="">
					</div>
				</div>

				<div class="col-sm-2 form-left-agileits-w3layouts editContent">
					<label class="editContent"><span class="fa fa-bus" aria-hidden="true"></span>Check out</label>
					<div class="agileits_w3layouts_main_gridl">
						<input class="date has Datepicker btn-height" id="datepicker1" name="checkout" type="text" value="{{$checkouthomestay}}"  required="">
					</div>
				</div>
				
				<div class="col-sm-2 form-left-agileits-w3layouts editContent">
					<label class="editContent"><span class="fa fa-users" aria-hidden="true"></span>Adults</label>
					<div class="agileits_w3layouts_main_gridl">
						<input  name="adults" type="number" value="{{$adultshomestay}}" required="" id="totaladult" min="1" >
					</div>
				</div>
				
	             <div class="col-sm-2 form-left-agileits-w3layouts editContent">
					<label class="editContent"><span class="fa fa-users" aria-hidden="true"></span>Childs</label>
					<div class="agileits_w3layouts_main_gridl">
						<input  name="childs" type="number" value="{{$childshomestay}}"  required="" id="totalchild" min="0" >
					</div>
				</div>
				
				 <div class="col-sm-2 form-left-agileits-w3layouts editContent" >
					<label class="editContent"><span class="fa fa-home" aria-hidden="true"></span>Rooms</label>
					<div class="agileits_w3layouts_main_gridl">
						<input  name="rooms" type="number" value="{{$roomshomestay}}"  required="" id="totalroom" min="1" >
					</div>
				</div>
				

				<div class="col-sm-2 form-left-agileits-w3layouts">		
					<button class="btn btn-primary btn-block" type="submit" onclick="search_data_availability()">Availability</button>
				</div>	
	 </div>
	</div>
<div class="container tableposition">
  <table class="col-sm-12 Tableborder">
    <thead>
      <tr>
        <th>Room Type</th>
        <th>Facility</th>
        <th>Price/Rate</th>
        <th>Reserve</th>
      </tr>
    </thead>
    <tbody id="avaialablerooms">
      @if(sizeof($rooms)>0)
    	@foreach($rooms as $r)
    	 @if($r->del_flag=='0')
      <tr>
      	<td>
      		<label>
      			@if($r->rtype=='s')Single @elseif($r->rtype=='d')Double @elseif($r->rtype=='t')Triple @elseif($r->rtype=='qd')Quard @elseif($r->rtype=='q')Queen @elseif($r->rtype=='k')King @elseif($r->rtype=='tw')Twin @elseif($r->rtype=='dd')Double Double @else Studio @endif
      		</label>
	        <div class="">
		     <img class="photo-container1" src="{{url('triporbitz/public/images/'.$r->rimage)}}" alt="hotelImage">
			</div>
        </td>
        <td>
          <div class="listfacility">
		 <li>
			<i class="fa fa-wifi" style="color:green;">&nbsp;free wifi</i>
			<i class="fa fa-coffee" style="color:green;">&nbsp;free Coffee</i>
		   
		</li>
	   </div>
     </td>
        <td>
        	<label>RS.{{$r->price}}&nbsp;(price per night)</label>
        </td>
     <td>
        	<div class="form-left-agileits-w3layouts">
		  <button class="btn btn-primary btn-block bookroomhomestay" type="button" data-toggle="modal" data-target="#paymentmodel" id="bookroomhomestay">Book Room</button>
		</div>

		<label>Few Rooms left</label>
	</td>
    
      </tr>    
       @endif
       @endforeach                    
                @else
                <tr>
                  <td colspan="3" align="center">-- No Record Found !! ---</td>
                </tr>
                 @endif

    </tbody>
  </table>
</div>
</div>
</div>

<!-- .................amneties........... -->
							<div id="amneties" class="for-gridfild">
								<ul id="amenitieshotel">
									<div class="for-grider1">
								@foreach($amenities as $amenity)	
						          <li><i class="fa fa-asterisk" aria-hidden="true"></i>{{$amenity}}</li>
								@endforeach	
							     </div>
								</ul>
							</div>

	<!-- .......................amneties end...................... -->


<!-- ................. model contain............. -->
               
  <div class="modal fade" id="paymentmodel" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">  
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body" id="paymentoption">
          <div id="paymentheader"><h3>Select your payment option</h3></div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<a href="{{route('homestay.review')}}" class="btn btn-primary" type="button" value="Pay Now">Pay Now</a>
						<ul id="paynow">
							<li>Orbitz will process your payment details.</li>
							<li>You will pay in your local currency (USD).</li>
							<li>Free cancellation.</li>
							<li>You can use your Orbitz coupon.</li>

						</ul>
					</div>
					<div class="col-md-6">
						<a href="{{route('homestay.review')}}" class="btn btn-primary" type="button" value="Pay at property">Pay at property</a>
						<ul id="payatproperty">
							<li>You will not be charged until your stay.</li>
							<li>Pay the hotel directly in IDR. Orbitz will not charge you.</li>
							<li>Free cancellation.</li>
						</ul>
					</div>
				</div>
				
			</div>
			
			
			

        </div>
        
      </div>
      
    </div>
  </div>

  <!-- ..............end model contain................... -->
@include('layouts.frontend.main')
