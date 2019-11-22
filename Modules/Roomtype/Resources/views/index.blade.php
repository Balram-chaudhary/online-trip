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
              <div class="box-body">
                 <div class="form-group">
                   <label for="rtype" class="col-sm-2 control-label">Hotel Name</label>
                    <div class="col-sm-10">
                  <select name="hotels" id="hotels" required="required" class="form-control">
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
                      <option value="s">Single</option>
                      <option value="d">Double</option>
                      <option value="t">Triple</option>
                      <option value="qd">Quad</option>
                      <option value="q">Queen</option>
                      <option value="k">King</option>
                      <option value="tw">Twin</option>
                      <option value="dd">Double Double</option>
                      <option value="st">Studio</option>
                 </select>
                 </div>
                </div>
                 <div class="form-group">
                    <label for="himage" class="col-sm-2 control-label">Hotel Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control"  name="images" id="images"  required="required" value="{{old('images')}}">
                       <span class="help-block errortext">{{$errors->first('images')}}</span>
                    </div>
                  </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Number Of Rooms</label>
                  <div class="col-sm-10">
                    <input type="number"  name="nrooms" id="nrooms" placeholder="Number of rooms" value="{{old('nrooms')}}" required="required">
                     <span class="help-block errortext">{{$errors->first('nrooms')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Number Of Adults</label>
                  <div class="col-sm-10">
                    <input type="number"  name="nadults" id="nadults" placeholder="Number of Adults" value="{{old('nadults')}}" required="required">
                     <span class="help-block errortext">{{$errors->first('nadults')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="number"  name="price" id="price" placeholder="Enter price" value="{{old('price')}}" required="required">
                     <span class="help-block errortext">{{$errors->first('price')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Number Of Childrens</label>
                  <div class="col-sm-10">
                    <input type="number"  name="nchildrens" id="nchildrens" placeholder="Number of Childrens" value="{{old('nchildrens')}}" required="required">
                     <span class="help-block errortext">{{$errors->first('nchildrens')}}</span>
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
<script>
      $(document).ready(function(){
          $('#hotels').select2();
       });
    </script>
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
