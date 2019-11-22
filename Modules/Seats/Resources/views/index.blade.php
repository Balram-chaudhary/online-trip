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
            <form  action="" class="form-horizontal formpadding" method="POST">
             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" >
              <div class="box-body">
                 <div class="form-group">
                   <label for="seats" class="col-sm-2 control-label">Operator Name</label>
                    <div class="col-sm-10">
                  <select name="buses" id="buses" required="required" class="form-control">
                   <option selected="selected" disabled>Select Operator Name</option>
                   @foreach($buses as $key => $bus)
                   <option value="{{$key}}">{{$bus}}</option>
                   @endforeach
                  </select>
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
          $('#buses').select2();
       });
    </script>
    
@stop    
