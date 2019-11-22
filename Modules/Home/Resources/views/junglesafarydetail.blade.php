@include('layouts.frontend.menu.othermenu')
@section('content')
<!-- end of nav bar  -->
  <div class="container-fluid">
    <div class="jumbotron">
      <div class="container polaroid-box">
        <div class="row">
          <div class="col-md-9 col-sm-8 col-xs-12">
            <h3>{{$junglesafary->aname}}</h3>
             <h4>{{$junglesafary->area}},{{$junglesafary->city}},{{$junglesafary->country}}</h4>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="container">
              <div class="room-selector">
                <h4 class="">Rs&nbsp;{{$junglesafary->price}}</h4><br>
                <input type="button" class="btn btn-primary" value="Book Now">
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
                    <a href="{{url('triporbitz/public/images/'.$junglesafary->image)}}" class="example-image-link" data-lightbox="Vacation">
                      <img class="example-image" src="{{url('triporbitz/public/images/'.$junglesafary->image)}}">
                    </a>
                  </div>
                </div>
              </div>
              <div id="description" class="tab-pane fade">
                <h3>Description</h3>
                <p>{{$junglesafary->description}}</p>
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
          <h2>Duration:</h2>{{$junglesafary->hour}}Hour&nbsp;{{$junglesafary->minute}}Minute<br>
          <h2>Highlights</h2>
          <p>{{$junglesafary->add_info}}</p><br>
          <h2>Meeting Point</h2>
          <p>{{$junglesafary->area}},{{$junglesafary->city}}</p>
          <h2>Meeting Time:</h2>
            <p> 8:00Am</p>  
          </div>
          
        </div>
      </div>
    </div>
  </div>
 @include('layouts.frontend.main')
 