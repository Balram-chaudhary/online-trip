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
              <a href="{{route('price.list')}}" class="btn btn-success addBtnRight">Room Type Price List</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="" class="form-horizontal formpadding" method="POST" enctype="multipart/form-data" file="true">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <div class="box-body">
                 <div class="form-group">
                   <label for="rtype" class="col-sm-2 control-label">Hotel Name</label>
                    <div class="col-sm-10">
                  <select name="hotels" id="hotels" required="required" class="form-control" onchange="sort_data_roomtype_select(this.value)">
                   <option selected="selected" disabled>Select Hotel Name</option>
                   @foreach($hotels as $key => $hotel)
                   <option value="{{$key}}">{{$hotel}}</option>
                   @endforeach
                  </select>
                 </div>
                </div>
                <div class="form-group">
                   <label for="rtype" class="col-sm-2 control-label">Room type</label>
                    <div class="col-sm-10">
                  <select name="rtype" id="rtype" required="required">
                      <option selected="selected" disabled>Select Room Type</option>
                                    
                 </select>
                 </div>
                </div>
                 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="number"  name="price" id="price" placeholder="price" value="{{old('price')}}" required="required">
                     <span class="help-block errortext">{{$errors->first('price')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Vat</label>
                  <div class="col-sm-10">
                    <input type="number"  name="vat" id="vat" placeholder="Vat" value="{{old('vat')}}" required="required">
                     <span class="help-block errortext">{{$errors->first('nadults')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Service Tax</label>
                  <div class="col-sm-10">
                    <input type="number"  name="servicetax" id="servicetax" placeholder="Service Tax" value="{{old('servicetax')}}" required="required">
                     <span class="help-block errortext">{{$errors->first('servicetax')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Hotel Charge</label>
                  <div class="col-sm-10">
                    <input type="number"  name="hotelcharge" id="hotelcharge" placeholder="Hotel Charge" value="{{old('hotelcharge')}}" required="required">
                     <span class="help-block errortext">{{$errors->first('hotelcharge')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Discount</label>
                  <div class="col-sm-10">
                    <input type="number"  name="discount" id="discount" placeholder="Discount Charge" value="{{old('discount')}}" required="required">
                     <span class="help-block errortext">{{$errors->first('discount')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Travel Tax</label>
                  <div class="col-sm-10">
                    <input type="number"  name="traveltax" id="traveltax" placeholder="Travel Tax " value="{{old('traveltax')}}" required="required">
                     <span class="help-block errortext">{{$errors->first('traveltax')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&create" class="btn btn-success" value="submit&create">Submit & Create</button>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
    function sort_data_roomtype_select(select){
            $.ajax({
                    url: "/price/select/list",
                    data:{"type":select, "_token": "{{csrf_token()}}"},   
                    method: 'get'
                }).done(function(data){
            $("select[name='rtype'").html('');
            $("select[name='rtype'").html(data.options);
      });
  }
                
</script>

@stop    
