@include('layouts.frontend.menu.othermenu')
@section('content')
	<!-- banner-grids -->
<!-- banner-grids -->
		<div class="banner-grids">
			<!-- container -->
			<div class="container">
				<div class="banner-grid-info">
					<h3>JungleSafary</h3>
				</div>
				
				<div class="top-grids">
					 @if(sizeof($junglesafary)>0)
                     @foreach($junglesafary as $j)
                     @if($j->del_flag=='0')
                     <div class="col-md-4">
					<div class="top-grid">
						<a href="{{route('junglesafary.detail',$j->id)}}"><img  height="177px" width="210px" src="{{url('triporbitz/public/images/'.$j->image)}}" alt="" /></a>
						<div class="top-grid-info">
							<a href="{{route('junglesafary.detail',$j->id)}}">{{$j->aname}}</a>
							<p>{{$j->description}}</p>
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