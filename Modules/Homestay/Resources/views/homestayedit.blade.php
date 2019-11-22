@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.admin.nav')
@include('layouts.backend.admin.sidebar')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>   
        <ol class="breadcrumb">
       {!!$breadcrumbs!!}
      </ol>
       {{-- <a href="javascript:history.back()" class="btn btn-primary breadCrumbRightBackBtn">Back</a> --}}
    </h4>
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

    </section>
    <!-- Main content -->
       <section class="content">
        <div class="row">
        <!-- left column -->
       <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="" class="form-horizontal formpadding" method="POST" enctype="multipart/form-data" file="true">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
               <input type="hidden" name="homestay_id" value="{{$homestay->id}}">
                <input type="hidden" name="old_homestay_image" value="{{$homestay->image}}">

              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Hotel Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="hname" id="hname" placeholder="Hotel Name" value="{{$homestay->hname}}" required="required">
                      <span class="help-block errortext">{{$errors->first('hname')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Bank Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="bname" id="bname" placeholder="Bank Name" value="{{$homestay->bname}}" required="required">
                      <span class="help-block errortext">{{$errors->first('bname')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Account Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="anumber" id="anumber" placeholder="Account Number" value="{{$homestay->anumber}}" required="required">
                      <span class="help-block errortext">{{$errors->first('anumber')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                   <label for="specialtype" class="col-sm-2 control-label">Is Special Type</label>
                    <div class="col-sm-10">
	                <select name="special" id="special" required="required">
        					  <option value="p" @if($homestay->special_type=='p')  selected='selected' @endif>Yes</option>
        					  <option value="n" @if($homestay->special_type=='n')  selected='selected' @endif>No</option>
        					</select>
                 </div>
                 </div>
                <div class="form-group">
                <label for="temp_address" class="col-sm-2 control-label"></label>
                 <div class="row">
                 @foreach($images as $image)                
               <div class="col-lg-1 col-md-1 col-sm-1">
                 <a href="{{url('triporbitz/public/images/'.$image)}}"class="portfolio-box">
                  <img src="{{url('triporbitz/public/images/'.$image)}}"class="img-responsive" alt="images" width="100px" height="100px">
                  <div class="portfolio-box-caption">
                    <div class="portfolio-box-caption-content">
                    <span class="glyphicon glyphicon-zoom-in" style="font-size: 20px"></span>
                    </div>
                  </div>
                 </a>
               </div>
               @endforeach
               </div> 
              </div>
                <div class="form-group">
                    <label for="himage" class="col-sm-2 control-label">Hotel Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control"  name="images[]" id="images"  multiple="multiple">
                       <span class="help-block errortext">{{$errors->first('images.*')}}</span>
                    </div>
                  </div>
                <div class="form-group">
                   <label for="rating" class="col-sm-2 control-label">Hotel Rating(*)</label>
                    <div class="col-sm-10">
	                <select name="rating" id="rating" required="required">
        					 <option value="1" @if($homestay->rating=='1') selected='selected' @endif>1</option>
                   <option value="2" @if($homestay->rating=='2') selected='selected' @endif >2</option>
                   <option value="3" @if($homestay->rating=='3') selected='selected' @endif>3</option>
                   <option value="4" @if($homestay->rating=='4') selected='selected' @endif >4</option>
                   <option value="5" @if($homestay->rating=='5') selected='selected' @endif>5</option>
        					</select>
                 </div>
                </div>
                <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                  <select name="type" id="type" required="required">
                    <option value="s" @if($homestay->type=='s')  selected='selected' @endif  >Homestay</option>
                    <option value="h" @if($homestay->type=='h') selected='selected' @endif >Hotel</option>
                  </select>
                 </div>
                </div>
                 <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Is Verified?</label>
                    <div class="col-sm-10">
                  <select name="is_verified" id="is_verified" required="required">
                    <option value="y" @if($homestay->is_verified=='y')  selected='selected' @endif  >Yes</option>
                    <option value="n" @if($homestay->is_verified=='n') selected='selected' @endif >No</option>
                  </select>
                 </div>
                </div>
                <div class="form-group">
                   <label for="rating" class="col-sm-2 control-label">Base Currency</label>
                    <div class="col-sm-10">
	                <select name="basecurrency" id="basecurrency" required="required">
        					  <option value="n" @if($homestay->basecurrency=='n') selected='selected' @endif>Nepalease</option>
        					  <option value="i" @if($homestay->basecurrency=='i') selected='selected' @endif >Indian</option>
        					  <option value="u" @if($homestay->basecurrency=='u') selected='selected' @endif>USD</option>
        					</select>
                 </div>
                 </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Total Number of Rooms</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="trooms" id="trooms" placeholder="Total Number of Rooms" value="{{$homestay->trooms}}" required="required">
                      <span class="help-block errortext">{{$errors->first('trooms')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Base Price</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="baseprice" id="baseprice" placeholder="Enter Base Price" value="{{$homestay->baseprice}}" required="required">
                      <span class="help-block errortext">{{$errors->first('baseprice')}}</span>
                  </div>
                </div>     
             
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Check In</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="checkin" id="checkin" placeholder="CheckIn Date" value="{{$homestay->checkin}}" required="required">
                      <span class="help-block errortext">{{$errors->first('checkin')}}</span>
                  </div>
                </div>

              <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Check Out</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="checkout" id="checkout" placeholder="CheckOut Date" value="{{$homestay->checkout}}" required="required">
                      <span class="help-block errortext">{{$errors->first('checkout')}}</span>
                  </div>
                </div>
               
             <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Latitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Enter Latitude" value="{{$homestay->latitude}}" required="required">
                      <span class="help-block errortext">{{$errors->first('latitude')}}</span>
                  </div>
                </div>

             <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Longitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Enter Longitude" value="{{$homestay->longitude}}" required="required">
                      <span class="help-block errortext">{{$errors->first('longitude')}}</span>
                  </div>
                </div>
              
             



         
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description" placeholder="Hotel Description" rows="10" cols="90" required="required" value="{{$homestay->description}}">{{$homestay->description}}</textarea>
                  </div>
                    <span class="help-block errortext">{{$errors->first('description')}}</span>
                </div>
            <div class="form-group" id="services">
             <label for="services" class="col-sm-2 control-label">Amenitites n services</label>
             <div class="col-sm-10">
      <input type="checkbox" class="checkbox-inline checked_all" name="services[]" value="all">
      <span class="custom-control-description">Select All</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="localtourtraveldesk" {{in_array("localtourtraveldesk",$services)?"checked":""}}>
      <span class="custom-control-description">Local Tour /Travel Desk</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="clothesrack" {{in_array("clothesrack",$services)?"checked":""}}>
      <span class="custom-control-description">Clothes Rack</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="dryingrack" {{in_array("dryingrack",$services)?"checked":""}}>
      <span class="custom-control-description">Drying Rack For Clothing</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="foldupbed" {{in_array("foldupbed",$services)?"checked":""}}>
      <span class="custom-control-description">Fold-Up Bed</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="aircondition" {{in_array("aircondition",$services)?"checked":""}}>
      <span class="custom-control-description">Air Conditioning</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="wardrobe" {{in_array("wardrobe",$services)?"checked":""}}>
      <span class="custom-control-description">Wardrobe/Closet</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="carpeted" {{in_array("carpeted",$services)?"checked":""}}>
      <span class="custom-control-description">Carpeted</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="dressingroom" {{in_array("dressingroom",$services)?"checked":""}}>
      <span class="custom-control-description">Dressing Room</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="extralongbed" {{in_array("extralongbed",$services)?"checked":""}}>
      <span class="custom-control-description">Extra Long Beds(>2 meters)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="Fan" {{in_array("Fan",$services)?"checked":""}}>
      <span class="custom-control-description">Fan</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="fireplace" {{in_array("fireplace",$services)?"checked":""}}>
      <span class="custom-control-description">FirePlace</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="heating" {{in_array("heating",$services)?"checked":""}}>
      <span class="custom-control-description">Heating</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="Iron" {{in_array("Iron",$services)?"checked":""}}>
      <span class="custom-control-description">Iron</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="parking" {{in_array("parking",$services)?"checked":""}}>
      <span class="custom-control-description">Parking(Complementary)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="newspaperlobby" {{in_array("newspaperlobby",$services)?"checked":""}}>
      <span class="custom-control-description">Newspaper In Lobby</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="wifi" {{in_array("wifi",$services)?"checked":""}}>
      <span class="custom-control-description">Wifi</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="24hours security" {{in_array("24hours security",$services)?"checked":""}}>
      <span class="custom-control-description">24 Hours Security</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="extrabedonrequest" {{in_array("extrabedonrequest",$services)?"checked":""}}>
      <span class="custom-control-description">Extra Bed(On Request)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="extramatress" {{in_array("extramatress",$services)?"checked":""}}>
      <span class="custom-control-description">Extra Matress</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="conferencefacilities" {{in_array("conferencefacilities",$services)?"checked":""}}>
      <span class="custom-control-description">Conference Facilities</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="secreterialservices" {{in_array("secreterialservices",$services)?"checked":""}}>
      <span class="custom-control-description">Secreterial Services</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="electricalsadapters" {{in_array("electricalsadapters",$services)?"checked":""}}>
      <span class="custom-control-description">Electricals Adapters Availables</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="liftelevator" {{in_array("liftelevator",$services)?"checked":""}}>
      <span class="custom-control-description">Lift/Elevator</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="powerbackup" {{in_array("powerbackup",$services)?"checked":""}}>
      <span class="custom-control-description">Power Backup</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="frontdesk" {{in_array("frontdesk",$services)?"checked":""}}>
      <span class="custom-control-description">Front Desk</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="lockerfacility" {{in_array("lockerfacility",$services)?"checked":""}}>
      <span class="custom-control-description">Locker Facility</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="publicrestrooms" {{in_array("publicrestrooms",$services)?"checked":""}}>
      <span class="custom-control-description">Public Restrooms</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="antislipramps" {{in_array("antislipramps",$services)?"checked":""}}>
      <span class="custom-control-description">Anti-Slip Ramps</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="babysittingchildcare" {{in_array("babysittingchildcare",$services)?"checked":""}}>
      <span class="custom-control-description">Babysitting/Child Care</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="firstaidkit" {{in_array("firstaidkit",$services)?"checked":""}}>
      <span class="custom-control-description">First-Aid Kit At Front Desk</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="luggagestorage" {{in_array("luggagestorage",$services)?"checked":""}}>
      <span class="custom-control-description">Luggage Storage</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="workdesklamp" {{in_array("workdesklamp",$services)?"checked":""}}>
      <span class="custom-control-description">Work Desk Lamp</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="atmbanking" {{in_array("atmbanking",$services)?"checked":""}}>
      <span class="custom-control-description">ATM/Banking</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="baggageroom" {{in_array("baggageroom",$services)?"checked":""}}>
      <span class="custom-control-description">Baggage Room</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="caretaker" {{in_array("caretaker",$services)?"checked":""}}>
      <span class="custom-control-description">Care Taker</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="currencyexchange" {{in_array("currencyexchange",$services)?"checked":""}}>
      <span class="custom-control-description">Currency Exchange</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="drycleaning" {{in_array("drycleaning",$services)?"checked":""}}>
      <span class="custom-control-description">Dry Cleaning</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="fireplace" {{in_array("fireplace",$services)?"checked":""}}>
      <span class="custom-control-description">Fire Place Available</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="majorcreditcard" {{in_array("majorcreditcard",$services)?"checked":""}}>
      <span class="custom-control-description">Major Credit Card Supported</span>            
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="pickupanddrop" {{in_array("pickupanddrop",$services)?"checked":""}}>
      <span class="custom-control-description">Pickup And Drop</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="commonkitchen" {{in_array("commonkitchen",$services)?"checked":""}}>
      <span class="custom-control-description">Use of Common Kitchen</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="wheelchair" {{in_array("wheelchair",$services)?"checked":""}}>
      <span class="custom-control-description">Wheelchair Accessibility</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="24hrcheckin" {{in_array("24hrcheckin",$services)?"checked":""}}>
      <span class="custom-control-description">24 Hour Checkin</span> 
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="adjoiningrooms" {{in_array("adjoiningrooms",$services)?"checked":""}}>
      <span class="custom-control-description">Adjoining Rooms</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="ballroom" {{in_array("ballroom",$services)?"checked":""}}>
      <span class="custom-control-description">Ball Room</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="cctv" {{in_array("cctv",$services)?"checked":""}}>
      <span class="custom-control-description">CCTV</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="doctoroncall" {{in_array("doctoroncall",$services)?"checked":""}}>
      <span class="custom-control-description">Doctor On Call</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="translationservices" {{in_array("translationservices",$services)?"checked":""}}>
      <span class="custom-control-description">Translation Services</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="electronicdepositbox" {{in_array("electronicdepositbox",$services)?"checked":""}}>
      <span class="custom-control-description">Electronic Safty Deposit Box</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="electronickey" {{in_array("electronickey",$services)?"checked":""}}>
      <span class="custom-control-description">Electronic Key & ESD</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="emergencyexitmap" {{in_array("emergencyexitmap",$services)?"checked":""}}>
      <span class="custom-control-description">Emergency Existing Map</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="depositonarrival" {{in_array("depositonarrival",$services)?"checked":""}}>
      <span class="custom-control-description">Deposit On Arrival</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="digitalnewspaper" {{in_array("digitalnewspaper",$services)?"checked":""}}>
      <span class="custom-control-description">Digital Newspaper Access</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="electronicsmokedetector" {{in_array("electronicsmokedetector",$services)?"checked":""}}>
      <span class="custom-control-description">Electronic Smoke Detector</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="fireplaceinlobby" {{in_array("fireplaceinlobby",$services)?"checked":""}}>
      <span class="custom-control-description">Fireplace In Lobby</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="mosquitonet" {{in_array("mosquitonet",$services)?"checked":""}}>
      <span class="custom-control-description">Mosquito Net</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="saftydepositbox" {{in_array("saftydepositbox",$services)?"checked":""}}>
      <span class="custom-control-description">Safty Deposit Box</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="soundproofing" {{in_array("soundproofing",$services)?"checked":""}}>
      <span class="custom-control-description">Soundproofing</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="seetingarea" {{in_array("seetingarea",$services)?"checked":""}}>
      <span class="custom-control-description">Seating Area</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="tilemarblefloor" {{in_array("tilemarblefloor",$services)?"checked":""}}>
      <span class="custom-control-description">Tile/Marble Floor</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="hardwood" {{in_array("hardwood",$services)?"checked":""}}>
      <span class="custom-control-description">Hardwood/Parquet Floors</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="desk" {{in_array("desk",$services)?"checked":""}}>
      <span class="custom-control-description">Desk</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="hypoallergenic" {{in_array("hypoallergenic",$services)?"checked":""}}>
      <span class="custom-control-description">Hypoallergenic</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="cleaningproduct" {{in_array("cleaningproduct",$services)?"checked":""}}>
      <span class="custom-control-description">Cleaning Products</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="electricblankets" {{in_array("electricblankets",$services)?"checked":""}}>
      <span class="custom-control-description">Electric Blankets</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="toiletpaper" {{in_array("toiletpaper",$services)?"checked":""}}>
      <span class="custom-control-description">Toilet Paper</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="grabrails" {{in_array("grabrails",$services)?"checked":""}}>
      <span class="custom-control-description">Toilet With Grab Rails</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bath" {{in_array("bath",$services)?"checked":""}}>
      <span class="custom-control-description">Bath</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bidet" {{in_array("bidet",$services)?"checked":""}}>
      <span class="custom-control-description">Bidet</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bathrobe" {{in_array("bathrobe",$services)?"checked":""}}>
      <span class="custom-control-description">Bathrobe</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="freetoiletries" {{in_array("freetoiletries",$services)?"checked":""}}>
      <span class="custom-control-description">Free Toiletries</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="hairdryer" {{in_array("hairdryer",$services)?"checked":""}}>
      <span class="custom-control-description">Hairdryer</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="spabath" {{in_array("spabath",$services)?"checked":""}}>
      <span class="custom-control-description">Spa Bath</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="shower" {{in_array("shower",$services)?"checked":""}}>
      <span class="custom-control-description">Shower</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="slippers" {{in_array("slippers",$services)?"checked":""}}>
      <span class="custom-control-description">Slippers</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="sunbathdeck" {{in_array("sunbathdeck",$services)?"checked":""}}>
      <span class="custom-control-description">Sun Bath Deck</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="separatewalkinshower" {{in_array("separatewalkinshower",$services)?"checked":""}}>
      <span class="custom-control-description">Separate Walkin Shower</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="sunbathdeck" {{in_array("sunbathdeck",$services)?"checked":""}}>
      <span class="custom-control-description">Sun Bath Deck</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="jacuzzi" {{in_array("jacuzzi",$services)?"checked":""}}>
      <span class="custom-control-description">Jacuzzi</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="privateploungepool" {{in_array("privateploungepool",$services)?"checked":""}}>
      <span class="custom-control-description">Private/Plounge Pool</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="sunbathdeck" {{in_array("sunbathdeck",$services)?"checked":""}}>
      <span class="custom-control-description">Sun Bath Deck</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="sauna" {{in_array("sauna",$services)?"checked":""}}>
      <span class="custom-control-description">Sauna</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="whirlpoolbath" {{in_array("whirlpoolbath",$services)?"checked":""}}>
      <span class="custom-control-description">Whirlpool Bath</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="hotspringbath" {{in_array("hotspringbath",$services)?"checked":""}}>
      <span class="custom-control-description">Hot Spring Bath</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="sunnyswimmingpool" {{in_array("sunnyswimmingpool",$services)?"checked":""}}>
      <span class="custom-control-description">Sunny Swimming Pool</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="divecenter" {{in_array("divecenter",$services)?"checked":""}}>
      <span class="custom-control-description">Dive Center On Site</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="diving" {{in_array("diving",$services)?"checked":""}}>
      <span class="custom-control-description">Diving</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="computer" {{in_array("computer",$services)?"checked":""}}>
      <span class="custom-control-description">Computer</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gameconsole" {{in_array("gameconsole",$services)?"checked":""}}>
      <span class="custom-control-description">Game Console</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gameconsolenintendowii" {{in_array("gameconsolenintendowii",$services)?"checked":""}}>
      <span class="custom-control-description">Game Console-Nintendo Wii</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gameconsoleps2" {{in_array("gameconsoleps2",$services)?"checked":""}}>
      <span class="custom-control-description">Game Console-PS2</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gameconsoleps3" {{in_array("gameconsoleps3",$services)?"checked":""}}>
      <span class="custom-control-description">Game Console-PS3 </span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gameconsolexbox360" {{in_array("gameconsolexbox360",$services)?"checked":""}}>
      <span class="custom-control-description">Game Console-Xbox 360</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="laptop" {{in_array("laptop",$services)?"checked":""}}>
      <span class="custom-control-description">Laptop</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="ipad" {{in_array("ipad",$services)?"checked":""}}>
      <span class="custom-control-description">iPad</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="cablechannels" {{in_array("cablechannels",$services)?"checked":""}}>
      <span class="custom-control-description">Cable Channels</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="ipoddock" {{in_array("ipoddock",$services)?"checked":""}}>
      <span class="custom-control-description">iPod dock</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="laptopsafe" {{in_array("laptopsafe",$services)?"checked":""}}>
      <span class="custom-control-description">Laptop Safe</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="flatscreentv" {{in_array("flatscreentv",$services)?"checked":""}}>
      <span class="custom-control-description">Flat-Screen TV</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="payperviewchannel" {{in_array("payperviewchannel",$services)?"checked":""}}>
      <span class="custom-control-description">Pay-Per-View Channel</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="satellitechannel" {{in_array("satellitechannel",$services)?"checked":""}}>
      <span class="custom-control-description">Satellite Channels</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="telephone" {{in_array("telephone",$services)?"checked":""}}>
      <span class="custom-control-description">Telephone</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="tv" {{in_array("tv",$services)?"checked":""}}>
      <span class="custom-control-description">TV</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="video" {{in_array("video",$services)?"checked":""}}>
      <span class="custom-control-description">Video</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="videogames" {{in_array("videogames",$services)?"checked":""}}>
      <span class="custom-control-description">Video Games</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="faxmachine" {{in_array("faxmachine",$services)?"checked":""}}>
     <span class="custom-control-description">Fax Machine</span>
     <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="freelocalcalls" {{in_array("freelocalcalls",$services)?"checked":""}}>
     <span class="custom-control-description">Free Local Calls</span>
     <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="internationalcall" {{in_array("internationalcall",$services)?"checked":""}}>
     <span class="custom-control-description">International Call Facilities</span>
     <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="voicemail" {{in_array("voicemail",$services)?"checked":""}}>
    <span class="custom-control-description">Voicemail</span>
     <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="diningarea" {{in_array("diningarea",$services)?"checked":""}}>
      <span class="custom-control-description">Dining Area</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="diningtable" {{in_array("diningtable",$services)?"checked":""}}>
      <span class="custom-control-description">Dining Table</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="barbecue" {{in_array("barbecue",$services)?"checked":""}}>
      <span class="custom-control-description">Barbecue</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="stovetop" {{in_array("stovetop",$services)?"checked":""}}>
      <span class="custom-control-description">Stovetop</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="toaster" {{in_array("toaster",$services)?"checked":""}}>
      <span class="custom-control-description">Toaster</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="electrickettle" {{in_array("electrickettle",$services)?"checked":""}}>
      <span class="custom-control-description">Electric Kettle</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="outdoordiningarea" {{in_array("outdoordiningarea",$services)?"checked":""}}>
      <span class="custom-control-description">Outdoor Dininig Area</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="outdoorfurniture" {{in_array("outdoorfurniture",$services)?"checked":""}}>
      <span class="custom-control-description">Outdoor Furniture</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="minibar" {{in_array("minibar",$services)?"checked":""}}>
      <span class="custom-control-description">Minibar</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="kitchenette" {{in_array("kitchenette",$services)?"checked":""}}>
      <span class="custom-control-description">Kitchenette</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="microwave" {{in_array("microwave",$services)?"checked":""}}>
      <span class="custom-control-description">Microwave</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="refrigerator" {{in_array("refrigerator",$services)?"checked":""}}>
      <span class="custom-control-description">Refrigerator</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="teacoffiemaker" {{in_array("teacoffiemaker",$services)?"checked":""}}>
      <span class="custom-control-description">Tea/Coffee Maker</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="childrenshighchair" {{in_array("childrenshighchair",$services)?"checked":""}}>
      <span class="custom-control-description">childrenshighchair</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bakery" {{in_array("bakery",$services)?"checked":""}}>
      <span class="custom-control-description">Bakery</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="breakfastrooms" {{in_array("breakfastrooms",$services)?"checked":""}}>
      <span class="custom-control-description">Breakfast Rooms</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="breakfastbuffet" {{in_array("breakfastbuffet",$services)?"checked":""}}>
      <span class="custom-control-description">Breakfast Buffet</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="alarmclock" {{in_array("alarmclock",$services)?"checked":""}}>
      <span class="custom-control-description">Alarm Clock</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="wakeupservice" {{in_array("wakeupservice",$services)?"checked":""}}>
      <span class="custom-control-description">Wake-up Service</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="limen" {{in_array("limen",$services)?"checked":""}}>
      <span class="custom-control-description">Limen</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="towels" {{in_array("towels",$services)?"checked":""}}>
      <span class="custom-control-description">Towels</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="towelssheets" {{in_array("towelssheets",$services)?"checked":""}}>
      <span class="custom-control-description">Towels/Sheets(Extra fee)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="balcony" {{in_array("balcony",$services)?"checked":""}}>
      <span class="custom-control-description">Balcony</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="patio" {{in_array("patio",$services)?"checked":""}}>
      <span class="custom-control-description">Patio</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="view" {{in_array("view",$services)?"checked":""}}>
      <span class="custom-control-description">View</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="terrace" {{in_array("terrace",$services)?"checked":""}}>
      <span class="custom-control-description">Terrace</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="cityview" {{in_array("cityview",$services)?"checked":""}}>
      <span class="custom-control-description">City View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gardenview" {{in_array("gardenview",$services)?"checked":""}}>
      <span class="custom-control-description">Garden View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="lakeview" {{in_array("lakeview",$services)?"checked":""}}>
      <span class="custom-control-description">Lake View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="landmarkview" {{in_array("landmarkview",$services)?"checked":""}}>
      <span class="custom-control-description">Landmark View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="mountainview" {{in_array("mountainview",$services)?"checked":""}}>
      <span class="custom-control-description">Mountain View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="poolview" {{in_array("poolview",$services)?"checked":""}}>
      <span class="custom-control-description">pool View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="riverview" {{in_array("riverview",$services)?"checked":""}}>
      <span class="custom-control-description">River View</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="seaview" {{in_array("seaview",$services)?"checked":""}}>
      <span class="custom-control-description">Sea View</span> 
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="privatebalconynterrace" {{in_array("privatebalconynterrace",$services)?"checked":""}}>
      <span class="custom-control-description">Private Balcony And Terrace</span>  
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="abseiling" {{in_array("abseiling",$services)?"checked":""}}>
      <span class="custom-control-description">Abseiling</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="roomsituatedground" {{in_array("roomsituatedground",$services)?"checked":""}}>
      <span class="custom-control-description">Room is situated on the ground floor</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="wheelchair accessible" {{in_array("wheelchair accessible",$services)?"checked":""}}>
      <span class="custom-control-description">Room is entirely wheelchair accessible</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="lift" {{in_array("lift",$services)?"checked":""}}>
      <span class="custom-control-description">Upper floors accessible by lift</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="stairs" {{in_array("stairs",$services)?"checked":""}}>
      <span class="custom-control-description">Upper floors accessible by stairs only</span>
       <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="babysaftygates" {{in_array("babysaftygates",$services)?"checked":""}}>
      <span class="custom-control-description">Baby Safty Gates</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="boardgamespuzzles" {{in_array("boardgamespuzzles",$services)?"checked":""}}>
      <span class="custom-control-description">Board Games/Puzzles</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="booksdvdschildrens" {{in_array("booksdvdschildrens",$services)?"checked":""}}>
      <span class="custom-control-description">Books, DVDs or music for Childrens</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="childsaftysocketcover" {{in_array("childsaftysocketcover",$services)?"checked":""}}>
      <span class="custom-control-description">Child Safty Socket Covers</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="minitheatre" {{in_array("minitheatre",$services)?"checked":""}}>
      <span class="custom-control-description">Mini Theatre</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="raindance" {{in_array("raindance",$services)?"checked":""}}>
      <span class="custom-control-description">Rain Dance Facility</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="casino" {{in_array("casino",$services)?"checked":""}}>
      <span class="custom-control-description">Casino</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="karaoke" {{in_array("karaoke",$services)?"checked":""}}>
      <span class="custom-control-description">Karaoke</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="danceperformance" {{in_array("danceperformance",$services)?"checked":""}}>
      <span class="custom-control-description">Dance Performances(On Demand)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="nightclub" {{in_array("nightclub",$services)?"checked":""}}>
      <span class="custom-control-description">Night Club</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bikeonrent" {{in_array("bikeonrent",$services)?"checked":""}}>
      <span class="custom-control-description">Bike On Rent</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="basketballcourt" {{in_array("basketballcourt",$services)?"checked":""}}>
      <span class="custom-control-description">Basketball Court </span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bowling" {{in_array("bowling",$services)?"checked":""}}>
      <span class="custom-control-description">Bowling</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="fitnessequipment" {{in_array("fitnessequipment",$services)?"checked":""}}>
      <span class="custom-control-description">Fitness Equipment</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gameszone" {{in_array("gameszone",$services)?"checked":""}}>
      <span class="custom-control-description">Games Zone</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="marinaonsite" {{in_array("marinaonsite",$services)?"checked":""}}>
      <span class="custom-control-description">Marina On Site</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="recreationzone" {{in_array("recreationzone",$services)?"checked":""}}>
      <span class="custom-control-description">Recreation Zone</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="spaservicenearby" {{in_array("spaservicenearby",$services)?"checked":""}}>
      <span class="custom-control-description">Spa Service Nearby</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="tabletennis" {{in_array("tabletennis",$services)?"checked":""}}>
      <span class="custom-control-description">Table Tennis</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="gymequipment" {{in_array("gymequipment",$services)?"checked":""}}>
      <span class="custom-control-description">Gym Equipment</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="badminttion" {{in_array("badminttion",$services)?"checked":""}}>
      <span class="custom-control-description">Badminttion</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="boating" {{in_array("boating",$services)?"checked":""}}>
      <span class="custom-control-description">Boating</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="clubhouse" {{in_array("clubhouse",$services)?"checked":""}}>
      <span class="custom-control-description">Club House</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="virtualgulf" {{in_array("virtualgulf",$services)?"checked":""}}>
      <span class="custom-control-description">Virtual Gulf</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="squashcourt" {{in_array("squashcourt",$services)?"checked":""}}>
      <span class="custom-control-description">Squash Court</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="funfloats" {{in_array("funfloats",$services)?"checked":""}}>
      <span class="custom-control-description">Fun Floats</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="horseride" {{in_array("horseride",$services)?"checked":""}}>
      <span class="custom-control-description">Horse Ride(chargable)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="pooltable" {{in_array("pooltable",$services)?"checked":""}}>
      <span class="custom-control-description">Pool Table</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="naturewalk" {{in_array("naturewalk",$services)?"checked":""}}>
      <span class="custom-control-description">Nature Walk</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="amphitheatre" {{in_array("amphitheatre",$services)?"checked":""}}>
      <span class="custom-control-description">Amphitheatre</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="weddingservices" {{in_array("weddingservices",$services)?"checked":""}}>
      <span class="custom-control-description">Wedding Services Facility</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="partyhall" {{in_array("partyhall",$services)?"checked":""}}>
      <span class="custom-control-description">Party Hall</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="petfriendly" {{in_array("petfriendly",$services)?"checked":""}}>
      <span class="custom-control-description">Pet Friendly</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="pickupanddrop" {{in_array("pickupanddrop",$services)?"checked":""}}>
      <span class="custom-control-description">Pickup And Drop</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="separatesittingarea" {{in_array("separatesittingarea",$services)?"checked":""}}>
      <span class="custom-control-description">Separate Sitting Area</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="beautysalon" {{in_array("beautysalon",$services)?"checked":""}}>
      <span class="custom-control-description">Beauty Salon(On Charge)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="kidsplayzone" {{in_array("kidsplayzone",$services)?"checked":""}}>
      <span class="custom-control-description">Kids Play Zone</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="library" {{in_array("library",$services)?"checked":""}}>
      <span class="custom-control-description">Library</span>  
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="meditationroom" {{in_array("meditationroom",$services)?"checked":""}}>
      <span class="custom-control-description">Meditation Room</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="picnicarea" {{in_array("picnicarea",$services)?"checked":""}}>
      <span class="custom-control-description">Picnic Area</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="servantquarter" {{in_array("servantquarter",$services)?"checked":""}}>
      <span class="custom-control-description">Servent Quarter</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bicycle" {{in_array("bicycle",$services)?"checked":""}}>
      <span class="custom-control-description">Bicycle</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bikesfree" {{in_array("bikesfree",$services)?"checked":""}}>
      <span class="custom-control-description">Bikes Available(free)</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="childrenspool" {{in_array("childrenspool",$services)?"checked":""}}>
      <span class="custom-control-description">Children's Pool</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="cookingclasses" {{in_array("cookingclasses",$services)?"checked":""}}>
      <span class="custom-control-description">Cooking Classes</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="dancingclasses" {{in_array("dancingclasses",$services)?"checked":""}}>
      <span class="custom-control-description">Dancing Classes</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="daybed" {{in_array("daybed",$services)?"checked":""}}>
      <span class="custom-control-description">Daybed</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="barlounge" {{in_array("barlounge",$services)?"checked":""}}>
      <span class="custom-control-description">Bar/Lounge</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="multicuisineresturant" {{in_array("multicuisineresturant",$services)?"checked":""}}>
      <span class="custom-control-description">Multi Cuisine Resturant</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="specialityresturant" {{in_array("specialityresturant",$services)?"checked":""}}>
      <span class="custom-control-description">Speciality Resturant</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="catering" {{in_array("catering",$services)?"checked":""}}>
      <span class="custom-control-description">Catering</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="cafe" {{in_array("cafe",$services)?"checked":""}}>
      <span class="custom-control-description">Cafe</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="foodfacility" {{in_array("foodfacility",$services)?"checked":""}}>
      <span class="custom-control-description">Food Facility</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="hookahlounge" {{in_array("hookahlounge",$services)?"checked":""}}>
      <span class="custom-control-description">Hookah Lounge</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="poolcafe" {{in_array("poolcafe",$services)?"checked":""}}>
      <span class="custom-control-description">Pool Cafe</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="vegnonveg" {{in_array("vegnonveg",$services)?"checked":""}}>
      <span class="custom-control-description">Veg /Non-veg Kitchen Separate</span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="poolsidebar" {{in_array("poolsidebar",$services)?"checked":""}}>
      <span class="custom-control-description">Poolside Bar </span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="vegetarianfoodjainfood" {{in_array("vegetarianfoodjainfood",$services)?"checked":""}}>
      <span class="custom-control-description">Vegetarian Food/Jain Food Available </span>
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="fullminibar" {{in_array("fullminibar",$services)?"checked":""}}>
      <span class="custom-control-description">A Full Minibar</span>
      
                </label>
              </div>
                    <span class="help-block errortext"></span>
                </div> 

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Area Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="area" id="area" placeholder="Area Name" value="{{$homestay->area}}" required="required">
                     <span class="help-block errortext">{{$errors->first('area')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">City Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="city" id="city" placeholder="City Name" value="{{$homestay->city}}" required="required">
                     <span class="help-block errortext">{{$errors->first('city')}}</span>
                  </div>
                </div>
                <div class="form-group">
                   <label for="rating" class="col-sm-2 control-label">State</label>
                    <div class="col-sm-10">
	                <select name="state" id="state" required="required">
        					  <option value="p1" @if($homestay->state=='p1') selected='selected' @endif>Provision 1</option>
        					  <option value="p2" @if($homestay->state=='p2') selected='selected' @endif>Provision 2</option>
        					  <option value="p3" @if($homestay->state=='p3') selected='selected' @endif>Provision 3</option>
        					  <option value="p4" @if($homestay->state=='p4') selected='selected' @endif>Provision 4</option>
        					  <option value="p5" @if($homestay->state=='p5') selected='selected' @endif>Provision 5</option>
                                                  <option value="p6" @if($homestay->state=='p6') selected='selected' @endif>Provision 6</option>
                                                  <option value="p7" @if($homestay->state=='p7') selected='selected' @endif>Provision 7</option> 

        					</select>
                 </div>
                </div>
               
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Country Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="country" id="country" placeholder="Country Name" value="{{$homestay->country}}" required="required">
                      <span class="help-block errortext">{{$errors->first('country')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Contact Person</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cperson" id="cperson" placeholder="Contact Person" value="{{$homestay->cperson}}" required="required">
                      <span class="help-block errortext">{{$errors->first('cperson')}}</span>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Hotel Phone" value="{{$homestay->phone}}" required="required">
                      <span class="help-block errortext">{{$errors->first('phone')}}</span>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Mobile</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" value="{{$homestay->mobile}}" required="required">
                      <span class="help-block errortext">{{$errors->first('mobile')}}</span>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Hotel Email" value="{{$homestay->email}}" required="required">
                      <span class="help-block errortext" style="color:red">{{$errors->first('email')}}</span>
                  </div>
                </div>             
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&edit" class="btn btn-success" value="submit&edit">Submit & Edit</button>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
  </div>
@stop
@section('footer_resources')
<script type="text/javascript">
        $('.checked_all').on('change', function() {     
                $('.checkbox').prop('checked', $(this).prop("checked"));              
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
        $('.checkbox').change(function(){ //".checkbox" change 
            if($('.checkbox:checked').length == $('.checkbox').length){
                   $('.checked_all').prop('checked',true);
            }else{
                   $('.checked_all').prop('checked',false);
            }
        });
    </script>
@stop