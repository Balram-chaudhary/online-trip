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
            <form  action="" class="form-horizontal formpadding" id="homestay" method="POST" enctype="multipart/form-data" file="true" name="homestay">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Hotel Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="hname" id="hname" placeholder="Hotel Name" value="{{old('hname')}}" required="required">
                      <span class="help-block errortext">{{$errors->first('hname')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Bank Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="bname" id="bname" placeholder="Bank Name" value="{{old('bname')}}" required="required">
                      <span class="help-block errortext">{{$errors->first('bname')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Account Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="anumber" id="anumber" placeholder="Account Number" value="{{old('anumber')}}" required="required">
                      <span class="help-block errortext">{{$errors->first('anumber')}}</span>
                  </div>
                </div>
                <div class="form-group">
                   <label for="specialtype" class="col-sm-2 control-label">Is Special Type</label>
                    <div class="col-sm-10">
	                <select name="special" id="special" required="required">
        					  <option value="p">Yes</option>
        					  <option value="n">No</option>
        					</select>
                 </div>
                 </div>
               
             
                <div class="form-group">
                    <label for="himage" class="col-sm-2 control-label">Hotel Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont onchange="validateImage()"rol"  name="images[]" id="images"   value="{{old('images.*')}}" multiple="multiple" required="required">
                       <span class="help-block errortext">{{$errors->first('images.*')}}</span>
                    </div>
                  </div>
                <div class="form-group">
                   <label for="rating" class="col-sm-2 control-label">Hotel Rating(*)</label>
                    <div class="col-sm-10">
	                <select name="rating" id="rating" required="required">
        					  <option value="1">1</option>
        					  <option value="2">2</option>
        					  <option value="3">3</option>
        					  <option value="4">4</option>
        					  <option value="5">5</option>
        					</select>
                 </div>
                </div>
                <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                  <select name="type" id="type" required="required">
                    <option value="1">Homestay</option>
                    <option value="2">Hotel</option>
                  </select>
                 </div>
                </div>
                <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Is Verified?</label>
                    <div class="col-sm-10">
                  <select name="is_verified" id="is_verified" required="required">
                    <option value="y">Yes</option>
                    <option value="n">NO</option>
                  </select>
                 </div>
                </div>
                
                <div class="form-group">
                   <label for="rating" class="col-sm-2 control-label">Base Currency</label>
                    <div class="col-sm-10">
	                <select name="basecurrency" id="basecurrency" required="required">
        					  <option value="n">Nepalease</option>
        					  <option value="i">Indian</option>
        					  <option value="u">USD</option>
        					</select>
                 </div>
                 </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Total Number of Rooms</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="trooms" id="trooms" placeholder="Total Number of Rooms" value="{{old('trooms')}}" required="required">
                      <span class="help-block errortext">{{$errors->first('trooms')}}</span>
                  </div>
                </div>
                  <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Base Price</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="baseprice" id="baseprice" placeholder="Enter Base Price" value="{{old('baseprice')}}" required="required">
                      <span class="help-block errortext">{{$errors->first('baseprice')}}</span>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Check In</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="checkin" id="checkin" placeholder="CheckIn Date" value="{{old('checkin')}}" required="required">
                      <span class="help-block errortext">{{$errors->first('checkin')}}</span>
                  </div>
                </div>

              <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Check Out</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="checkout" id="checkout" placeholder="CheckOut Date" value="{{old('checkout')}}" required="required">
                      <span class="help-block errortext">{{$errors->first('checkout')}}</span>
                  </div>
                </div>
               
             <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Latitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Enter Latitude" value="{{old('latitude')}}" required="required">
                      <span class="help-block errortext">{{$errors->first('latitude')}}</span>
                  </div>
                </div>

             <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Longitude</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Enter Longitude" value="{{old('longitude')}}" required="required">
                      <span class="help-block errortext">{{$errors->first('longitude')}}</span>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description" placeholder="Hotel Description" rows="10" cols="90" required="required" >{{old('description')}}</textarea>
                  </div>
                    <span class="help-block errortext"></span>
                </div>
            <div class="form-group" id="services">
             <label for="services" class="col-sm-2 control-label">Amenitites n services</label>
             <div class="col-sm-10">
                  {{-- <input type="checkbox" class="checkbox-inline checked_all" name="services[]" value="all">
                  <span class="custom-control-description">Select All</span> --}}
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
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="bath">
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
      <input type="checkbox" class="checkbox-inline checkbox" name="services[]" value="towels">
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
      


                </label>
              </div>
                    <span class="help-block errortext"></span>
                </div> 

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Area Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="area" id="area" placeholder="Area Name" value="{{old('area')}}" required="required">
                     <span class="help-block errortext">{{$errors->first('area')}}</span>
                  </div>
                </div>
               <div class="form-group">
                   <label for="rating" class="col-sm-2 control-label">State</label>
                    <div class="col-sm-10">
	                <select name="state" id="state" required="required">
        					  <option value="p1">Provision 1</option>
        					  <option value="p2">Provision 2</option>
        					  <option value="p3">Provision 3</option>
        					  <option value="p4">Provision 4</option>
        					  <option value="p5">Provision 5</option>
                                                  <option value="p6">Provision 6</option>
                                                  <option value="p7">Provision 7</option> 

        					</select>
                 </div>
                </div>
                
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">City Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="city" id="city" placeholder="City Name" value="{{old('city')}}" required="required">
                     <span class="help-block errortext">{{$errors->first('city')}}</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Country Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="country" id="country" placeholder="Country Name" value="{{old('country')}}" required="required">
                      <span class="help-block errortext">{{$errors->first('country')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Contact Person</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cperson" id="cperson" placeholder="Contact Person" value="{{old('cperson')}}" required="required">
                      <span class="help-block errortext">{{$errors->first('cperson')}}</span>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="{{old('phone')}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('phone')}}</span>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Mobile</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Hotel  Mobile" value="{{old('mobile')}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('mobile')}}</span>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Hotel Email" value="{{old('email')}}" required="required">
                      <span class="help-block errortext" style="color:red">{{$errors->first('email')}}</span>
                  </div>
                </div>             
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&create" class="btn btn-success" onClick="return validate();" value="submit&create" id="submit">Submit & Create</button>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
        
        </div>
       
     
      </div>
      <!-- /.row -->
    </section>
  </div>
 
@stop
@section('footer_resources')
{{-- <script type="text/javascript">
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
    </script> --}}


<script type="text/javascript">
    $(document).ready(function(){
        $('#images').change(function(){
               var fp = $("#images");
               var lg = fp[0].files.length; // get length
               var items = fp[0].files;
               var fileSize = 0;
           
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   fileSize = fileSize+items[i].size; // get file size
               }
               if(fileSize > 2000000) {
                    alert('File size must not be more than 2 MB');
                    $('#images').val('');
               }
               if(lg > 8){
                alert('images must not be more than 8');
                    $('#images').val('');
             }

           }
        });
    });
    </script>
   {{--  <script type="text/javascript">
       function validate(){
       var file= homestay.images.value;
       var reg = /(.*?)\.(jpg|bmp|jpeg|png)$/;
       if(!file.match(reg))
       {
         alert("Invalid Image Format");
         return false;
       }
       }
    </script> --}}



 @stop