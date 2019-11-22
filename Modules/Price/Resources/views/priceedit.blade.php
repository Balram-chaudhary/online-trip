@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.admin.nav')
@include('layouts.backend.admin.sidebar')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>   
        <ol class="breadcrumb">
       {!!$breadcrumbs!!}
      </ol>
       {{-- <a href="javascript:history.back()" class="btn btn-primary breadCrumbRightBackBtn">Back</a> --}}
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
    <!-- Main content -->
       <section class="content">
        <div class="row">
        <!-- left column -->
       <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
              <a href="{{route('price.list')}}" class="btn btn-success addBtnRight">Price  List</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="" class="form-horizontal formpadding" method="POST" enctype="multipart/form-data" file="true">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
             <input type="hidden" name="price_id" value="{{$price->id}}">
              <div class="box-body">
                <div class="form-group">
                   <label for="rtype" class="col-sm-2 control-label">Hotel Name</label>
                    <div class="col-sm-10">
                  <select name="hotels" id="hotels" required="required" class="form-control">
                   @foreach($hotels as $key => $hotel)
                   <option value="{{$key}}" {{($key==$price->hotel_id)?'selected':''}}>{{$hotel}}</option>
                   @endforeach
                  </select>
                 </div>
                </div>
                <div class="form-group">
                   <label for="rtype" class="col-sm-2 control-label">Room type</label>
                  <div class="col-sm-10">
	                  <select name="rtype" id="rtype" required="required">
                      @foreach($roomtype as $key =>$room)
          					  <option value="{{$key}}"  {{($key==$price->rtype_id)?'selected':''}}>@if($room=='s')Single @elseif($room=='d')Double @elseif($room=='t')Triple @elseif($room=='qd')Quad @elseif($room=='q')Queen @elsif($room=='k')King @elseif($room=='tw')Twin @elseif($room=='dd')Double Double @else Studio @endif</option>
          					 @endforeach
          					 
        			    </select>
                 </div>
                </div>

                  <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="number"  name="price" id="price" placeholder="price" value="{{$price->price}}" required="required">
                     <span class="help-block errortext">{{$errors->first('price')}}</span>
                  </div>
                </div>
                   <label for="title" class="col-sm-2 control-label">Vat</label>
                  <div class="col-sm-10">
                    <input type="number"  name="vat" id="vat" placeholder="Vat" value="{{$price->vat}}" required="required">
                     <span class="help-block errortext">{{$errors->first('vat')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Service Tax</label>
                  <div class="col-sm-10">
                    <input type="number"  name="servicetax" id="servicetax" placeholder="Service Tax" value="{{$price->service_tax}}" required="required">
                     <span class="help-block errortext">{{$errors->first('servicetax')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Hotel Charge</label>
                  <div class="col-sm-10">
                    <input type="number"  name="hotelcharge" id="hotelcharge" placeholder="Hotel Charge" value="{{$price->hotelcharge}}" required="required">
                     <span class="help-block errortext">{{$errors->first('hotelcharge')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Discount</label>
                  <div class="col-sm-10">
                    <input type="number"  name="discount" id="discount" placeholder="Discount Charge" value="{{$price->discount}}" required="required">
                     <span class="help-block errortext">{{$errors->first('discount')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Travel Tax</label>
                  <div class="col-sm-10">
                    <input type="number"  name="traveltax" id="traveltax" placeholder="Travel Tax " value="{{$price->traveltax}}" required="required">
                     <span class="help-block errortext">{{$errors->first('traveltax')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&update" class="btn btn-success" value="submit&create">Submit & Update</button>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- /.row -->
    </section>
  </div>
@stop
@section('footer_resources')
<script>
      $(document).ready(function(){
          $('#hotels').select2();
       });
    </script>
@stop    

