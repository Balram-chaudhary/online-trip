@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.admin.nav')
@include('layouts.backend.admin.sidebar')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>   
        <ol class="breadcrumb">
       {!!$breadcrumbs!!}
      </ol>
    </h4>
             @if(Session::get('success_msg'))

          <div class="alert alert-success">

          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

          {{ Session::get('success_msg') }}

          </div>

          @endif
          @if(Session::get('error_msg'))

          <div class="alert alert-success">

          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

          {{ Session::get('error_msg') }}

          </div>
          @endif
    </section>

      <section class="content">
      <div class="row">
    
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
        <div class="box-body" style="font-size:13px;">
         
         <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
           <div class="row" style="width:500px;">
           <div class="col-lg-12 col-md-12 col-sm-12 text-right">
            <div class="dataTables_length" id="example1_length">
              <div class="input-group">
                 <span class="input-group-addon" style="color: white; background-color:#069180;padding:9px;">Homestay and Hotel Search</span>
              <input type="text" autocomplete="off" id="search" name="search" class="form-control" placeholder="Enter Hotel Name,Area Name Or Contact Person" onkeyup="search_data(this.value)" style="width:320px;">
                  <meta name="csrf-token" content="{{ csrf_token() }}" />
                  </div>
              </div>
           </div>   
         </div>
       </div>
         <br>
           <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Hotel Name</th>
                  <th>Is Verified?</th> 
                  <th>Bank Name</th>
                  <th>Account No.</th>
                  <th>City Name</th>
                  <th>Contact Person</th>
                  <th>Email</th>
                  <th>Phone/Mobile</th>
                  <th> 
                    <select onchange="sort_data(this.value)" id="sorts" name="sort">
                      <meta name="csrf-token" content="{{ csrf_token() }}" />
                      <option  value="" disabled selected>---Select Hotel Type---</option>
                      <option  value="all">All Hotels</option>
                      <option  value="s">Homestay</option>
                      <option  value="h">Hotel</option> 
                   </select>
                   <br></th>
                  <th>Operation</th>
                </tr>
               </thead>
               <tbody id="homenhotel">
                <?php $i=1;?>
                 @if(sizeof($homestays)>0)
                    @foreach($homestays as $h)
                     @if($h->del_flag=='0')
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$h->hname}}</td>
                        <td>@if($h->is_verified=='y')Yes @else No @endif</td>
                        <td>{{$h->bname}}</td>
                        <td>{{$h->anumber}}</td>
                        <td>{{$h->city}}</td>
                        <td>{{$h->cperson}}</td>
                        <td>{{$h->email}}</td>
                        <td>{{$h->phone}}</td>
                        <td>@if($h->type=='s')Homestay @else Hotel @endif</td>
                        <td>
                        	<a href="{{route('homestay.edit',[$h->id])}}" style="color:#069180;font-size:20px" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="jquery-postback"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>     
                       &nbsp; 
                    <a href="{{route('homestay.remove',[$h->id])}}" style="color:#a83521;font-size:20px" data-toggle="tooltip" data-placement="top" title="Delete" data-method="delete" class="jquery-postback" onclick="if (!confirm('Are you sure to delete?')){ return false; }" ><i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                        </td>
                      </tr>
                     @endif
                    @endforeach
                @else
                <tr>
                  <td colspan="11" align="center">-- No Record Found !! ---</td>
                </tr>
                 @endif
               </tbody>
              </table>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix" id="paginated">
              {{ $homestays->links() }}
          </div>
        </div>
      </div>
  </div>
</div>
@stop
@section('footer_resources')
<script type="text/javascript">
    function search_data(search) {
      $('#paginated').css("display","none");
      var url="{{route('homestay.search')}}";
      var search=search; 
          $.ajax({
          url: url,
          data:{"srcText":search, "_token": "{{ csrf_token() }}"},   
          method: 'get'
      }).done(function(response){

          $('#homenhotel').html(response); // put the returning html in the 'results' div
      });
  }
</script>
<script type="text/javascript">
    var url="{{route('homestay.sort')}}";
    function sort_data(sort) {
                $.ajax({
                    url: url,
                    data:{"type":sort, "_token": "{{csrf_token()}}"},   
                    method: 'POST'
                }).done(function(response){

              
           $('#homenhotel').html(response); // put the returning html in the 'results' div
      });
  }
                    
   
</script>

@stop