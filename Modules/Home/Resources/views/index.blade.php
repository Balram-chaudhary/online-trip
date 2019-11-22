@include('layouts.frontend.menu.indexmenu')
@section('content')

<!-- about --> 
<div class="w3ls-section w3-about" id="Services">
	<div class="container"> 
		<div class="clearfix"></div>
		<div class="agileinfo-about-grid text-center">	
			
            <div class="col-md-4 col-xs-4 w3ls-about-grid serve1">
				<!-- <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> -->
				<!-- <h6>service1</h6> -->
                <h5 class="serve1">Save up to 50% on hotel booking</h5>
				<!-- <p>Itaque earum rerum hic tenetur asapi ente delectus 
				reiciendis maiores alias sodales vitaePellentesque accum</p>  -->
                <img src="{{url('triporbitz/public/frontend/images/services/hotel.png')}}" alt="Image Here">
			</div>
			

            <div class="col-md-4 col-xs-4 w3ls-about-grid about-2 serve2">
				<!-- <span class="glyphicon glyphicon-user" aria-hidden="true"></span> -->
				<h5 class="serve">Wel-come</h5>
                <br>
                <h5 class="serve">To</h5>
                <br>
                <h5 class="serve">TripOrbitz</h5>
				<!-- <p>Itaque earum rerum hic tenetur asapi ente delectus 
				reiciendis maiores alias sodales vitaePellentesque accum</p>  -->
			</div>
			
            <div class="col-md-4 col-xs-4 w3ls-about-grid serve3">
				<!-- <span class="fa fa-cogs" aria-hidden="true"></span> -->
				<h5 class="serve3">Enjoy your new Flight experience on cheap price</h5>
				<!-- <p>Itaque earum rerum hic tenetur asapi ente delectus 
				reiciendis maiores alias sodales vitaePellentesque accum</p>  -->
                 <img src="{{url('triporbitz/public/frontend/images/services/flight.png')}}"  alt="Image Here">
			</div>
			
            <div class="clearfix"></div>
		</div>
	</div>	
</div>	
<!-- //about -->
<!-- travel -->
<div class="travel">
	<div class="container">
		<h4>TripOrbitz</h4>
		<h3>Better to see something once than hear about it a thousand times</h3>
		<p>watch our video here</p>
		<div class="text-center">
			<a class="#" data-toggle="modal" data-target="#myModal1">
				<span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>
			</a>
		</div>
	</div>
</div>


<!-- popular offers -->
<div class="container" id="popular">
<div class="row ">
<div class="col-sm-offset-1 col-md-offset-1 col-lg-offset-1  col-sm-5 col-md-5 col-lg-5 sidel">
	<div class="sidelcontained">
		<div class="topm">
	<h2 class="placeDetail">TripOrbitZ Specials</h2>
	 <div class="grid-container">
    <div class="bordergrid">
	<div class="grid-item"> <a href="#">The Nepal is best Religious Sites1 </a></div>
     <div class="grid-item"><a href="#">The Nepal is best Religious Sites2 </a></div>
     </div>
    <div class="bordergrid">
     <div class="grid-item"><a href="#">The Nepal is best Religious Sites3  </a></div>
    <div class="grid-item"><a href="#">The Nepal is best Religious Sites4 </a></div>
    </div>
     
     <div class="bordergrid">
    <div class="grid-item"> <a href="#">The Nepal is best Religious Sites5 </a></div>
     <div class="grid-item"><a href="#">The Nepal is best Religious Sites6  </a></div>
     </div>
     
      <div class="bordergrid">
     <div class="grid-item"><a href="#">The Nepal is best Religious Sites7 </a></div>
    <div class="grid-item"><a href="#">The Nepal is best Religious Sites8 </a></div>
 </div>

</div>
</div>

<div class="topm">
 <h2 class="placeDetail">Religious Sites In Nepal</h2>
 <div class="grid-container">
   <div class="bordergrid">
    @if(sizeof($religious)>0)
    @foreach($religious as $r)
    <div class="grid-item"> <a href="#">{{$r->aname}}</a></div>
    @endforeach
    @endif
    </div>
  </div>
</div>
<div class="topm">
<h2 class="placeDetail">Top Trekking Destinations In Nepal</h2>
<div class="grid-container">
	<div class="bordergrid">
         @if(sizeof($trekking)>0)
         @foreach($trekking as $t)
     <div class="grid-item"><a href="#">{{$t->aname}}</a></div>
         @endforeach
         @endif
   </div>
 </div>
</div>
<div class="topm">
<h2 class="placeDetail">Domestic Flights In Nepal</h2>
	 <div class="grid-container">
	<div class="bordergrid">
        @if(sizeof($domesticflights)>0)
         @foreach($domesticflights as $f)
     <div class="grid-item"><a href="#">{{$f->ar_name}}</a></div>
         @endforeach
        @endif
    </div>

</div>
</div>

</div>
</div>


<div class="col-sm-offset-0 col-md-offset-0 col-lg-offset-0 col-sm-5 col-md-5 col-lg-5 sidel">

<div class="sidelcontained">
	<div class="topm">
			<h2 class="placeDetail">Popular Cities In Nepal</h2>
<div class="grid-container">
	<div class="bordergrid">
         @if(sizeof($cities)>0)
         @foreach($cities as $c)
        <div class="grid-item"> <a href="#">{{$c->city}}</a></div>
         @endforeach
         @endif
     </div>
</div>
</div>
<div class="topm">
<h2 class="placeDetail">Top Jungle Safari In Nepal</h2>
	 <div class="grid-container">
	<div class="bordergrid">
       @if(sizeof($junglesafary)>0)
       @foreach($junglesafary as $j)
       <div class="grid-item"> <a href="#">{{$j->aname}}</a></div>
       @endforeach
       @endif
     </div>
</div>
</div>

<div class="topm">
<h2 class="placeDetail">Popular Activities In Nepal</h2>
	 <div class="grid-container">
	<div class="bordergrid">
        @if(sizeof($activities)>0)
        @foreach($activities as $a)
    <div class="grid-item"><a href="#">{{$a->aname}}</a></div>
        @endforeach
        @endif
    </div>  
</div>
</div>

<div class="topm">
<h2 class="placeDetail">Mountain Flights In Nepal</h2>
	 <div class="grid-container">
	<div class="bordergrid">
        @if(sizeof($mountainflights)>0)
       @foreach($mountainflights as $m)
    <div class="grid-item"> <a href="#">{{$m->ar_name}}</a></div>
     @endforeach
       @endif
     </div>
</div>
</div>

</div>
</div>



</div>
</div>
<!-- end popular offers -->
@include('layouts.frontend.main')
