@include('layouts.frontend.menu.commonmenu')
@section('content')
   <div class="container-fluid">
        <div class="jumbotron">
            <div class="row row-mar">
               
                <div class="col-md-6-offset-3">
                    <div class="container" align="center">
                        <div class="homestaysearch">
                            
                            <h5><?php echo date("jS F, Y", strtotime("$checkinhomestay"));?> - <?php echo date("jS F, Y", strtotime("$checkouthomestay"));?></h5>
                            <h5>{{$adultshomestay}} Adults {{$childshomestay}} Children In {{$roomshomestay}} Rooms </h5>

                        </div>
                        
                   </div>
                </div>  
               </div>  
            <div class="row polaroid-box">
                <div class="col-md-4 col-sm-4 col-xs-12 container-left">
                    <h2 align="center">Search Results</h2>
                    <hr>
                    <div class="input-group searchbar">

                    <input type="text" class="form-control" placeholder="Enter Hotel here" id="search" onkeyup="search_data_homestay(this.value)" name="search">
                    </div>

                    <div class="container"  id="sidebar1">
                        <p>Price for one night</p>
                        <form action="" method="POST">
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="price[]" value="All" id="price12" class="price_all" onchange="sort_data_homestay(this.value)">
                            <label for="price1">All</label>
                        </div>

                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="price[]" value="1" id="price12"  class="price" onchange="sort_data_homestay(this.value)">
                            <label for="price1"> 0-4000</label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="price[]" value="2" id="price23"  class="price" onchange="sort_data_homestay(this.value)">
                            <label for="price1"> 4000-8000</label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="price[]" value="3" id="price34"  class="price" onchange="sort_data_homestay(this.value)">
                            <label for="price1"> 8000-12000</label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="price[]" value="4" id="price45"  class="price" onchange="sort_data_homestay(this.value)">
                            <label for="price1"> 12000-16000</label>
                        </div>
                        <div class="input-group">
                            <input type="checkbox" aria-label="" name="price[]" value="5" id="price45"  class="price" onchange="sort_data_homestay(this.value)">
                            <label for="price1">16000+</label>
                        </div>
                      </form>
                    </div>

                      <div class="container">
                      <p>Near by location</p>
                      <ul>
                        @if(sizeof($areashomestay)>0)
                        @foreach($areashomestay as $a)
                          <li>
                          <h4><a href="#" style="text-decoration: underline;" id="nearby" onclick="nearbyloacationhomestay({{$a->id}})">{{$a->area}}</a></h4>
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
                            <li>sort by:</li>
                            <li id="pricehotels"><a data-toggle="pill" href="#price">Property Name <i class="fas fa-sort"></i></a></li>
                            <li id="pricehotels"><a data-toggle="pill" href="#price">Price <i class="fas fa-sort"></i></a></li>
                        </ul>
                      </div>
                        <div class="tab-content">
                            <div id="allHotels" class="tab-pane fade in active">
                                <div class="container" id="homestay">
                                    @foreach($homestay as $home)
                                    <div class="row polaroid-box zoom">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div id="image-container">
                                               <?php $homestayimage=explode(',',$home->image); ?>
                                                <img src="{{url('triporbitz/public/images/'.$homestayimage['0'])}}" alt="'.$home->image.'">
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-12 col-xs-12 information-container">
                                            <div class="container">
                                                <div id="detail-container">
                                                    <h3>{{$home->hname}}</h3>
                                                        </div>
                                                        <div class="list-container">
                                                            <h4 class="display-text">{{$home->area}},{{$home->city}},{{$home->country}}</h4>
                                                            <h4 class="display-price">RS.&nbsp;{{$home->baseprice}}</h4>
                                                        </div>
                                                        <div class="list-container">
                                                            <a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>
                                                            <i class="fa fa-shower" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="list-container list-container-inlinehome">
                                                            <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$home->description}}">OverView</a>&nbsp;&nbsp;&nbsp;
                                                             <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$home->description}}">Amenities</a>&nbsp;&nbsp;&nbsp;
                                                              <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$home->description}}">Policy</a>
                                                        </div>    
                                                    </div>
                                                    <div class="container">
                                                        <a href="{{route('homestay.detail',[$home->id])}}" type="button" class="btn btn-primary pull-right">Book now</a>
                                                        <br> <br>
                                                        <small class="pull-right">few Rooms left</small>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div id="price" class="tab-pane fade">
                                       <div class="container" id="homestayprice">
                                    @foreach($homestayprice as $hotel)
                                    <div class="row polaroid-box zoom">

                                        <div class="col-md-3 col-sm-6 col-xs-12">

                                            <div id="image-container">
                                                <?php $homestayimage=explode(',',$hotel->image); ?>
                                                <img src="{{url('triporbitz/public/images/'.$homestayimage['0'])}}" alt="'.$hotel->image.'">
                                            </div>

                                        </div>
                                        <div class="col-md-9 col-sm-12 col-xs-12 information-container">
                                            <div class="container">
                                                <div id="detail-container">
                                                    <h3>{{$hotel->hname}}</h3>
                                                        </div>
                                                        <div class="list-container">
                                                            <h4 class="display-text">{{$home->area}},{{$home->city}},{{$home->country}}</h4>
                                                            <h4 class="display-price">RS.&nbsp;{{$hotel->baseprice}}</h4>
                                                        </div>
                                                        <div class="list-container">
                                                            <a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>
                                                            <i class="fa fa-shower" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="list-container list-container-inlinehome">
                                                            <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">OverView</a>&nbsp;&nbsp;&nbsp;
                                                             <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">Amenities</a>&nbsp;&nbsp;&nbsp;
                                                              <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">Policy</a>
                                                        </div>
                                                    </div>
                                                    <div class="container">
                                                        <a href="{{route('homestay.detail',[$hotel->id])}}" type="button" class="btn btn-primary pull-right">Book now</a>
                                                        <br> <br>
                                                        <small class="pull-right">few Rooms left</small>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                     </div>
                                    <div id="starRating" class="tab-pane fade">
                                       <div class="container" id="homestayrating">
                                    @foreach($homestayrating as $hotel)
                                    <div class="row polaroid-box zoom">

                                        <div class="col-md-3 col-sm-6 col-xs-12">

                                            <div id="image-container">
                                                 <?php $homestayimage=explode(',',$hotel->image); ?>
                                                <img src="{{url('triporbitz/public/images/'.$homestayimage['0'])}}" alt="'.$hotel->image.'">
                                            </div>

                                        </div>
                                        <div class="col-md-9 col-sm-12 col-xs-12 information-container">
                                            <div class="container">
                                                <div id="detail-container">
                                                    <h3>{{$hotel->hname}}</h3>
                                                        </div>
                                                        <div class="list-container">
                                                            <h4 class="display-text">{{$home->area}},{{$home->city}},{{$home->country}}</h4>
                                                            <h4 class="display-price">RS.&nbsp;{{$hotel->baseprice}}</h4>
                                                        </div>
                                                        <div class="list-container">
                                                            <a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>
                                                            <i class="fa fa-shower" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="list-container list-container-inlinehome">
                                                            <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">OverView</a>&nbsp;&nbsp;&nbsp;
                                                             <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">Amenities</a>&nbsp;&nbsp;&nbsp;
                                                              <a href="#" data-toggle="popover" title="Hotel Overview" data-content="{{$hotel->description}}">Policy</a>
                                                        </div>
                                                    </div>
                                                    <div class="container">
                                                        <a href="{{route('homestay.detail',[$hotel->id])}}" type="button" class="btn btn-primary pull-right">Book now</a>
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