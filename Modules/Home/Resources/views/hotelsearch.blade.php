@include('layouts.frontend.menu.commonmenu')
@section('content')
   <div class="container-fluid">
        <div class="jumbotron">
            <div class="row row-mar">
               
                <div class="col-md-6-offset-3">
                    <div class="container" align="center">
                        <div class="hotelsearch">
                           <h4></h4>
                            <h5><?php echo date("jS F, Y", strtotime("$checkin"));?> - <?php echo date("jS F, Y", strtotime("$checkout"));?></h5>
                            <h5>{{$adults}} Adults {{$childs}} Children In {{$rooms}} Rooms </h5>

                        </div>
                        <div class="container">
                          <!-- Trigger the modal with a button -->
                         <!--  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" id="modifysearch">Modify Search</button>
 -->
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Modify Search</h4>
                                </div> -->
                                <div class="modal-body">
                                  <form class="form-inline" action="/action_page.php">
                                        <div class="form-group">
                                          <label for="modifyfrom"></label>
                                         <span id="spanfrom"><input type="text" class="form-control" id="modifyfrom" placeholder="Enter Location" name="modifyfrom"></span>
                                        </div>
                                        <div class="form-group">
                                          <label for="modifycheckin"></label>
                                          <span id="spancheckin"><input type="text" class="form-control" id="modifycheckin" placeholder="Enter Checkin Date" name="modifycheckin"></span>
                                        </div>
                                        <div class="form-group">
                                          <label for="modifycheckout"></label>
                                          <span id="spancheckout"><input type="text" class="form-control" id="modifycheckout" placeholder="Enter Checkout Date" name="modifycheckout"></span>
                                        </div><br>
                                        <div class="row">
                                         <table class="table modifiedtraveller" id="modifiedtraveller">
                                    <thead>
                                        <tr>
                                        <td>
                                           <div class="form-group">
                                          <p id="roomno">Room 1:</p>  
                                        </div>
                                      </td>
                                        <td>            
                                           <div class="form-group">
                                          <label for="madults" id="adultlabel">Number of Adults</label>
                                          <select class="form-control" id="modifyadults">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                          </select>
                                        </div>
                                      </td>
                                     <td>
                                         <div class="form-group">
                                          <label for="mchilds" id="childlabel">Number of Childrens</label>
                                          <select class="form-control" id="modifychilds">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                          </select>
                                        </div>  
                                      </td> 
                                        </tr><br>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>    
                             </div>
                
                                    <a href="#" name="addanotherroom" id="anotherroom">Add Room</a><br>
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

                    <input type="text" class="form-control" placeholder="Enter Hotel here" id="search" onkeyup="search_data_hotel(this.value)">
                    </div>

                    <div class="container"  id="sidebar1">
                         <p>Filter property By:</p>
                        <p>Price per night</p>
                        <form action="" method="POST">

                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="price[]" value="1" id="price12"  class="price" onchange="sort_data(this.value)">
                            <label for="price1">0-4000</label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="price[]" value="2" id="price23"  class="price" onchange="sort_data(this.value)">
                            <label for="price1"> 4000-8000</label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="price[]" value="3" id="price34"  class="price" onchange="sort_data(this.value)">
                            <label for="price1"> 8000-12000</label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="price[]" value="4" id="price45"  class="price" onchange="sort_data(this.value)">
                            <label for="price1"> 12000-16000</label>
                        </div>
                     
                     <div class="input-group">
                            <input type="checkbox" aria-label="" name="price[]" value="5" id="price45"  class="price" onchange="sort_data(this.value)">
                            <label for="price1">16000+</label>
                        </div>

                      </form>
                    </div>
                    <div class="container">
                        <br>
                        <p>Star Rating</p>
                        <form action="" method="POST">
                          <div class="input-group">
                            <input type="checkbox" aria-label="" name="rating[]" value="All" id="ratingall" class="ratingall" onchange="sort_data_rating_hotel(this.value)">
                            <label class="unrated" for="ratingall">All</label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="rating[]" value="unrated" id="unrated" class="unrated" onchange="sort_data_rating_hotel(this.value)">
                            <label class="unrated" for="unrated">UnRated</label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="rating[]" value="1" id="rating1"  class="rating" onchange="sort_data_rating_hotel(this.value)">
                            <label for="rating1" class="rating"><span><i class="fas fa-star"></i></span></label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="rating[]" value="2" id="rating2"  class="rating" onchange="sort_data_rating_hotel(this.value)">
                            <label for="rating2"  class="rating"><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span></label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="rating[]" value="3" id="rating3"  class="rating" onchange="sort_data_rating_hotel(this.value)">
                            <label for="rating3"  class="rating"><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span></label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="rating[]" value="4" id="rating4"  class="rating" onchange="sort_data_rating_hotel(this.value)">
                            <label for="rating4"  class="rating"><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span></label>
                        </div>
                         <div class="input-group">
                            <input type="checkbox" aria-label="" name="rating[]" value="5" id="rating5"  class="rating" onchange="sort_data_rating_hotel(this.value)">
                            <label for="rating5"  class="rating"><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span></label>
                        </div>
                      </form>
                    </div>
                    <div class="container">
                      <p>Near by location</p>
                      <ul>
                        @if(sizeof($areas)>0)
                        @foreach($areas as $a)
                          <li>
                          <h4><a href="#" style="text-decoration: underline;" id="nearby" onclick="nearbyloacationhotel({{$a->id}})">{{$a->area}}</a></h4>
                        </li>
                       
                        @endforeach
                        @else
                        <h4>No related area found</h4>
                        @endif
                      </ul>
                    </div>
                </div>
                <!-- details container start-->
                <div class="col-md-7 col-sm-8 col-xs-12 container-right">
                    <div class="container">
                        
                        <div class="hotelsort"> 
                      <a  class="activ" data-toggle="pill" href="#allHotels">All Hotels</a>
                       
                        <ul class="nav nav-pills nav-justified nav-custom">
                            
                            <li>Sort By:</li>
                            
                            <li id="pricehotels"><a data-toggle="pill" href="#price">Property Name<i class="fas fa-sort"></i></a></li>
                             <li id="ratinghotels"><a data-toggle="pill" href="#starRating">Star Rating<i class="fas fa-sort"></i></a></li>
                            <li id="pricehotels"><a data-toggle="pill" href="#price">Price<i class="fas fa-sort"></i></a></li>
                           
                       
                        </ul>

                      </div>
                        <div class="tab-content">
                            <div id="allHotels" class="tab-pane fade in active">
                                <div class="container" id="hotels">
                                    @foreach($hotels as $hotel)
                                    <div class="row polaroid-box zoom">

                                        <div class="col-md-3 col-sm-6 col-xs-12">

                                            <div id="image-container">
                                                <?php $image= explode(',',$hotel->image);?>
                                                <img src="{{url('triporbitz/public/images/'.$image[0])}}" alt="image1">
                                                
                                            </div>

                                        </div>
                                        <div class="col-md-9 col-sm-12 col-xs-12 information-container">
                                            <div class="container">
                                                <div id="detail-container">
                                                    <h3>{{$hotel->hname}}</h3>
                                                        </div>
                                                        <div class="list-container">
                                                            <h4 class="display-text" title="{{$hotel->area}},{{$hotel->city}},{{$hotel->country}} "><i class="fa fa-map-marker"></i>&nbsp;{{$hotel->area}},{{$hotel->city}},<?php echo mb_strimwidth($hotel->country, 0, 3, "...");?></h4>
                                                            <br>
                                                            <h4 class="display-text rating">
                                                              @if($hotel->rating=='1')
                                                              <span><i class="fas fa-star"></i></span>
                                                              @elseif($hotel->rating=='2')
                                                              <span><i class="fas fa-star"></i></span>
                                                              <span><i class="fas fa-star"></i></span>
                                                              @elseif($hotel->rating=='3')
                                                              <span><i class="fas fa-star"></i></span>
                                                              <span><i class="fas fa-star"></i></span>
                                                              <span><i class="fas fa-star"></i></span>
                                                              @elseif($hotel->rating=='4')
                                                              <span><i class="fas fa-star"></i></span>
                                                              <span><i class="fas fa-star"></i></span>
                                                              <span><i class="fas fa-star"></i></span>
                                                              <span><i class="fas fa-star"></i></span>
                                                              @elseif($hotel->rating=='5')
                                                              <span><i class="fas fa-star"></i></span>
                                                              <span><i class="fas fa-star"></i></span>
                                                              <span><i class="fas fa-star"></i></span>
                                                              <span><i class="fas fa-star"></i></span>
                                                              <span><i class="fas fa-star"></i></span>
                                                              @else
                                                              &nbsp;&nbsp;detarnu
                                                              @endif 
                                                            
                                                            </h4>
                                                            <h4 class="display-price">RS.&nbsp;{{$hotel->baseprice}}</h4>
                                                        </div>
                                                        <div class="list-container">
                                                            <a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>
                                                            <i class="fa fa-shower" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="list-container list-container-inline">
                                                            <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">OverView</a>&nbsp;&nbsp;&nbsp;
                                                             <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">Amenities</a>&nbsp;&nbsp;&nbsp;
                                                              <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">Policy</a>
                                                        </div>    
                                                    </div>
                                                    <div class="container" style="margin-top: -10px;">
                                                        <a href="{{route('hotels.detail',[$hotel->id])}}" type="button" class="btn btn-primary pull-right">Book now</a>
                                                        
                                                        <br> <br>
                                                        <small class="pull-right">few Rooms left</small>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div id="price" class="tab-pane fade">
                                       <div class="container" id="hotelsprice">
                                    @foreach($hotelsprice as $hotel)
                                    <div class="row polaroid-box zoom">

                                        <div class="col-md-3 col-sm-6 col-xs-12">

                                            <div id="image-container">
                                               <?php $pimage= explode(',',$hotel->image);?>
                                                <img src="{{url('triporbitz/public/images/'.$pimage['0'])}}" alt="image1">
                                            </div>

                                        </div>
                                        <div class="col-md-9 col-sm-12 col-xs-12 information-container">
                                            <div class="container">
                                                <div id="detail-container">
                                                    <h3>{{$hotel->hname}}</h3>
                                                        </div>
                                                        <div class="list-container">
                                                            <h4 class="display-text" title="{{$hotel->area}},{{$hotel->city}},{{$hotel->country}} "><i class="fa fa-map-marker"></i>&nbsp;{{$hotel->area}},{{$hotel->city}},<?php echo mb_strimwidth($hotel->country, 0, 3, "...");?></h4>
                                                            <br>
                                                                <h4 class="display-text rating">
                                                                    <span><i class="fas fa-star"></i></span>
                                                                    <span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>
                                                                </h4>
                                                            
                                                            <h4 class="display-price">RS.&nbsp;{{$hotel->baseprice}}</h4>
                                                        </div>
                                                        <div class="list-container">
                                                            <a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>
                                                            <i class="fa fa-shower" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="list-container list-container-inline">
                                                          <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">OverView</a>&nbsp;&nbsp;&nbsp;
                                                             <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">Amenities</a>&nbsp;&nbsp;&nbsp;
                                                              <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">Policy</a>
                                                        </div>
                                                    </div>
                                                    <div class="container" style="margin-top: -10px;">
                                                        <a href="{{route('hotels.detail',[$hotel->id])}}" type="button" class="btn btn-primary pull-right">Book now</a>
                                                        <br> <br>
                                                        <small class="pull-right">few Rooms left</small>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                     </div>
                                    <div id="starRating" class="tab-pane fade">
                                       <div class="container" id="hotelsrating">
                                    @foreach($hotelsrating as $hotel)
                                    <div class="row polaroid-box zoom">

                                        <div class="col-md-3 col-sm-6 col-xs-12">

                                            <div id="image-container">
                                               <?php $rimage= explode(',',$hotel->image);?>
 
                                                <img src="{{url('triporbitz/public/images/'.$rimage['0'])}}" alt="image1">
                                            </div>

                                        </div>
                                        <div class="col-md-9 col-sm-12 col-xs-12 information-container">
                                            <div class="container">
                                                <div id="detail-container">
                                                    <h3>{{$hotel->hname}}</h3>
                                                        </div>
                                                        <div class="list-container">
                                                            <h4 class="display-text" title="{{$hotel->area}},{{$hotel->city}},{{$hotel->country}} "><i class="fa fa-map-marker"></i>&nbsp;{{$hotel->area}},{{$hotel->city}},<?php echo mb_strimwidth($hotel->country, 0, 3, "...");?></h4>                                                            <br>
                                                            <h4 class="display-text rating">
                                                                 <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>

                                                            </h4>
                                                            <h4 class="display-price">RS.&nbsp;{{$hotel->baseprice}}</h4>
                                                        </div>
                                                        <div class="list-container">
                                                            <a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>
                                                            <i class="fa fa-shower" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="list-container list-container-inline">
                                                            <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">OverView</a>&nbsp;&nbsp;&nbsp;
                                                             <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">Amenities</a>&nbsp;&nbsp;&nbsp;
                                                              <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">Policy</a>
                                                        </div>
                                                    </div>
                                                    <div class="container" style="margin-top: -10px;">
                                                        <a href="{{route('hotels.detail',[$hotel->id])}}" type="button" class="btn btn-primary pull-right">Book now</a>
                                                        <br> <br>
                                                        <small class="pull-right">few Rooms left</small>
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
                    </div>

                </div>
                
            </div>
 
@include('layouts.frontend.main')
