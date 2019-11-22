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
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="" class="form-horizontal formpadding" id="homestay" method="POST" enctype="multipart/form-data" file="true" name="homestay">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <input type="hidden" name="activities_id" value="{{$activities->id}}">
              <input type="hidden" name="old_activities_image" value="{{$activities->image}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Activities Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="aname" id="aname" placeholder="Activities Name" value="{{$activities->aname}}" required="required" maxlength="30">
                      <span class="help-block errortext">{{$errors->first('aname')}}</span>
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
                    <label for="himage" class="col-sm-2 control-label">Activities Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont onchange="validateImage()"  name="images[]" id="images"  multiple="multiple">
                       <span class="help-block errortext">{{$errors->first('images.*')}}</span>
                    </div>
                  </div>
               
                <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Activities Type</label>
                    <div class="col-sm-10">
              <select name="type" id="type" required="required">
                <option value="p"  @if($activities->type=='p') selected='selected' @endif>Paragliding</option>
                <option value="t"  @if($activities->type=='t') selected='selected' @endif>Trekking</option>
                <option value="r"  @if($activities->type=='r') selected='selected' @endif>Rafting</option>
                <option value="re" @if($activities->type=='re') selected='selected' @endif>Religious</option>
                <option value="h"  @if($activities->type=='h') selected='selected' @endif>Historical</option>
                <option value="s"  @if($activities->type=='s') selected='selected' @endif>Scuba Diving</option>
                <option value="b"  @if($activities->type=='b') selected='selected' @endif>Bungy</option>
                <option value="j"  @if($activities->type=='j') selected='selected' @endif>Jungle Safary</option>
                <option value="c"  @if($activities->type=='c') selected='selected' @endif>Popular Cities</option>
              </select>
            </div>
            </div>
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description" placeholder="Hotel Description" rows="10" cols="90" required="required" >{{$activities->description}}</textarea>
                  </div>
                    <span class="help-block errortext"></span>
                </div>
                  <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Additional Info</label>
                  <div class="col-sm-10">
                    <textarea name="add_info" class="form-control" id="add_info" placeholder="Additional Information" rows="10" cols="90" required="required" >{{$activities->add_info}}</textarea>
                  </div>
                    <span class="help-block errortext"></span>
                </div>
                  <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price" value="{{$activities->price}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('price')}}</span>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Area Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="area" id="area" placeholder="Area Name" value="{{$activities->area}}" required="required" maxlength="30">
                     <span class="help-block errortext">{{$errors->first('area')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">City Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="city" id="city" placeholder="City Name" value="{{$activities->city}}" required="required" maxlength="30">
                     <span class="help-block errortext">{{$errors->first('city')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Country Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="country" id="country" placeholder="Country Name" value="{{$activities->country}}" required="required" maxlength="30">
                      <span class="help-block errortext">{{$errors->first('country')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Number Of Adults</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="nadults" id="nadults" placeholder="Number Of Adults" value="{{$activities->nadults}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('nadults')}}</span>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Number Of Childrens</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="nchilds" id="nchilds" placeholder="Number Of Childs" value="{{$activities->nchilds}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('nchilds')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Pickup Time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="pickuptime" id="pickuptime" placeholder="pickuptime" value="{{$activities->pickup_time}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('pickuptime')}}</span>
                  </div>
                </div>
 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Hour</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="hour" id="hour" placeholder="Duration in Hour" value="{{$activities->hour}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('hour')}}</span>
                  </div>
                </div>  
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Minute</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="minute" id="minute" placeholder="Duration in minute" value="{{$activities->minute}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('minute')}}</span>
                  </div>
                </div>
                <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Is Popular</label>
                    <div class="col-sm-10">
                  <select name="ispopular" id="ispopular" required="required">
                    <option value="y" @if($activities->is_popular=='y') selected='selected' @endif>Yes</option>
                    <option value="n" @if($activities->is_popular=='n') selected='selected' @endif >No</option>
                  </select>
                 </div>
                </div>  
                            
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&edit" class="btn btn-success" onClick="return validate();" value="submit&create" id="submit">Submit & Create</button>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
        
        </div>
       
     
      </div>
      <!-- /.row -->
    </section>
  </div>
 
@stop
@section('footer_resources')
<script type="text/javascript">
    $(document).ready(function(){
        $('#images').change(function(){
               var fp = $("#images");
               var lg = fp[0].files.length; // get length
               var items = fp[0].files;
               var fileSize = 0;
           
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   fileSize = fileSize+items[i].size; // get file size
               }
               if(fileSize > 2000000) {
                    alert('File size must not be more than 2 MB');
                    $('#images').val('');
               }
               if(lg > 8){
                alert('images must not be more than 8');
                    $('#images').val('');
             }

           }
        });
    });
    </script>
 @stop