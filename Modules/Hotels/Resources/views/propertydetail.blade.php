@extends('layouts.backend.main')
@section('content')
@include('layouts.backend.hotel.nav')
@include('layouts.backend.hotel.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
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
           @if($leftrooms>0)
          <div style="color:red">You have left  {{$leftrooms}} No of Rooms.Please Add More Room types.</div>
          @endif
          <br>
      <h1>
       Hotel  Dashboard
      
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
    

    </section>
    <!-- /.content -->
  </div>
 
@stop