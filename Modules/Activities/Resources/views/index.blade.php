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
            <form  action="" class="form-horizontal formpadding" id="activities" method="POST" enctype="multipart/form-data" file="true" name="activities">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Activities Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="aname" id="aname" placeholder="Activities Name" value="{{old('aname')}}" required="required" maxlength="30">
                      <span class="help-block errortext">{{$errors->first('aname')}}</span>
                  </div>
                </div>
                <div class="form-group">
                    <label for="himage" class="col-sm-2 control-label">Activities Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont onchange="validateImage()"  name="images[]" id="images"   value="{{old('images.*')}}" multiple="multiple" required="required">
                       <span class="help-block errortext">{{$errors->first('images.*')}}</span>
                    </div>
                  </div>
               
                <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Activities Type</label>
                    <div class="col-sm-10">
                  <select name="type" id="type" required="required">
                    <option value="p">Paragliding</option>
                    <option value="t">Trekking</option>
                    <option value="r">Rafting</option>
                    <option value="re">Religious</option>
                    <option value="h">Historical</option>
                    <option value="s">Scuba Diving</option>
                    <option value="b">Bungy</option>
                    <option value="j">Jungle Safary</option>
                     <option value="c">Popular Cities</option>
                  </select>
                 </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description" placeholder="Hotel Description" rows="10" cols="90" required="required" >{{old('description')}}</textarea>
                  </div>
                    <span class="help-block errortext"></span>
                </div>
                  <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Additional Info</label>
                  <div class="col-sm-10">
                    <textarea name="add_info" class="form-control" id="add_info" placeholder="Additional Information" rows="10" cols="90" required="required" >{{old('add_info')}}</textarea>
                  </div>
                    <span class="help-block errortext"></span>
                </div>
                  <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price" value="{{old('price')}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('price')}}</span>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Area Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="area" id="area" placeholder="Area Name" value="{{old('area')}}" required="required" maxlength="30">
                     <span class="help-block errortext">{{$errors->first('area')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">City Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="city" id="city" placeholder="City Name" value="{{old('city')}}" required="required" maxlength="30">
                     <span class="help-block errortext">{{$errors->first('city')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Country Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="country" id="country" placeholder="Country Name" value="{{old('country')}}" required="required" maxlength="30">
                      <span class="help-block errortext">{{$errors->first('country')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Number Of Adults</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="nadults" id="nadults" placeholder="Number Of Adults" value="{{old('nadults')}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('nadults')}}</span>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Number Of Childrens</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="nchilds" id="nchilds" placeholder="Number Of Childs" value="{{old('nchilds')}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('nchilds')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Pickup Time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="pickuptime" id="pickuptime" placeholder="pickuptime" value="{{old('pickuptime')}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('pickuptime')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Hour</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="hour" id="hour" placeholder="Duration in Hour" value="{{old('hour')}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('hour')}}</span>
                  </div>
                </div>  
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Minute</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="minute" id="minute" placeholder="Duration in minute" value="{{old('minute')}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('minute')}}</span>
                  </div>
                </div>
               <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Is Popular</label>
                    <div class="col-sm-10">
                  <select name="ispopular" id="ispopular" required="required">
                    <option value="y">Yes</option>
                    <option value="n">No</option>
                  </select>
                 </div>
                </div>
                
                            
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&create" class="btn btn-success" onClick="return validate();" value="submit&create" id="submit">Submit & Create</button>
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