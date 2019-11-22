@include('layouts.frontend.menu.commonmenu')
@section('content')
	<!-- banner-grids -->
<!-- banner-grids -->
		<div class="banner-grids">
			<!-- container -->
			<div class="container">
				<div class="banner-grid-info">
					<h3>Activities</h3>
				</div>
				
				<div class="top-grids">
					 @if(sizeof($activities)>0)
                     @foreach($activities as $a)
                     @if($a->del_flag=='0')
                     <div class="col-md-4">
					<div class="top-grid">
<a href="{{route('activities.detail',$a->id)}}">
               <?php $aimages=explode(',',$a->image); ?>
<img  height="177px" width="210px" src="{{url('triporbitz/public/images/'.$aimages['0'])}}" alt="" /></a>
						<div class="top-grid-info">
							<a href="{{route('activities.detail',$a->id)}}">{{$a->aname}}</a>
							<p>{{$a->description}}</p>
						</div>
					</div>
				</div>
					@endif
	                @endforeach
	                @else
                  <h2>-- Travel Himalayan Activities Not Found ---</h2>
                 @endif
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //container -->
		</div>
		<!-- //banner-grids -->
	@include('layouts.frontend.main')