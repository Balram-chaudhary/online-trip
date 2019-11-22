<!doctype html>
<html lang="en">
<head>
<title>Triporbitz</title>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Optional theme -->
<link rel="stylesheet" href="{{asset('triporbitz/public/frontend/css/bootstrap.css')}}">
 <link rel="stylesheet" href="{{asset('triporbitz/public/frontend/css/propertyadd.css')}}">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>

	<nav class="navbar navbar-inverse bordernone">
      <div class="container-fluid head">
         <div class="navbar-header">
             <!-- <a class="navbar-brand" href="#"><img src="{{url('triporbitz/public/frontend/images/logo.png')}}" width="280" height="30"></a> -->
             <a class="navbar-brand" href="#">TripOrbitz.com</a>
         </div>
       </div>
</nav>



<div class="container">
   @if(Session::get('success_msg'))
          <div class="alert alert-success">
	         <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	          {{ Session::get('success_msg') }}
	       </div>
          @endif
          @if(Session::get('error_msg'))
          <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          {{ Session::get('error_msg') }}
          </div>
          @endif
 
</div>
<br>
<div class="container">

  <ul class="nav nav-tabs" id ="tabs" role="tablist">
    <li  id="step1li" class="active"><a data-toggle="tab"  aria-controls="step1" href="#step1" title="step 1">Step 1:<br> Add property</a></li>
    <li id="step2li" class="disabled"><a data-toggle="tab"   aria-controls="step2" href="#step2" title="step 2" >Step 2:<br>Hotel Info</a></li>
    <li  id="step3li" class="disabled"><a data-toggle="tab"  aria-controls="step3" href="#step3" title="step 3">Step 3:<br>Loction Map</a></li>
    <li id="step4li" class="disabled"><a data-toggle="tab"   aria-controls="step4" href="#step4" title="step 4">Step 4:<br>Room Price</a></li>
    <li id="step5li" class="disabled"><a data-toggle="tab"  aria-controls="step5" href="#step5" title="step 5">Step 5:<br>Photos</a></li>
    <li id="step6li" class="disabled"><a data-toggle="tab"   aria-controls="step6" href="#step6" title="step 6" >Step 6:<br>Amenities</a></li>
    
  </ul>
<form  enctype="multipart/form-data" class="form-horizontal barter" action="{{route('property.listing.submit')}}" method="post" name="listproperty">
{{csrf_field()}}
<div class="tab-content">
   

   <!--step1------------------------------>
    <div id="step1" class="tab-pane fade in active">
       <h3>Porperty Details</h3>
    
    <div class="form-group">
    <label class="control-label col-sm-2" for="">How did you come to know about us?*:</label>
    <div class="col-sm-offset-0 col-sm-5">
      <select name="information" class="form-control" placeholder="Enter hotel mane"  required="required" tabindex="1">
            <option value="w" selected="selected">Triporbitz Website</option> 
            <option value="f">Friends</option> 
            <option value="o">Others</option>  
       </select>
     </div>
     <span id="information" class="erro"></span>
   </div>
 
  <div class="form-group">
    <label class="control-label col-sm-2" for=" ">Hotel Name:</label>
    <div class=" col-sm-offset-0 col-sm-5"> 
      <input type="text" class="form-control" name="hname"  placeholder="Enter Hotel Name" tabindex="1" required="required">
    </div>
    <span id="hname" class="erro"></span>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="">Hotal Type*:</label>
    <div class=" col-sm-offset-0 col-sm-5">
      <select name="type" class="form-control" required="required"  tabindex="1">
            <option value="h" selected="selected">Hotel</option> 
            <option value="s">Homestay</option>   
       </select>
    </div>
    <span id="type" class="erro"></span>
 </div>

<div class="form-group">
    <label class="control-label col-sm-2" for=" ">Owner Name:</label>
    <div class=" col-sm-offset-0 col-sm-5"> 
      <input type="text" class="form-control" name="cperson"  placeholder="Enter Owner Name" tabindex="1" required="required">
    </div>
    <span id="cperson" class="erro"></span>
  </div>


 <div class="form-group">
    <label class="control-label col-sm-2" for="text">Hotel Description:</label>
    <div class=" col-sm-offset-0 col-sm-5"> 
       <textarea  class="form-control" name="description"  placeholder="Hotel Description" tabindex="1" required="required"></textarea>
    </div>
    <span id="description" class="erro"></span>
    </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="email">Star Rating*:</label>
    <div class=" col-sm-offset-0 col-sm-5">
      <select name="rating" class="form-control" tabindex="1" required="required">
            <option value="ur" selected="selected">Unrated</option> 
            <option value="1">1</option> 
            <option value="2">2</option> 
            <option value="3">3</option>
            <option value="4">4</option> 
            <option value="5">5</option>
        </select>
    </div>
    <span id="rating" class="erro"></span>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for=" ">Base currency*:</label>
    <div class=" col-sm-offset-0 col-sm-5">
      <select name="basecurrency" class="form-control" tabindex="1" required="required">
            <option value="n" selected="selected">Nepalease rupees</option>  
        </select>
    </div>
    <span id="basecurrency" class="erro"></span>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="text">No of Rooms*:</label>
    <div class=" col-sm-offset-0 col-sm-5"> 
<input type="number" class="form-control" name="nrooms"  placeholder="Enter Number of Rooms" value="1"  tabindex="1"  required="required" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
    </div>
    <span id="nrooms" class="erro"></span>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="">Country*:</label>
    <div class=" col-sm-offset-0 col-sm-5">
      <select name="country" class="form-control"  tabindex="1" required="required"> 
            <option value="n">Nepal</option> 
       </select>
     </div>
     <span id="country" class="erro"></span>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="">State*:</label>
    <div class=" col-sm-offset-0 col-sm-5">
      <select name="state" class="form-control" tabindex="1"  required="required">
           <option value="" selected="selected">--Select state--</option> 
           <option value="p1">Province 1</option> 
           <option value="p2">Province 2</option> 
           <option value="p3">Province 3</option> 
           <option value="p4">Province 4</option>
           <option value="p5">Province 5</option>
           <option value="p6">Province 6</option>
           <option value="p7">Province 7</option>  
         </select>
     </div>
     <span id="state" class="erro"></span>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for=" ">City*:</label>
    <div class=" col-sm-offset-0 col-sm-5">
      <input type="text" class="form-control" name="city"  placeholder="Enter City Name" tabindex="1" required="required">
    </div>
    <span id="city" class="erro"></span>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for=" ">Area*:</label>
    <div class=" col-sm-offset-0 col-sm-5">
      <input type="text" class="form-control" name="area"  placeholder="Enter Area Name" tabindex="1" required="required">
    </div>
    <span id="area" class="erro"></span>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for=" ">Base Price:</label>
    <div class=" col-sm-offset-0 col-sm-5">
      <input type="number" class="form-control" name="baseprice" min="0" placeholder="Enter Base price of hotel" tabindex="1" min="0" value="1" maxLength="10"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
  required="required">
    </div>
    <span id="baseprice" class="erro"></span>
</div>


<div class="form-group"> 
    <div class="col-sm-offset-10 col-sm-2">
      <button type="button" id="continue1" class="btn btn-default">continue</button>
    </div>
</div>


</div>






<!--step2------------------------------>
<div id="step2" class=" tab-pane fade ">
 <h3>Hotal info</h3>

<div class="form-group">
    <label class="control-label col-sm-2" for="phone">Hotal Phone*:</label>
    <div class="col-sm-offset-0 col-sm-5">
    	<div class="input-group">
     <span class="input-group-addon">021</span>
          <input name="phone" type="number" class="form-control" minLength="6"  maxLength="6" oninput="javascript: if(this.value.length>this.maxLength) this.value = this.value.slice(0, this.maxLength);" onchange="javascript: if(this.value.length < this.minLength){document.getElementById(this.name).innerHTML ='Phone Number Must be 6 digits';}else{document.getElementById(this.name).innerHTML ='';};" required="required">
         </div>
    </div>
    <span id="phone" class="erro"></span>
 </div>


<div class="form-group">
    <label class="control-label col-sm-2" for="phone">Hotal mobile*:</label>
    <div class="col-sm-offset-0 col-sm-5">
      <div class="input-group">
     <span class="input-group-addon">+977-98</span>
         	<input name="mobile" type="number" class="form-control" minLength="8"  maxLength="8" oninput="javascript: if(this.value.length>this.maxLength) this.value = this.value.slice(0, this.maxLength);" onchange="javascript: if(this.value.length < this.minLength){document.getElementById(this.name).innerHTML ='Mobile Number Must be 8 digits';}else{document.getElementById(this.name).innerHTML ='';};" required="required">

         </div>
    </div>
    <span id="mobile" class="erro"></span>
</div>


<div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-offset-0 col-sm-5">
       <input type="email" name="email" class="form-control" required="required">
    </div>
    <span id="email" class="erro"></span>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="time">chekin time*:</label>
    <div class="col-sm-offset-0 col-sm-5">
    	<input type="time"  name="checkin" required="required" class="form-control">
    </div>
    <span id="checkin" class="erro"></span>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="time">chekout time*:</label>
    <div class="col-sm-offset-0 col-sm-5">
    	<input type="time" name="checkout" required="required" class="form-control">
    </div>
    <span id="checkout" class="erro"></span>
  </div>

<div class="form-group"> 
    <div class="col-sm-offset-10 col-sm-2">
      <button type="button" id="continue2" class="btn btn-default">continue</button>
    </div>
</div>

</div>  

<!-- --step3----------------------------- -->

<div id="step3" class="tab-pane fade">
<h3>Location Maps</h3>
<p>Please Visit longlat.net website for your address's Longitude Latitude. </p><br>

<div class="form-group">
    <label class="control-label col-sm-2" for="time">Latitude*:</label>
    <div class="col-sm-offset-0 col-sm-5">
    	<input type="text" name="latitude" required="required" class="form-control" placeholder="Please Enter Latitude value of Your Place,like:26.377819">
    </div>
     <span id="latitude" class="erro"></span>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="time">Longitude*:</label>
    <div class="col-sm-offset-0 col-sm-5">
    	<input type="text" name="longitude" required="required" class="form-control" placeholder="Please Enter Longitude value of Your Place,like:87.747391">
   </div>
   <span id="longitude" class="erro"></span>
</div>

<div class="form-group"> 
    <div class="col-sm-offset-10 col-sm-2">
      <button type="button"  id="continue3" class="btn btn-default">continue</button>
    </div>
</div>

</div>

<!--step4------------------------------>
<div id="step4" class="tab-pane fade">
<h3>Base Room Type & price</h3>
<div id="addroom">
<div class="form-group">
    <label class="control-label col-sm-2" for="Room">Room Type*:</label>
    <div class="col-sm-offset-0 col-sm-5">
    	<select name="roomtype" required="required">
                      <option value="s">Single</option>
                 </select>
    </div>
     <span id="roomtype" class="erro"></span>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="Location" >Per Night Price*:</label>
    <div class="col-sm-offset-0 col-sm-5">
    	<input type="number"  name="price" required="required" class="form-control" placeholder="Enter only price Eg:2000." min="0" value="1" maxLength="10"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
    </div>
     <span id="price" class="erro"></span>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="Location" >Number of rooms*:</label>
    <div class="col-sm-offset-0 col-sm-5">
    	<input type="number"  name="noofrooms" required="required" class="form-control" placeholder="Enter Number of Rooms." min="1" value="1" maxLength="5"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
    </div>
     <span id="noofrooms" class="erro"></span>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="Location" >Number of Childerens*:</label>
    <div class="col-sm-offset-0 col-sm-5">
    	<input type="number"  name="childrens" required="required" class="form-control" placeholder="Enter Maximum number of childrens ." min="1" value="1" maxLength="3"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
    </div>
     <span id="childrens" class="erro"></span>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="Location" >Number of Adults*:</label>
    <div class="col-sm-offset-0 col-sm-5">
    	<input type="number"  name="adults" required="required" class="form-control" placeholder="Enter Maximum Number of Adults." min="1" value="1" maxLength="3"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
    </div>
     <span id="adults" class="erro"></span>
</div>
</div>

<div class="form-group"> 
<input type="file" name="rimage" id="image2" required="required">
	<!-- <button id="imagebutton" ><i class="fa fa-plus"></i></button> -->
<label>upload RoomType Images</label>
<span id="rimage" class="erro"></span>
</div>



<div class="form-group">
<div class="col-sm-offset-2 col-sm-5">
<input type="checkbox" id="dn" name="taxincluded" value="1" tabindex="7">Taxes Included:
<span id="taxincluded" class="erro"></span>
<input type="checkbox" id="dn" name="payathotel" value="1" tabindex="7">Pay@Hotel
<span id="payathotel" class="erro"></span> 
<a href="#">Terms & conditons:</a>
</div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="Address">Cancellation Rule*:</label>
</div>

<div class="form-group">
<div class="col-sm-offset-1 col-sm-12">
<li>
<input type="checkbox" name="cancelationrule[]" value="1" id="Accommodation">
Free cancelation within 24 Hour.
<span id="cancelationrule[]" class="erro"></span>
</li>
<li>
<input type="checkbox" name="cancelationrule[]" value="1" id="Accommodation">
If you cancel your hotel booking before 48 hrs of Check-In date, Cancellation charges will be 10% Cost of Total Cost.
<span id="cancelationrule[]" class="erro"></span>
</li>
<li>
<input type="checkbox" name="cancelationrule[]" value="1" id="Accommodation">
If you cancel your hotel booking before 72 hrs of Check-In date, Cancellation charges will be 15% Cost of Total Cost.
<span id="cancelationrule[]" class="erro"></span>
</li>
</div>
</div>

<div class="form-group"> 
    <div class="col-sm-offset-10 col-sm-2">
      <button type="button" id="continue4" class="btn btn-default">continue</button>
    </div>
</div>

</div>


<!--step5------------------------------>
<div id="step5" class="tab-pane fade">
<h3>Instractions</h3>
<hr><p>
  Browse your files and select the pictures to upload Check the message on the image to identity their quality.
</p>
<p>
     <br>Low resolution image(below 800x1200 pixels)
     <br>Medium resolution images(above 1536x2048) 
     <br>Medium resolution images(above 1536x2048) 
 </p>
<p>
     <label>Tip:</label>High resolution image(at least 800x1200 pixels)will help your hotel convert better, which means even more boooings!
</p>
<p>
<label>Note:</label>
	<br>You can edit Image affer upload also.
	<br>To make an image as master image drag it to the first location.
	<br>Max Image size Limit:10MB
	<br>
</p>


<div class="form-group"> 
<input type="file" id="image" name="image1[]"  multiple="multiple" required="required">
	<!-- <button id="imagebutton" ><i class="fa fa-plus"></i></button> -->
<label>Upload Hotel Images</label>
<span id="image1[]" class="erro"></span>
</div>


<div class="form-group"> 
    <div class="col-sm-offset-10 col-sm-2">
      <button type="button" id="continue5" class="btn btn-default">continue</button>
    </div>
</div>



</div>




<!--step6------------------------------>
<div id="step6" class="tab-pane fade">
<h3>Amenities</h3>


<div>
<a href="#demo" data-toggle="collapse"><i class="fa fa-plus">Amenities</i></a>
<div id="demo" class="collapse">

<input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="localtourtraveldesk">
      <span class="custom-control-description">Local Tour /Travel Desk</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="clothesrack">
      <span class="custom-control-description">Clothes Rack</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="dryingrack">
      <span class="custom-control-description">Drying Rack For Clothing</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="foldupbed">
      <span class="custom-control-description">Fold-Up Bed</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="aircondition">
      <span class="custom-control-description">Air Conditioning</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="wardrobe">
      <span class="custom-control-description">Wardrobe/Closet</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="carpeted">
      <span class="custom-control-description">Carpeted</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="dressingroom">
      <span class="custom-control-description">Dressing Room</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="extralongbed">
      <span class="custom-control-description">Extra Long Beds(>2 meters)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="Fan">
      <span class="custom-control-description">Fan</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="fireplace">
      <span class="custom-control-description">FirePlace</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="heating">
      <span class="custom-control-description">Heating</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="Iron">
      <span class="custom-control-description">Iron</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="parking">
      <span class="custom-control-description">Parking(Complementary)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="newspaperlobby">
      <span class="custom-control-description">Newspaper In Lobby</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="wifi">
      <span class="custom-control-description">Wifi</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="24hours security">
      <span class="custom-control-description">24 Hours Security</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="extrabedonrequest">
      <span class="custom-control-description">Extra Bed(On Request)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="extramatress">
      <span class="custom-control-description">Extra Matress</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="conferencefacilities">
      <span class="custom-control-description">Conference Facilities</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="secreterialservices">
      <span class="custom-control-description">Secreterial Services</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="electricalsadapters">
      <span class="custom-control-description">Electricals Adapters Availables</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="liftelevator">
      <span class="custom-control-description">Lift/Elevator</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="powerbackup">
      <span class="custom-control-description">Power Backup</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="frontdesk">
      <span class="custom-control-description">Front Desk</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="lockerfacility">
      <span class="custom-control-description">Locker Facility</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="publicrestrooms">
      <span class="custom-control-description">Public Restrooms</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="antislipramps">
      <span class="custom-control-description">Anti-Slip Ramps</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="babysittingchildcare">
      <span class="custom-control-description">Babysitting/Child Care</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="firstaidkit">
      <span class="custom-control-description">First-Aid Kit At Front Desk</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="luggagestorage">
      <span class="custom-control-description">Luggage Storage</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="workdesklamp">
      <span class="custom-control-description">Work Desk Lamp</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="atmbanking">
      <span class="custom-control-description">ATM/Banking</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="baggageroom">
      <span class="custom-control-description">Baggage Room</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="caretaker">
      <span class="custom-control-description">Care Taker</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="currencyexchange">
      <span class="custom-control-description">Currency Exchange</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="drycleaning">
      <span class="custom-control-description">Dry Cleaning</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="fireplace">
      <span class="custom-control-description">Fire Place Available</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="majorcreditcard">
      <span class="custom-control-description">Major Credit Card Supported</span>            
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="pickupanddrop">
      <span class="custom-control-description">Pickup And Drop</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="commonkitchen">
      <span class="custom-control-description">Use of Common Kitchen</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="wheelchair">
      <span class="custom-control-description">Wheelchair Accessibility</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="24hrcheckin">
      <span class="custom-control-description">24 Hour Checkin</span> 
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="adjoiningrooms">
      <span class="custom-control-description">Adjoining Rooms</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="ballroom">
      <span class="custom-control-description">Ball Room</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="cctv">
      <span class="custom-control-description">CCTV</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="doctoroncall">
      <span class="custom-control-description">Doctor On Call</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="translationservices">
      <span class="custom-control-description">Translation Services</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="electronicdepositbox">
      <span class="custom-control-description">Electronic Safty Deposit Box</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="electronickey">
      <span class="custom-control-description">Electronic Key & ESD</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="emergencyexitmap">
      <span class="custom-control-description">Emergency Existing Map</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="depositonarrival">
      <span class="custom-control-description">Deposit On Arrival</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="digitalnewspaper">
      <span class="custom-control-description">Digital Newspaper Access</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="electronicsmokedetector">
      <span class="custom-control-description">Electronic Smoke Detector</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="fireplaceinlobby">
      <span class="custom-control-description">Fireplace In Lobby</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="mosquitonet">
      <span class="custom-control-description">Mosquito Net</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="saftydepositbox">
      <span class="custom-control-description">Safty Deposit Box</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="soundproofing">
      <span class="custom-control-description">Soundproofing</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="seetingarea">
      <span class="custom-control-description">Seating Area</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="tilemarblefloor">
      <span class="custom-control-description">Tile/Marble Floor</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="hardwood">
      <span class="custom-control-description">Hardwood/Parquet Floors</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="desk">
      <span class="custom-control-description">Desk</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="hypoallergenic">
      <span class="custom-control-description">Hypoallergenic</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="cleaningproduct">
      <span class="custom-control-description">Cleaning Products</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="electricblankets">
      <span class="custom-control-description">Electric Blankets</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="toiletpaper">
      <span class="custom-control-description">Toilet Paper</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="grabrails">
      <span class="custom-control-description">Toilet With Grab Rails</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bath" checked="checked">
      <span class="custom-control-description">Bath</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bidet">
      <span class="custom-control-description">Bidet</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bathrobe">
      <span class="custom-control-description">Bathrobe</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="freetoiletries">
      <span class="custom-control-description">Free Toiletries</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="hairdryer">
      <span class="custom-control-description">Hairdryer</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="spabath">
      <span class="custom-control-description">Spa Bath</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="shower">
      <span class="custom-control-description">Shower</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="slippers">
      <span class="custom-control-description">Slippers</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="sunbathdeck">
      <span class="custom-control-description">Sun Bath Deck</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="separatewalkinshower">
      <span class="custom-control-description">Separate Walkin Shower</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="sunbathdeck">
      <span class="custom-control-description">Sun Bath Deck</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="jacuzzi">
      <span class="custom-control-description">Jacuzzi</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="privateploungepool">
      <span class="custom-control-description">Private/Plounge Pool</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="sunbathdeck">
      <span class="custom-control-description">Sun Bath Deck</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="sauna">
      <span class="custom-control-description">Sauna</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="whirlpoolbath">
      <span class="custom-control-description">Whirlpool Bath</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="hotspringbath">
      <span class="custom-control-description">Hot Spring Bath</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="sunnyswimmingpool">
      <span class="custom-control-description">Sunny Swimming Pool</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="divecenter">
      <span class="custom-control-description">Dive Center On Site</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="diving">
      <span class="custom-control-description">Diving</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="computer">
      <span class="custom-control-description">Computer</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gameconsole">
      <span class="custom-control-description">Game Console</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gameconsolenintendowii">
      <span class="custom-control-description">Game Console-Nintendo Wii</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gameconsoleps2">
      <span class="custom-control-description">Game Console-PS2</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gameconsoleps3">
      <span class="custom-control-description">Game Console-PS3 </span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gameconsolexbox360">
      <span class="custom-control-description">Game Console-Xbox 360</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="laptop">
      <span class="custom-control-description">Laptop</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="ipad">
      <span class="custom-control-description">iPad</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="cablechannels">
      <span class="custom-control-description">Cable Channels</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="ipoddock">
      <span class="custom-control-description">iPod dock</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="laptopsafe">
      <span class="custom-control-description">Laptop Safe</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="flatscreentv">
      <span class="custom-control-description">Flat-Screen TV</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="payperviewchannel">
      <span class="custom-control-description">Pay-Per-View Channel</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="satellitechannel">
      <span class="custom-control-description">Satellite Channels</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="telephone">
      <span class="custom-control-description">Telephone</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="tv">
      <span class="custom-control-description">TV</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="video">
      <span class="custom-control-description">Video</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="videogames">
      <span class="custom-control-description">Video Games</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="faxmachine">
     <span class="custom-control-description">Fax Machine</span>
     <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="freelocalcalls">
     <span class="custom-control-description">Free Local Calls</span>
     <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="internationalcall">
     <span class="custom-control-description">International Call Facilities</span>
     <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="voicemail">
    <span class="custom-control-description">Voicemail</span>
     <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="diningarea">
      <span class="custom-control-description">Dining Area</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="diningtable">
      <span class="custom-control-description">Dining Table</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="barbecue">
      <span class="custom-control-description">Barbecue</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="stovetop">
      <span class="custom-control-description">Stovetop</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="toaster">
      <span class="custom-control-description">Toaster</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="electrickettle">
      <span class="custom-control-description">Electric Kettle</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="outdoordiningarea">
      <span class="custom-control-description">Outdoor Dininig Area</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="outdoorfurniture">
      <span class="custom-control-description">Outdoor Furniture</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="minibar">
      <span class="custom-control-description">Minibar</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="kitchenette">
      <span class="custom-control-description">Kitchenette</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="microwave">
      <span class="custom-control-description">Microwave</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="refrigerator">
      <span class="custom-control-description">Refrigerator</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="teacoffiemaker">
      <span class="custom-control-description">Tea/Coffee Maker</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="childrenshighchair">
      <span class="custom-control-description">childrenshighchair</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bakery">
      <span class="custom-control-description">Bakery</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="breakfastrooms">
      <span class="custom-control-description">Breakfast Rooms</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="breakfastbuffet">
      <span class="custom-control-description">Breakfast Buffet</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="alarmclock">
      <span class="custom-control-description">Alarm Clock</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="wakeupservice">
      <span class="custom-control-description">Wake-up Service</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="limen">
      <span class="custom-control-description">Limen</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="towels" checked="checked">
      <span class="custom-control-description">Towels</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="towelssheets">
      <span class="custom-control-description">Towels/Sheets(Extra fee)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="balcony">
      <span class="custom-control-description">Balcony</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="patio">
      <span class="custom-control-description">Patio</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="view">
      <span class="custom-control-description">View</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="terrace">
      <span class="custom-control-description">Terrace</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="cityview">
      <span class="custom-control-description">City View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gardenview">
      <span class="custom-control-description">Garden View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="lakeview">
      <span class="custom-control-description">Lake View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="landmarkview">
      <span class="custom-control-description">Landmark View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="mountainview">
      <span class="custom-control-description">Mountain View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="poolview">
      <span class="custom-control-description">pool View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="riverview">
      <span class="custom-control-description">River View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="seaview">
      <span class="custom-control-description">Sea View</span> 
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="privatebalconynterrace">
      <span class="custom-control-description">Private Balcony And Terrace</span>  
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="abseiling">
      <span class="custom-control-description">Abseiling</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="roomsituatedground">
      <span class="custom-control-description">Room is situated on the ground floor</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="wheelchair accessible">
      <span class="custom-control-description">Room is entirely wheelchair accessible</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="lift">
      <span class="custom-control-description">Upper floors accessible by lift</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="stairs">
      <span class="custom-control-description">Upper floors accessible by stairs only</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="babysaftygates">
      <span class="custom-control-description">Baby Safty Gates</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="boardgamespuzzles">
      <span class="custom-control-description">Board Games/Puzzles</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="booksdvdschildrens">
      <span class="custom-control-description">Books, DVDs or music for Childrens</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="childsaftysocketcover">
      <span class="custom-control-description">Child Safty Socket Covers</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="minitheatre">
      <span class="custom-control-description">Mini Theatre</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="raindance">
      <span class="custom-control-description">Rain Dance Facility</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="casino">
      <span class="custom-control-description">Casino</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="karaoke">
      <span class="custom-control-description">Karaoke</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="danceperformance">
      <span class="custom-control-description">Dance Performances(On Demand)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="nightclub">
      <span class="custom-control-description">Night Club</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bikeonrent">
      <span class="custom-control-description">Bike On Rent</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="basketballcourt">
      <span class="custom-control-description">Basketball Court </span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bowling">
      <span class="custom-control-description">Bowling</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="fitnessequipment">
      <span class="custom-control-description">Fitness Equipment</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gameszone">
      <span class="custom-control-description">Games Zone</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="marinaonsite">
      <span class="custom-control-description">Marina On Site</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="recreationzone">
      <span class="custom-control-description">Recreation Zone</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="spaservicenearby">
      <span class="custom-control-description">Spa Service Nearby</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="tabletennis">
      <span class="custom-control-description">Table Tennis</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gymequipment">
      <span class="custom-control-description">Gym Equipment</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="badminttion">
      <span class="custom-control-description">Badminttion</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="boating">
      <span class="custom-control-description">Boating</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="clubhouse">
      <span class="custom-control-description">Club House</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="virtualgulf">
      <span class="custom-control-description">Virtual Gulf</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="squashcourt">
      <span class="custom-control-description">Squash Court</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="funfloats">
      <span class="custom-control-description">Fun Floats</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="horseride">
      <span class="custom-control-description">Horse Ride(chargable)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="pooltable">
      <span class="custom-control-description">Pool Table</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="naturewalk">
      <span class="custom-control-description">Nature Walk</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="amphitheatre">
      <span class="custom-control-description">Amphitheatre</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="weddingservices">
      <span class="custom-control-description">Wedding Services Facility</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="partyhall">
      <span class="custom-control-description">Party Hall</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="petfriendly">
      <span class="custom-control-description">Pet Friendly</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="pickupanddrop">
      <span class="custom-control-description">Pickup And Drop</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="separatesittingarea">
       <span class="custom-control-description">Separate Sitting Area</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="beautysalon">
      <span class="custom-control-description">Beauty Salon(On Charge)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="kidsplayzone">
      <span class="custom-control-description">Kids Play Zone</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="library">
      <span class="custom-control-description">Library</span>  
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="meditationroom">
      <span class="custom-control-description">Meditation Room</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="picnicarea">
      <span class="custom-control-description">Picnic Area</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="servantquarter">
      <span class="custom-control-description">Servent Quarter</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bicycle">
      <span class="custom-control-description">Bicycle</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bikesfree">
      <span class="custom-control-description">Bikes Available(free)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="childrenspool">
      <span class="custom-control-description">Children's Pool</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="cookingclasses">
      <span class="custom-control-description">Cooking Classes</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="dancingclasses">
      <span class="custom-control-description">Dancing Classes</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="daybed">
      <span class="custom-control-description">Daybed</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="barlounge">
      <span class="custom-control-description">Bar/Lounge</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="multicuisineresturant">
      <span class="custom-control-description">Multi Cuisine Resturant</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="specialityresturant">
      <span class="custom-control-description">Speciality Resturant</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="catering">
      <span class="custom-control-description">Catering</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="cafe">
      <span class="custom-control-description">Cafe</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="foodfacility">
      <span class="custom-control-description">Food Facility</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="hookahlounge">
      <span class="custom-control-description">Hookah Lounge</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="poolcafe">
      <span class="custom-control-description">Pool Cafe</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="vegnonveg">
      <span class="custom-control-description">Veg /Non-veg Kitchen Separate</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="poolsidebar">
      <span class="custom-control-description">Poolside Bar </span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="vegetarianfoodjainfood">
      <span class="custom-control-description">Vegetarian Food/Jain Food Available </span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="fullminibar">
      <span class="custom-control-description">A Full Minibar</span>
      

    <span class="help-block errortext"></span>
                
</div>
</div>


  <div class="form-group"> 
    <div class="col-sm-offset-10 col-sm-2">
      <button id="submit" type="submit" class="btn btn-default" name="done" value="Done">Done</button>
    </div>
</div>


</form>
</div>

</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">

///////// for disable and after continue click enable next step /////////////////////////////

$(document).ready(function () {
     

     $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var $target = $(e.target);
            if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });


/////////continue1//////////////////////



  $('#continue1').click(function (e) {
    var count=0;
    var fields = $(".form-horizontal").find("#step1 select, #step1 textarea, #step1 input").serializeArray();
    var $active = $('.nav-tabs li.active');

$.each(fields, function(i, field) {
    if (!field.value)
    
   {
   var ma="*This feild is requied.";
    document.getElementById(this.name).innerHTML = ma;
    return true;
    }else{
  document.getElementById(this.name).innerHTML="";

  count++;
  }
});
if(count===13)
{
  $active.next().removeClass('disabled');
      nextTab($active);
}
});


/////////////////////continue2///////////////////////////////////

 $('#continue2').click(function (e) {
    var count2=0;
   var fields = $(".form-horizontal").find("#step2 textarea, #step2 input").serializeArray();
 var $active = $('.nav-tabs li.active');

$.each(fields, function(i, field) {
    if (!field.value)    
   {
   var ma="*This feild is requied.";
    document.getElementById(this.name).innerHTML = ma;
    return true;
    }else{

  document.getElementById(this.name).innerHTML="";
 
  count2++;
  }
});
if(count2===5)
{
  $active.next().removeClass('disabled');
      nextTab($active);
}
});




//////////////////////////continue3//////////////////////////////////

$('#continue3').click(function (e) {
    var count3=0;
   var fields = $(".form-horizontal").find("#step3 select, #step3 textarea, #step3 input").serializeArray();
 var $active = $('.nav-tabs li.active');

$.each(fields, function(i, field) {
    if (!field.value)
    
   {
   var ma="*This feild is requied.";
    document.getElementById(this.name).innerHTML = ma;
    return true;
    }else{
  document.getElementById(this.name).innerHTML="";
  count3++;
  }
});
if(count3===2)
{
  $active.next().removeClass('disabled');
      nextTab($active);
}
});



/////////////////////////continue4//////////////////////////////////

$('#continue4').click(function (e) {
    var count4=0;
  var fields = $(".form-horizontal").find("#step4 select, #step4 textarea, #step4 input").serializeArray();
  var $active = $('.nav-tabs li.active');
  
var images =$('#image2').val();
 
    if (images==="")
    
   {
      var ma="*Image is requied.";
     document.getElementById('rimage').innerHTML = ma;
    }else{
          document.getElementById('rimage').innerHTML="";
     }
$.each(fields, function(i, field) {
   
    if (!field.value)
    
   {
   var ma="*This feild is requied.";
    document.getElementById(this.name).innerHTML = ma;
    return true;
    }else{
  document.getElementById(this.name).innerHTML="";
  count4++;
  
  
  }
});

if(count4 >= 5 && images!=="")
{
  $active.next().removeClass('disabled');
      nextTab($active);
}
});


/////////////////////////continue5//////////////////////////////////

$('#continue5').click(function (e) {
    var count5=0;
   var fields =document.getElementById ("image");
   var $active = $('.nav-tabs li.active');
    if ('files' in fields ) {
                 if ((fields.files.length) === '' || (fields.files.length)<2) {
                     var ma="* Please Upload Two or More than two images";
                    document.getElementById('image1[]').innerHTML = ma;
                }else{
          document.getElementById('image1[]').innerHTML="";
           
     $active.next().removeClass('disabled');
      nextTab($active);
    } 
 }

     
    
});
         

//////////////////////////////continue6////////////////////

$('#continue6').click(function (e) {
    var count6=0;
   var fields = $(".form-horizontal").find("#step6 select, #step6 textarea, #step6 input").serializeArray();
 var $active = $('.nav-tabs li.active');
 var checked = $("input[type=checkbox]:checked").length;
   alert(checked);
      if(!checked) {
        alert("You must check at least one checkbox.");
      }

$.each(fields, function(i, field) {
    if (!field.value)
    
   {
   var ma="*This feild is requied.";
    document.getElementById(this.name).innerHTML = ma;
    return true;
    }else{
  document.getElementById(this.name).innerHTML="";
  count6++;
  }
});
if(count6==='0')
{
  $("#submit").click();
}
});



function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
});
</script>

<script>
$('form input[name="email"]').blur(function () {
    var email = $(this).val();
var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/igm;
if (re.test(email)) {
   document.getElementById(this.name).innerHTML="";
} else {
      document.getElementById(this.name).innerHTML="Email Format is Not Valid.";
    }

});
</script>
</body>
</html>