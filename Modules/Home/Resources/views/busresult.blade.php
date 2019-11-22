@include('layouts.frontend.menu.commonmenu')
@section('content')

   <div class="container-fluid">
        <div class="jumbotron">
            <div class="row row-mar">
               
                <div class="col-md-6-offset-3">
                    <div class="container detail-address" align="center">
                        <div>
                            <h4>{{$frombus}} - {{$tobus}} </h4> <br>
                            <h5><?php echo date("jS F, Y", strtotime("$departurebus"));?> </h5>
                            <h5>{{$numseats}} Seats </h5>

                        </div>
                        <div class="container">
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <form class="form-inline" action="#">
                                        <div class="form-group">
                                          <label for="modifyfrom"></label>
                                         <span id="spanfrombus"><input type="text" class="form-control" id="modifyfrombus" placeholder="Enter Location From" name="modifyfrombus"></span>
                                        </div>
                                        <div class="form-group">
                                          <label for="modifytobus"></label>
                                          <span id="spantobus"><input type="text" class="form-control" id="modifytobus" placeholder="Enter Location To" name="modifytobus"></span>
                                        </div>
                                        <div class="form-group">
                                          <label for="modifydeparture"></label>
                                          <span id="spandeparture"><input type="text" class="form-control" id="modifydeparture" placeholder="Enter Departure Date" name="modifydeparture"></span>
                                        </div><br>
                                          <div class="form-group">
                                          <label for="nseats" id="nseats">Seats</label>
                                          <select class="form-control" id="seats">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>4</option>
                                            <option>4</option>
                                          </select>
                                        </div>
                                    <button type="submit" class="btn btn-default" id="modifysubmit">Search Again</button>
                                  </form> 
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                   </div>
                </div>  
               </div>  
            <div class="row polaroid-box">
                <div class="col-md-4 col-sm-4 col-xs-12 container-left">
                    <div class="input-group searchbar">
                    <input type="text" class="form-control" placeholder="Enter  bus here" id="search" onkeyup="search_data_bus(this.value)">
                    </div>
                    <div class="container"  id="sidebar1">
                      <p>Filter property By:</p>
                      <p>Price</p>
                      <div class="input-group">
                            <input type="checkbox" aria-label="" onchange="sort_data_bus_price(this.value)" value="aesc"  id="pricebus13" name="pricebus[]" class="price_bus">
                            <label for="price1">High to Low</label>
                        </div>
                      <br>
                       <p>Depature Time </p>
                       <div class="input-group">
                            <input type="checkbox" aria-label="" name="pricebus[]" value="timeall" id="pricebus12" class="price_all_bus" onchange="sort_data_bus_time(this.value)">
                            <label for="price1">All</label>
                        </div>

                        <div class="input-group">
                            <input type="checkbox" aria-label="" onchange="sort_data_bus_time(this.value)" value="day"  id="pricebus13" name="pricebus[]" class="price_bus">
                            <label for="price1">A.M.</label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" value="night" onchange="sort_data_bus_time(this.value)" id="pricebus14" name="pricebus[]" class="price_bus">
                            <label for="price1">P.M.</label>
                        </div>
                    </div>

                   <div class="container" style="margin-top:30px;">
                        <p>Bus Type</p>
                       <select name="bustype" id="bustype" class="form-control" onchange="sort_data_bus_type(this.value)" name="bustype">
                          <option value="Allbustype">All</option>
                          <option value="a">AC</option>
                          <option value="n">Non-Ac </option>
                          <option value="m">Macro</option>
                        </select>

                    </div>
                 </div>
                <!-- details container start-->
                <div class="col-md-7 col-sm-8 col-xs-12 container-right">
                    <div class="container">
                        <ul class="nav nav-pills nav-justified nav-custom">
                        <div class="col-sm-12 deparaf">
                          <label class="depaturelabel"></label>
                        <label class="depaturelabel dlo">Departure</label>
                         <label class="depaturelabel dlo">Duration</label>
                        <label class="depaturelabel dlt">Arrival</label>
                        <label class="depaturelabel ok">Fair</label>
                      </div>



                        </ul>

                        
                        <div class="tab-content">
                                <div id="allbus" class="tab-pane fade in active">
                                <div class="container" id="buses">
                                     @foreach($resultbus as $bus)
                                    <div class="row polaroid-box zoom1">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                         <h4 class="display-text">{{$bus->oname}}</h4>
                                            <div id="image-container1">
                                                <img src="{{url('triporbitz/public/images/'.$bus->image)}}" alt="image1">
                                            </div>

                                            <div class="">
                                              
                                              <i class="fas fa-wifi"></i>
                                              <i class="fa fa-tint"></i>
                                              <i class="fab fa-accusoft"></i>
                                            </div>

                                        </div>
                                    <div class="col-md-9 col-sm-12 col-xs-12 bus-position">
                <div class="container">
                    <!-- <div id="detail-container"> -->
                        <!-- <h3>{{$bus->oname}}</h3> -->
                            <!-- </div> -->
                            <div class="list-container">
                                <!-- <h4 class="display-text">{{$bus->oname}}</h4> -->
                                <!-- <h4 class="display-text rating"><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span></h4> -->
                                <h4 class="display-price">RS.&nbsp;{{$bus->price}}</h4>
                            </div>
                            <div class="list-container">
                                <!-- <a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a> -->
                                <!-- <a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a> -->
                                <!-- <i class="fa fa-shower" aria-hidden="true"></i> -->
                            </div>
              
                 <div class="timeduration">
                   <label>{{$bus->dtime}} p.m</label>
                   <label></label>
                   <label>{{$bus->atime}} p.m</label>
                   <label>{{$bus->from_loc}}</label>
                   <label> </label>
                   <label>{{$bus->to_loc}}</label>

                 </div>
  <div class="list-container list-con">
  <a href="#" rel="popover" data-trigger="hover"  data-popover-content="#Poto">Photo</a>
  <div id="Poto" class="hide popover-margin">
    <label class="modal-title">Photo</label>
    <ul>
      <li> <img src="{{url('triporbitz/public/images/'.$bus->image)}}" alt="image1"></li>
      <li> <img src="{{url('triporbitz/public/images/'.$bus->image)}}" alt="image1"></li>
      <li> <img src="{{url('triporbitz/public/images/'.$bus->image)}}" alt="image1"></li>
    </ul>
  </div>
  <a href="#" rel="popover" data-trigger="hover"  data-popover-content="#Bording" >Bording Points</a>
<div id="Bording" class="hide  popover-margin">
    <label class="modal-title">Bording points</label>
    <ul>
      <li>List item 1</li>
      <li>List item 2</li>
      <li>List item 3</li>
    </ul>
  </div>
    <a href="#" rel="popover" data-trigger="hover"  data-popover-content="#Policy" >Policy</a>
      <div id="Policy" class="hide  popover-margin">
          <label class="modal-title">Policy</label>
     <p>about us If your spaces turn into strange symbols on the web browser,it's most likely caused by extra data stored in the word processing format not intended for online display. Avoid this by using a plaintext editor like Notepad or</p>
      </div>    
     </div>
    </div>                     

        <div class="container select-set">
           <button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#Seatselectionmodal" id="selectbutton">Select Seat 
         </button>  
        <br> <br>
        <small class="pull-right">few seat left</small>
     </div>
    </div>
                   
  </div>
     @endforeach
       </div>
     </div>
   </div>
 </div>
 <hr>
</div>

                        <!-- details container end -->
                        {{-- modal seats available --}}
                <div id="Seatselectionmodal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                       </div>
    <!-- bus set setting.................. -->
                      
                      <div class="modal-body">
                        <div class="wrapper">
                          <div id="seat-map"></div>
                                
                          <div class="booking-details">
                          <div id="legend"></div>

                          <h3> Selected Seats (<span id="counter">0</span>):</h3>

                          <ul id="selected-seats" class="scrollbar scrollbar1"></ul>

                          Total: <b><span id="total">0</span></b>
                          
                          <div class="boding-points">
                                <!-- <leble class="">Bording points:</leble> -->
                                  <select class="" placeholder="Bording points:">
                                                        <option>Bording points:</option>
                                                        <option>List item 1</option>
                                                        <option>List item 2</option>
                                                        <option>List item 3</option>
                                                      </select>
                            </div>


                          <a href="{{route('buses.review')}}" class="checkout-button">Confirm</a>
                          </div>
                          <div class="clear"></div>
                        </div>
                        
                    </div>

      <!-- bus set setting end........... -->
                        

                      
                      </div>
                    </div>

                  </div>
                       
                       {{-- end modal seats --}}


                    </div>

                </div>
              
            </div>
 





@include('layouts.frontend.main')