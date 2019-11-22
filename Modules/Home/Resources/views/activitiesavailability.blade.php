@include('layouts.frontend.menu.commonmenu')
@section('content')
<div class="container-fluid">
        <div class="row" id="availableactivities">
                        <div class="col-md-9 activitiesconfir">
                         <div class="container-fluid" >
                          <div class="row simple-cardc">
                            
                            <div class="col-sm-12 infromationforus">
                           <div class="col-md-5 package1">
               <?php $image=explode(',',$activity->image);?>
          <img src="{{asset('triporbitz/public/images/'.$image[0])}}" alt="{{$image[0]}}" />
          </div>
              <div class="col-sm-7 discriptionactivity">
              <h4>{{$activity->aname}}</h4>
              <small>about us If your spaces turn into strange symbols on the web browser.about us If your spaces turn into strange symbols on the web browser.about us If your spaces turn into strange symbols on the web browser.about us If your spaces turn into strange symbols on the web browser.about us If your spaces turn into strange symbols on the web browser.about us If your spaces turn into strange symbols on the web browser.about us If your spaces turn into strange symbols on the web browser.about us If your spaces turn into strange symbols on the web browser.about us If your spaces turn into strange symbols on the web browser.</small>   <br>
                             <p>{{$activity->pickup_time}}</p>
                           </div>
                           </div>
                           <div class="col-sm-3 activitybooked">
                             <!-- <button type="button" class="btn btn-default pull-right" id="bookNowbtn">Book Now</button> -->

                  <a href="{{route('activities.review')}}"type="button" class="btn btn-default pull-right" id="bookNowbtn">Book Now</a>
                           </div>
                         
                         </div>
                       </div>           
                     </div>



                 <div class="col-md-3 simple-card3">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Fare Details</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Adult
                        </td>
                        <td>
                          {{$passanger}} People
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Service Cost
                        </td>
                        <td>
                         Rs.&nbsp; {{$activity->price}}
                        </td>
                      </tr>
                      <tr>
                        <td>Total</td>
                        <td>Rs.<?php echo $passanger * $activity->price ;?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
    </div>
</div>
 @include('layouts.frontend.main')

               
