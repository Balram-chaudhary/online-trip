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
             <input type="hidden" name="buses_id" value="{{$buses->id}}">
             <input type="hidden" name="old_buses_image" value="{{$buses->image}}">
             <input type="hidden" name="old_buses_simage" value="{{$buses->simages}}">
              
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Operator Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="oname" id="oname" placeholder="Operator Name" value="{{$buses->oname}}" required="required" maxlength="30">
                      <span class="help-block errortext">{{$errors->first('oname')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Bus Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="bnumber" id="bnumber" placeholder="Bus Number" value="{{$buses->bnumber}}" required="required" maxlength="30">
                      <span class="help-block errortext">{{$errors->first('bnumber')}}</span>
                  </div>
                </div>

          <div class="form-group" id="sheets">
             <label for="services" class="col-sm-2 control-label">Sheets</label>
             <div class="col-sm-10">
        
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A1" {{in_array("A1",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A1</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A2" {{in_array("A2",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A2</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A3" {{in_array("A3",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A3</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A4" {{in_array("A4",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A4</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A5" {{in_array("A5",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A5</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A6" {{in_array("A6",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A6</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A7" {{in_array("A7",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A7</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A8" {{in_array("A8",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A8</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A9" {{in_array("A9",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A9</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A10" {{in_array("A10",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A10</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A11" {{in_array("A11",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A11</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A12" {{in_array("A12",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A12</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A13" {{in_array("A13",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A13</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A14" {{in_array("A14",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A14</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A15" {{in_array("A15",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A15</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A16" {{in_array("A16",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A16</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A17" {{in_array("A17",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A17</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A18" {{in_array("A18",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A18</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A19" {{in_array("A19",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A19</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="A20" {{in_array("A20",$sheets)?"checked":""}}>
                    <span class="custom-control-description">A20</span><br>


                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B1" {{in_array("B1",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B1</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B2" {{in_array("B2",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B2</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B3" {{in_array("B3",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B3</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B4" {{in_array("B4",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B4</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B5" {{in_array("B5",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B5</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B6" {{in_array("B6",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B6</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B7" {{in_array("B7",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B7</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B8" {{in_array("B8",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B8</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B9" {{in_array("B9",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B9</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B10" {{in_array("B10",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B10</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B11" {{in_array("B11",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B11</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B12" {{in_array("B12",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B12</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B13" {{in_array("B13",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B13</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B14" {{in_array("B14",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B14</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B15" {{in_array("B15",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B15</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B16" {{in_array("B16",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B16</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B17" {{in_array("B17",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B17</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B18" {{in_array("B18",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B18</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B19" {{in_array("B19",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B19</span>
                    <input type="checkbox" class="checkbox-inline checkbox" name="sheets[]" value="B20" {{in_array("B20",$sheets)?"checked":""}}>
                    <span class="custom-control-description">B20</span>
                
            </label>
              </div>
                <span class="help-block errortext"></span>
              </div> 

                 <div class="form-group">
                <label for="temp_address" class="col-sm-2 control-label"></label>
                 <div class="row">              
               <div class="col-lg-1 col-md-1 col-sm-1">
                 <a href="{{url('triporbitz/public/images/'.$buses->image)}}"class="portfolio-box">
                  <img src="{{url('triporbitz/public/images/'.$buses->image)}}"class="img-responsive" alt="images" width="100px" height="100px">
                  <div class="portfolio-box-caption">
                    <div class="portfolio-box-caption-content">
                    <span class="glyphicon glyphicon-zoom-in" style="font-size: 20px"></span>
                    </div>
                  </div>
                 </a>
               </div>
               </div> 
              </div>
                <div class="form-group">
                    <label for="bimage" class="col-sm-2 control-label">Bus Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-cont onchange="validateImage()"  name="images" id="images"   value="{{old('images')}}">
                       <span class="help-block errortext">{{$errors->first('images')}}</span>
                    </div>
                  </div>
               
                <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Bus Type</label>
                    <div class="col-sm-10">
                  <select name="type" id="type" required="required">
                    <option value="a" @if($buses->type=='a') selected='selected' @endif>AC</option>
                    <option value="n" @if($buses->type=='n') selected='selected' @endif>Non AC</option>
                  </select>
                 </div>
                </div>

                 <div class="form-group">
                   <label for="type" class="col-sm-2 control-label">Shift</label>
                    <div class="col-sm-10">
                  <select name="shift" id="shift" required="required">
                    <option value="d" @if($buses->shift=='d') selected='selected' @endif>Day</option>
                    <option value="n" @if($buses->shift=='n') selected='selected' @endif>Night</option>
                    <option value="b" @if($buses->shift=='b') selected='selected' @endif>Both</option>
                  </select>
                 </div>
                </div>

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price" value="{{$buses->price}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('price')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                <label for="temp_address" class="col-sm-2 control-label"></label>
                 <div class="row">
                 @foreach($simages as $simage)                
               <div class="col-lg-1 col-md-1 col-sm-1">
                 <a href="{{url('triporbitz/public/images/'.$simage)}}"class="portfolio-box">
                  <img src="{{url('triporbitz/public/images/'.$simage)}}"class="img-responsive" alt="images" width="100px" height="100px">
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
                    <label for="himage" class="col-sm-2 control-label">Hotel Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control"  name="simages[]" id="simages"  multiple="multiple">
                       <span class="help-block errortext">{{$errors->first('simages.*')}}</span>
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Total seats</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="tseat" id="tseat" placeholder="Total Seats" value="{{$buses->t_seats}}" required="required" maxlength="30">
                     <span class="help-block errortext">{{$errors->first('tseat')}}</span>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Bording Points</label>
                  <div class="col-sm-10">
                   <select multiple name="bpoints[]">
                   
                   <option value="biratnagarbuspark" {{in_array("biratnagarbuspark",$bpoints)?"selected":""}}>Biratnagar Bus Park</option>
                   <option value="mahendrachowk" {{in_array("mahendrachowk",$bpoints)?"selected":""}}>Mahendra Chowk</option>
                   <option value="bhrikutichowk" {{in_array("bhrikutichowk",$bpoints)?"selected":""}}>Bhrikuti Chowk</option>
                   <option value="bargachhi" {{in_array("bargachhi",$bpoints)?"selected":""}}>Bargachhi</option>
                   <option value="airport" {{in_array("airport",$bpoints)?"selected":""}}>Airport</option>
                   <option value="kanchanbari" {{in_array("kanchanbari",$bpoints)?"selected":""}}>KanchanBari</option>
                   <option value="rajbanshichowk" {{in_array("rajbanshichowk",$bpoints)?"selected":""}}>Rajbanshi Chowk</option>
                   <option value="kharji" {{in_array("kharji",$bpoints)?"selected":""}}>Kharji</option>
                   <option value="tankisinwari" {{in_array("tankisinwari",$bpoints)?"selected":""}}>TankiSinwari</option>
                   <option value="basbari" {{in_array("basbari",$bpoints)?"selected":""}}>Basbari</option>
                   <option value="nimuwa" {{in_array("nimuwa",$bpoints)?"selected":""}}>Nimuwa</option>
                   <option value="duhabi" {{in_array("duhabi",$bpoints)?"selected":""}}>Duhabi</option>
                   <option value="khanar" {{in_array("khanar",$bpoints)?"selected":""}}>Khanar</option>
                   <option value="itahari" {{in_array("itahari",$bpoints)?"selected":""}}>Itahari</option>
                   <option value="itaharibuspark" {{in_array("itaharibuspark",$bpoints)?"selected":""}}>Itahari BusPark</option>
                   <option value="gachhia" {{in_array("gachhia",$bpoints)?"selected":""}}>Gachhia</option>
                   <option value="dulari" {{in_array("dulari",$bpoints)?"selected":""}}>Dulari</option>
                   <option value="biratchowk" {{in_array("biratchowk",$bpoints)?"selected":""}}>Birat Chowk</option>
                   <option value="kanepokhari" {{in_array("kanepokhari",$bpoints)?"selected":""}}>KanePokhari</option>
                   <option value="pathari" {{in_array("pathari",$bpoints)?"selected":""}}>Pathari</option>
                   <option value="mangalbare" {{in_array("mangalbare",$bpoints)?"selected":""}}>Mangalbare</option>
                   <option value="urlabari" {{in_array("urlabari",$bpoints)?"selected":""}}>Urlabari</option>
                   <option value="damak" {{in_array("damak",$bpoints)?"selected":""}}>Damak</option>
                   <option value="padajungi" {{in_array("padajungi",$bpoints)?"selected":""}}>Padajungi</option>
                   <option value="kerkha" {{in_array("kerkha",$bpoints)?"selected":""}}>Kerkha</option>
                   <option value="dudhe" {{in_array("dudhe",$bpoints)?"selected":""}}>Dudhe</option>
                   <option value="kankai" {{in_array("kankai",$bpoints)?"selected":""}}>Kankai</option>
                   <option value="surunga" {{in_array("surunga",$bpoints)?"selected":""}}>Surunaga</option>
                   <option value="durgapur" {{in_array("durgapur",$bpoints)?"selected":""}}>Durgapur</option>
                   <option value="laxmipur" {{in_array("laxmipur",$bpoints)?"selected":""}}>Laxmipur</option>
                   <option value="charpane" {{in_array("charpane",$bpoints)?"selected":""}}>Charpane</option>
                   <option value="birtamod" {{in_array("birtamod",$bpoints)?"selected":""}}>Birtamod</option>
                   <option value="birtamodbuspark" {{in_array("birtamodbuspark",$bpoints)?"selected":""}}>Birtamod Buspark</option>
                   <option value="charali" {{in_array("charali",$bpoints)?"selected":""}}>Charali</option>
                   <option value="dhulabari" {{in_array("dhulabari",$bpoints)?"selected":""}}>Dhulabari</option>
                   <option value="itabhatta" {{in_array("itabhatta",$bpoints)?"selected":""}}>Itabhatta</option>
                   <option value="kakarvitta" {{in_array("kakarvitta",$bpoints)?"selected":""}}>Kakarvitta</option>
                   <option value="armycamp" {{in_array("armycamp",$bpoints)?"selected":""}}>Army Camp</option>
                   <option value="licenseoffice" {{in_array("licenseoffice",$bpoints)?"selected":""}}>License Office</option>
                   <option value="tarhara" {{in_array("tarhara",$bpoints)?"selected":""}}>Tarahara</option>
                   <option value="dharan" {{in_array("dharan",$bpoints)?"selected":""}}>Dharan</option>
                   <option value="vedetar" {{in_array("vedetar",$bpoints)?"selected":""}}>Vedetar</option>
                   <option value="mulghat" {{in_array("mulghat",$bpoints)?"selected":""}}>Mulghat</option>
                   <option value="dhankuta" {{in_array("dhankuta",$bpoints)?"selected":""}}>Dhankuta</option>
                   <option value="hile" {{in_array("hile",$bpoints)?"selected":""}}>Hile</option>
                  </select>
                  </div>
                </div>

    
                 
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">From</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="from" id="from" placeholder="From" value="{{$buses->from_loc}}" required="required" maxlength="30">
                     <span class="help-block errortext">{{$errors->first('from')}}</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">To</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="to" id="to" placeholder="To" value="{{$buses->to_loc}}" required="required" maxlength="30">
                     <span class="help-block errortext">{{$errors->first('to')}}</span>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Arrival Time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="atime" id="atime" placeholder="Arrival Time" value="{{$buses->atime}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('atime')}}</span>
                  </div>
                </div> 

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Departure Time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="dtime" id="dtime" placeholder="Departure Time" value="{{$buses->dtime}}"  required="required">
                      <span class="help-block errortext">{{$errors->first('dtime')}}</span>
                  </div>
                </div> 
               
               
                            
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div>
                      <label>
                        <button type="submit" name="submit&edit" class="btn btn-success" onClick="return validate();" value="submit&edit" id="submit">Submit & Edit</button>
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