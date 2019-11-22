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
              <a href="{{route('price.create')}}" class="btn btn-success addBtnRight"><i class="glyphicon glyphicon-plus" title="Add New Room Type"></i>Create Price</a>
            </div>

            <!-- /.box-header -->
        <div class="box-body">
         
         <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
           <div class="row" style="width:500px;">
           <div class="col-lg-12 col-md-12 col-sm-12 text-right">
            <div class="dataTables_length" id="example1_length">
              <div class="input-group">
                 <span class="input-group-addon" style="color: white; background-color:#069180;padding:9px;">Price Search</span>
              <input type="text" autocomplete="off" id="search" name="search" class="form-control" placeholder="Enter Hotel Name,Room Type, or Price " onkeyup="search_data(this.value)" style="width:320px;">
                  <meta name="csrf-token" content="{{ csrf_token() }}" />
                  </div>
              </div>
           </div>   
         </div>
       </div>
         <br>
              <table class="table table-stripped" id="myTable">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Hotel Name</th>
                  <th>Room Type</th>
                  <th>Price</th>
                  <th>Travel Tax</th>
                  <th>Operation</th>
                </tr>
               </thead>
               <tbody id="price">
                <?php $i=1;?>
                 @if(sizeof($price)>0)
                    @foreach($price as $p)
                     @if($p->del_flag=='0')
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$p->hname}}</td>
                        <td>@if($p->rtype=='s')Single @elseif($p->rtype=='d')Double @elseif($p->rtype=='t')Triple @elseif($p->rtype=='qd')Quard @elseif($p->rtype=='q')Queen @elseif($p->rtype=='k')King @elseif($p->rtype=='tw')Twin @elseif($p->rtype=='dd')Double Double @else Studio @endif</td>
                        <td>{{$p->price}}</td>
                        <td>{{$p->traveltax}}</td>
                        <td>
                        	<a href="{{route('price.edit',[$p->id])}}" style="color:#069180;font-size:20px" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="jquery-postback"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>     
                       &nbsp; 
                    <a href="{{route('price.remove',[$p->id])}}" style="color:#a83521;font-size:20px" data-toggle="tooltip" data-placement="top" title="Delete" data-method="delete" class="jquery-postback" onclick="if (!confirm('Are you sure to delete?')){ return false; }" ><i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                        </td>
                      </tr>
                      @endif
                      @endforeach

                    
                @else
                <tr>
                  <td colspan="6" align="center">-- No Record Found !! ---</td>
                </tr>
                 @endif
               </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix" id="paginated">
              {{ $price->links() }}
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
      var url="{{route('price.search')}}";
      var search=search; 
          $.ajax({
          url: url,
          data:{"srcText":search, "_token": "{{ csrf_token() }}"},   
          method: 'get'
      }).done(function(response){

          $('#price').html(response); // put the returning html in the 'results' div
      });
  }
</script>
@stop