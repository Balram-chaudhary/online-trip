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
              <a href="{{route('roomtype.list')}}" class="btn btn-success addBtnRight">Room Type List</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="" class="form-horizontal formpadding" method="POST" enctype="multipart/form-data" file="true">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
             <input type="hidden" name="roomtype_id" value="{{$roomtype->id}}">
             <input type="hidden" name="old_roomtype_image" value="{{$roomtype->rimage}}">
              <div class="box-body">
                <div class="form-group">
                   <label for="rtype" class="col-sm-2 control-label">Hotel Name</label>
                    <div class="col-sm-10">
                  <select name="hotels" id="hotels" required="required" class="form-control">
                   @foreach($hotels as $key => $hotel)
                   <option value="{{$key}}" {{($key==$roomtype->hotel_id)?'selected':''}}>{{$hotel}}</option>
                   @endforeach
                  </select>
                 </div>
                </div>
                <div class="form-group">
                   <label for="rtype" class="col-sm-2 control-label">Room type</label>
                  <div class="col-sm-10">
	                  <select name="rtype" id="rtype" required="required">
          					  <option value="s"  @if($roomtype->rtype=='s') selected='selected' @endif>Single</option>
          					  <option value="d"  @if($roomtype->rtype=='d') selected='selected' @endif>Double</option>
          					  <option value="t"  @if($roomtype->rtype=='t') selected='selected' @endif>Triple</option>
          					  <option value="qd" @if($roomtype->rtype=='qd') selected='selected' @endif>Quad</option>
          					  <option value="q"  @if($roomtype->rtype=='q') selected='selected' @endif>Queen</option>
          					  <option value="k"  @if($roomtype->rtype=='k') selected='selected' @endif>King</option>
          					  <option value="tw" @if($roomtype->rtype=='tw') selected='selected' @endif>Twin</option>
          					  <option value="dd" @if($roomtype->rtype=='dd') selected='selected' @endif>Double Double</option>
          					  <option value="st" @if($roomtype->rtype=='st') selected='selected' @endif>Studio</option>
        			    </select>
                 </div>
                </div>

                <div class="form-group">
                <label for="temp_address" class="col-sm-2 control-label"></label>
                 <div class="row">
                 @foreach($images as $image)                
               <div class="col-lg-1 col-md-1 col-sm-1">
                 <a href="{{url('triporbitz/public/images/'.$image)}}"class="portfolio-box">
                  <img src="{{url('triporbitz/public/images/'.$image)}}"class="img-responsive" alt="images" width="100px" height="100px">
                  <div class="portfolio-box-caption">
                    <div class="portfolio-box-caption-content">
                    <span class="glyphicon glyphicon-zoom-in" style="font-size: 20px"></span>
                    </div>
                  </div>
                 </a>
               </div>
               @endforeach
               </div> 
              </div>
                <div class="form-group">
                    <label for="rimage" class="col-sm-2 control-label">Hotel Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control"  name="images" id="images"  value="{{old('images')}}">
                       <span class="help-block errortext">{{$errors->first('images')}}</span>
                    </div>
                  </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Number Of Rooms</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="nrooms" id="nrooms" placeholder="Number of rooms" value="{{$roomtype->nrooms}}" required="required">
                     <span class="help-block errortext">{{$errors->first('nrooms')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Number Of Adults</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="nadults" id="nadults" placeholder="Number of Adults" value="{{$roomtype->nadults}}" required="required">
                     <span class="help-block errortext">{{$errors->first('nadults')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="price" id="price" placeholder="Enter price" value="{{$roomtype->price}}" required="required">
                     <span class="help-block errortext">{{$errors->first('price')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Number Of Childrens</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="nchildrens" id="nchildrens" placeholder="Number of Childrens" value="{{$roomtype->nchildrens}}" required="required">
                     <span class="help-block errortext">{{$errors->first('nchildrens')}}</span>
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

