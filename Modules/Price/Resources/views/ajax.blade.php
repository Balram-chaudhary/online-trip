<option>--- Select State ---</option>
@if(!empty($roomtypes))
  @foreach($roomtypes as $key => $roomtype)
    <option value="{{ $key }}">@if($roomtype=='s')Single @elseif($roomtype=='d')Double @elseif($roomtype=='t')Triple @elseif($roomtype=='qd')Quad @elseif($roomtype=='q')Queen @elseif($roomtype=='k')King @elseif($roomtype=='tw')Twin @elseif($roomtype=='dd')Double Double @else Studio @endif</option>
  @endforeach
@endif