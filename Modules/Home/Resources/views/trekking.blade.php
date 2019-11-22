@include('layouts.frontend.menu.othermenu')
@section('content')
	<!-- banner-grids -->
<!-- banner-grids -->
		<div class="banner-grids">
			<!-- container -->
			<div class="container">
				<div class="banner-grid-info">
					<h3>Trekking</h3>
				</div>
				
				<div class="top-grids">
					 @if(sizeof($trekking)>0)
                     @foreach($trekking as $t)
                     @if($t->del_flag=='0')
                     <div class="col-md-4">
					<div class="top-grid">
						<a href="{{route('trekking.detail',$t->id)}}"><img  height="177px" width="210px" src="{{url('triporbitz/public/images/'.$t->image)}}" alt="" /></a>
						<div class="top-grid-info">
							<a href="{{route('trekking.detail',$t->id)}}">{{$t->aname}}</a>
							<p>{{$t->description}}</p>
						</div>
					</div>
				</div>
					@endif
	                @endforeach
	                @else
                  <h2>-- No Travel Himalayan Specials Found ---</h2>
                 @endif
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //container -->
		</div>
		<!-- //banner-grids -->
	@include('layouts.frontend.main')