 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <ul class="sidebar-menu" data-widget="tree">
        @if(Auth::guard('admin'))
        <li class="treeview @if($menu_active=='homestay'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-home" aria-hidden="true"></i><span>Homestay and Hotel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="@if($submenu_active=='homestayadd'){{'active'}}@endif"><a href="{{route('homestay.create')}}">Homestay And Hotel Create</a></li>
           <li class="@if($submenu_active=='homestaylist'){{'active'}}@endif"><a href="{{route('homestay.list')}}">Homestay And Hotel List</a></li>
             <li class="@if($submenu_active=='roomtypeadd'){{'active'}}@endif"><a href="{{route('roomtype.create')}}">Room type</a></li>
              <li class="@if($submenu_active=='priceadd'){{'active'}}@endif"><a href="{{route('price.create')}}">Price</a></li>
   
          </ul>
        </li>
         <li class="treeview @if($menu_active=='buses'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
           <i class="fa fa-bus" aria-hidden="true"></i><span>Buses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if($submenu_active=='busesadd'){{'active'}}@endif"><a href="{{route('buses.create')}}">Buses Create</a></li>
            <li class="@if($submenu_active=='buseslist'){{'active'}}@endif"><a href="{{route('buses.list')}}">Buses Views</a></li>
            <li class="@if($submenu_active=='seatsadd'){{'active'}}@endif"><a href="{{route('seats.create')}}">Seats</a></li>
          </ul>
        </li>

         <li class="treeview">
          <a href="javascript:void(0)">
           <i class="fa fa-plane" aria-hidden="true"></i><span>Flights</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="">Flights Create</a></li>
            <li><a href="">Flights Views</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
           <i class="fa fa-train" aria-hidden="true"></i><span>Trains</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="">Trains Create</a></li>
            <li><a href="">Trains Views</a></li>
            
          </ul>
        </li>
         <li class="treeview @if($menu_active=='activities'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
           <i class="fa fa-tripadvisor" aria-hidden="true"></i><span>Activities</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if($submenu_active=='activitiesadd'){{'active'}}@endif"><a href="{{route('activities.create')}}">Activities Create</a></li>
            <li class="@if($submenu_active=='activitieslist'){{'active'}}@endif"><a href="{{route('activities.list')}}">Activities Views</a></li>
            
          </ul>
        </li>
         @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>