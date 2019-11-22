@include('layouts.frontend.menu.commonmenu')
@section('content')
<div class="container-fluid">
    <div class="jumbotron">
      <div class="container polaroid-box">
        <div class="row">
        
          <div class="col-md-9 col-sm-8 col-xs-12">
            <h3>{{$activities->aname}}</h3>
            <small>{{$activities->area}},{{$activities->city}},{{$activities->country}}</small>
          </div>
          
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="container">
              <div class="room-selector">
                <h4 class="">Rs.{{$activities->price}}</h4>
              
               <a class="btn btn-primary btn-block" type="button" value="book now" data-toggle="modal" data-target="#activitiesModal">Book Now</a>

              
              </div>
            </div>
          </div>
         </div>

<div class="row">
           <div class="col-md-9 col-sm-9 col-xs-9 tab-widter">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#photos">Photos</a></li>
              <li><a data-toggle="tab" href="#description">Description</a></li>
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
                    <img class="example-image" id="expandedImg" src="{{url('triporbitz/public/images/'.$images['0'])}}">
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
                <p>{{$activities->description}}</p>
              </div>
<!-- ..........end of Description.............. -->

<!-- ..............map..............       -->
              <div id="map" class="tab-pane fade">
                <div class="container">
                  <div class="w3ls_map map-sizing"">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48306.05339877067!2d-74.245183970742!3d40.825144655510556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2555646a723a1%3A0x449f3366d017b214!2sMontclair%2C+NJ%2C+USA!5e0!3m2!1sen!2sin!4v1465991700675"
                    style="border:0;"></iframe>
                  </div>
                </div>
              </div>
<!-- .................end map.............. -->

<!-- ................policies...................... -->
              <div id="policies" class="tab-pane fade">
                <h3>Policies</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
              </div>
<!-- ..........end of policies.............. -->
   </div>
</div>
                   
        <div class="col-md-3 chekinout">
          <h4>Duration:</h4>{{$activities->hour}}Hour&nbsp;{{$activities->minute}}Minute<br>
          <h4>Highlights</h4>
          <p>{{$activities->add_info}}</p><br>
          <h4>Meeting Point</h4>
          <p>{{$activities->area}},{{$activities->city}}</p>
          <h4>Meeting Time:</h4>
          <p> 8:00Am</p>  

                  </div>


   </div>
 </div>
</div>
</div>

{{-- see more section --}}
  <div id="section4" class="container-fluid1">
   <div class="simple-card simple-card4">
    <div class="card-body">
      <h2>See more activities</h2>
      <br>
      <div class="packages_grid1">
         @if(sizeof($related)>0)
         @foreach($related as $r)
         @if($r->del_flag=='0')
        <div class="col-md-4 package1">
          <img src="{{asset('triporbitz/public/images/'.$images['0'])}}" alt="{{$r->image}}" />

<div class="bottom-left">
            <h5>Rs&nbsp;{{$r->price}}</h5>
  </div>          
  <div class="bottom-right">
            <a href="{{route('activities.detail',$r->id)}}">Book Now</a>

</div>
          <div class="centered">
            <h4>{{$r->aname}}</h4>
            
          </div>
        </div>
        @endif
        @endforeach
        @else
        <h2>No Travel Himalayan Activities Found</h2>
        @endif

        <div class="clearfix"></div>
      </div>

    </div>
  </div>
  </div>



<!-- .............dailog boxs...................... -->
<div class="modal fade" id="activitiesModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
              <div class="modal-header modal-header2">
                <h4 class="modal-title" align="center">Activities Availability Search</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
      
     <div class="modal-body modal-bodyhieght">
      <form action="{{route('activities.availability')}}" method="POST" name="checkactivities">
       <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
        <div class="row">
        
                              <div class="col-md-4 heighty">
                                <div class="contentforcalender">
                                   <div class="cal21">
                                     <div class="input-group"  id="eventdate">
                                        <input type="text" id="checkin" name="checkin" class="form-control Datepicker home-button inputs" placeholder="Check-In"  required="required">
                                     <span class="input-group-btn ">
                                       <button id="up" class="btn btn-default number-control input-number">
                                            <span class="glyphicon  glyphicon-calendar"></span>
                                        </button>
                                    </span>
                                   </div> 
                                 </div>
                               </div>
                                
                                <!-----start-copyright---->
                                <!-- <div class="copy-right"></div> -->
                                <!-----//end-copyright---->
                              </div>
                            
                            <div class="col-md-4 heighty">
                             
                              <div class="form-time-w3layouts">
                                  <div class="input-group Traveller">
                                    <span class="input-group-btn">
                                      <button id="down1" class="btn btn-default" onclick="down1('0')"><span class="glyphicon glyphicon-minus"></span></button>
                                    </span>
                                    <input type="text" id="myNumber1" name="traveller" class="form-control number-control input-number home-button" value="1 Travellers">
                                    <span class="input-group-btn">
                                      <button id="up1" class="btn btn-default number-control input-number" onclick="up1('4')">
                                        <span class="glyphicon glyphicon-plus"></span>
                                      </button>
                                  </span>
                              </div>
                          </div>
                           <p class="agelimit">age (15-50 only)</p> 
                       </div>
                         </form>   
                          <div class="col-md-4 checkavailabel heighty">
                      <input type="submit" class="btn btn-danger" id="checkAvailability" value="Check Availability">
                      </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default closebuttom" data-dismiss="modal">Close</button>
                                              </div>
      
                           </div>

                       
                         </div>
   </div>
  </div>
 </div>
 @include('layouts.frontend.main')
                   