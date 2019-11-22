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
            <form  action="" class="form-horizontal formpadding" id="homestay" method="POST" enctype="multipart/form-data" file="true" name="buses">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Operator Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="oname" id="oname" placeholder="Operator Name" value="{{old('oname')}}" required="required" maxlength="30">
                      <span class="help-block errortext">{{$errors->first('oname')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Bus Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="bnumber" id="bnumber" placeholder="Bus Number" value="{{old('bnumber')}}" required="required" maxlength="30">
                      <span class="help-block errortext">{{$errors->first('bnumber')}}</span>
                  </div>
                </div>

          <div class="form-group" id="sheets">
             <label for="services" class="col-sm-2 control-label">Sheets</label>
             <div class="col-sm-10">
        
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A1">
                    <span class="custom-control-description">A1</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A2">
                    <span class="custom-control-description">A2</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A3">
                    <span class="custom-control-description">A3</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A4">
                    <span class="custom-control-description">A4</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A5">
                    <span class="custom-control-description">A5</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A6">
                    <span class="custom-control-description">A6</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A7">
                    <span class="custom-control-description">A7</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A8">
                    <span class="custom-control-description">A8</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A9">
                    <span class="custom-control-description">A9</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A10">
                    <span class="custom-control-description">A10</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A11">
                    <span class="custom-control-description">A11</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A12">
                    <span class="custom-control-description">A12</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A13">
                    <span class="custom-control-description">A13</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A14">
                    <span class="custom-control-description">A14</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A15">
                    <span class="custom-control-description">A15</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A16">
                    <span class="custom-control-description">A16</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A17">
                    <span class="custom-control-description">A17</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A18">
                    <span class="custom-control-description">A18</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A19">
                    <span class="custom-control-description">A19</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A20">
                    <span class="custom-control-description">A20</span><br>


                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B1">
                    <span class="custom-control-description">B1</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B2">
                    <span class="custom-control-description">B2</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B3">
                    <span class="custom-control-description">B3</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B4">
                    <span class="custom-control-description">B4</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B5">
                    <span class="custom-control-description">B5</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B6">
                    <span class="custom-control-description">B6</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B7">
                    <span class="custom-control-description">B7</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B8">
                    <span class="custom-control-description">B8</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B9">
                    <span class="custom-control-description">B9</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B10">
                    <span class="custom-control-description">B10</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B11">
                    <span class="custom-control-description">B11</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B12">
                    <span class="custom-control-description">B12</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B13">
                    <span class="custom-control-description">B13</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B14">
                    <span class="custom-control-description">B14</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B15">
                    <span class="custom-control-description">B15</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B16">
                    <span class="custom-control-description">B16</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B17">
                    <span class="custom-control-description">B17</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B18">
                    <span class="custom-control-description">B18</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B19">
                    <span class="custom-control-description">B19</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B20">
                    <span class="custom-control-description">B20</span>
                
            </label>
              </div>
                <span class="help-block errortext"></span>
              </div> 



                <div class="form-group">
                    <label for="bimage" class="col-sm-2 control-label">Bus Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont onchange="validateImage()"  name="images" id="images"   value="{{old('images')}}"  required="required">
                       <span class="help-block errortext">{{$errors->first('images')}}</span>
                    </div>
                  </div>
               
                <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Bus Type</label>
                    <div class="col-sm-10">
                  <select name="type" id="type" required="required">
                    <option value="a">AC</option>
                    <option value="n">Non AC</option>
                  </select>
                 </div>
                </div>
                <div class="form-group">
                   <label for="shift" class="col-sm-2 control-label">Shift</label>
                    <div class="col-sm-10">
                  <select name="shift" id="type" required="required">
                    <option value="d">Day</option>
                    <option value="n">Night</option>
                    <option value="b">Both</option>
                  </select>
                 </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price" value="{{old('price')}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('price')}}</span>
                  </div>
                </div>
                <div class="form-group">
                    <label for="himage" class="col-sm-2 control-label">Seat Images</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont onchange="validateImage()"rol"  name="simages[]" id="simages"   value="{{old('simages.*')}}" multiple="multiple" required="required">
                       <span class="help-block errortext">{{$errors->first('simages.*')}}</span>
                    </div>
                  </div>
                
               <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Total Seats</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="tseat" id="tseat" placeholder="Enter Total Seats" value="{{old('tseat')}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('tseat')}}</span>
                  </div>
                </div>
               
              <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Bording Points</label>
                  <div class="col-sm-10">
                 <select multiple name="bpoints[]">
                   <option value="biratnagarbuspark">Biratnagar Bus Park</option>
                   <option value="mahendrachowk">Mahendra Chowk</option>
                   <option value="bhrikutichowk">Bhrikuti Chowk</option>
                   <option value="bargachhi">Bargachhi</option>
                   <option value="airport">Airport</option>
                   <option value="kanchanbari">KanchanBari</option>
                   <option value="rajbanshichowk">Rajbanshi Chowk</option>
                   <option value="kharji">Kharji</option>
                   <option value="tankisinwari">TankiSinwari</option>
                   <option value="basbari">Basbari</option>
                   <option value="nimuwa">Nimuwa</option>
                   <option value="duhabi">Duhabi</option>
                   <option value="khanar">Khanar</option>
                   <option value="itahari">Itahari</option>
                   <option value="itaharibuspark">Itahari BusPark</option>
                   <option value="gachhia">Gachhia</option>
                   <option value="dulari">Dulari</option>
                   <option value="biratchowk">Birat Chowk</option>
                   <option value="kanepokhari">KanePokhari</option>
                   <option value="pathari">Pathari</option>
                   <option value="mangalbare">Mangalbare</option>
                   <option value="urlabari">Urlabari</option>
                   <option value="damak">Damak</option>
                   <option value="padajungi">Padajungi</option>
                   <option value="kerkha">Kerkha</option>
                   <option value="dudhe">Dudhe</option>
                   <option value="kankai">Kankai</option>
                   <option value="surunga">Surunaga</option>
                   <option value="durgapur">Durgapur</option>
                   <option value="laxmipur">Laxmipur</option>
                   <option value="charpane">Charpane</option>
                   <option value="birtamod">Birtamod</option>
                   <option value="birtamodbuspark">Birtamod Buspark</option>
                   <option value="charali">Charali</option>
                   <option value="dhulabari">Dhulabari</option>
                   <option value="itabhatta">Itabhatta</option>
                   <option value="kakarvitta">Kakarvitta</option>
                   <option value="armycamp">Army Camp</option>
                   <option value="licenseoffice">License Office</option>
                   <option value="tarhara">Tarahara</option>
                   <option value="dharan">Dharan</option>
                   <option value="vedetar">Vedetar</option>
                   <option value="mulghat">Mulghat</option>
                   <option value="dhankuta">Dhankuta</option>
                   <option value="hile">Hile</option>  
                  </select>
                  </div>
                </div>

                 

 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">From</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="from" id="from" placeholder="From" value="{{old('from')}}" required="required" maxlength="30">
                     <span class="help-block errortext">{{$errors->first('from')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">To</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="to" id="to" placeholder="To" value="{{old('to')}}" required="required" maxlength="30">
                     <span class="help-block errortext">{{$errors->first('to')}}</span>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Arrival Time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="atime" id="atime" placeholder="Arrival Time" value="{{old('atime')}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('atime')}}</span>
                  </div>
                </div> 

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Departure Time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="dtime" id="dtime" placeholder="Departure Time" value="{{old('dtime')}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('dtime')}}</span>
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