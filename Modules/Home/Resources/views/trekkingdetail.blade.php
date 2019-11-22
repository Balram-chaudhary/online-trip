@include('layouts.frontend.menu.othermenu')
@section('content')
<!-- end of nav bar  -->
  <div class="container-fluid">
    <div class="jumbotron">
      <div class="container polaroid-box">
        <div class="row">
          <div class="col-md-9 col-sm-8 col-xs-12">
            <h3>{{$trekking->aname}}</h3>
             <h4>{{$trekking->area}},{{$trekking->city}},{{$trekking->country}}</h4>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="container">
              <div class="room-selector">
                <h4 class="">Rs&nbsp;{{$trekking->price}}</h4><br>
               <a href="#small-dialog" class="w3_agileits_sign_up2 popup-with-zoom-anim ab scroll"> <input type="button" class="btn btn-primary" value="Book Now"></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-8">
            <ul class="nav nav-tabs" id="myTabs">
              <li class="active"><a data-toggle="tab" href="#photos">Photos</a></li>
              <li><a data-toggle="tab" href="#description">Description</a></li>
              <li><a data-toggle="tab" href="#map">Map</a></li>
              <li><a data-toggle="tab" href="#policies">Policies</a></li>
            </ul>
            <div class="tab-content" style="width:100%;height:500px;">
              <div id="photos" class="tab-pane fade in active">
                <div class="row">
                  <div class="col-md-3">
                    <a href="{{url('triporbitz/public/images/'.$trekking->image)}}" class="example-image-link" data-lightbox="Vacation">
                      <img class="example-image" src="{{url('triporbitz/public/images/'.$trekking->image)}}">
                    </a>
                  </div>
                </div>
              </div>
              <div id="description" class="tab-pane fade">
                <h3>Description</h3>
                <p>{{$trekking->description}}</p>
              </div>
              <div id="map" class="tab-pane fade">
                <div class="container">
                  <div class="w3ls-title">
                    <h3 class="title">get in touch</h3>
                  </div>
                  <div class="w3ls_map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48306.05339877067!2d-74.245183970742!3d40.825144655510556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2555646a723a1%3A0x449f3366d017b214!2sMontclair%2C+NJ%2C+USA!5e0!3m2!1sen!2sin!4v1465991700675"
                    style="border:0; width: 100%; height: 400px;"></iframe>
                  </div>
                </div>
              </div>
              <div id="policies" class="tab-pane fade">
                <h3>Policies</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
              </div>
            </div>
          </div>
        <div col-md-4 col-sm-4 col-xs-4>
          <div style="margin-top:30px;">
          <h2>Duration:</h2>{{$trekking->hour}}Hour&nbsp;{{$trekking->minute}}Minute<br>
          <h2>Highlights</h2>
          <p>{{$trekking->add_info}}</p><br>
          <h2>Meeting Point</h2>
          <p>{{$trekking->area}},{{$trekking->city}}</p>
          <h2>Meeting Time:</h2>
            <p> 8:00Am</p>  
          </div>
          
        </div>
      </div>
    </div>
  </div>
{{-- so more details --}}
  <div id="section4" class="container-fluid " style="padding-top:70px;padding-bottom:70px">
 <div class="simple-card" style="margin-top: -90px;">
  <div class="card-body">
    <h2>See more activities</h2>
    <br>
    <div class="packages_grid1">
      @if(sizeof($trekkings)>0)
       @foreach($trekkings as $t)
       @if($t->del_flag=='0')
      <div class="col-md-3 package1">
        <img height="250px" width="400px" src="{{url('triporbitz/public/images/'.$t->image)}}" alt="{{$t->image}}" />
        <div class="centered">
          <h4>{{$t->aname}}</h4>
          <h5>RS&nbsp;{{$t->price}}</h5>
          <a href="{{route('trekking.detail',$t->id)}}">Book Now</a>
        </div>
      </div>
      @endif
      @endforeach
      @else
      <h2>No Travel Himalayan Specials Found</h2>
     @endif
<div class="clearfix"></div>
    </div>
   </div>
  </div>
</div>
 @include('layouts.frontend.main')
 