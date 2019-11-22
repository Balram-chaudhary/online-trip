 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="treeview">
          <a href="#">
          <i class="fa fa-home" aria-hidden="true"></i><span>Homestay and Hotel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{route('homestay.create')}}">Homestay And Hotel Create</a></li>
           <li><a href="{{route('homestay.list')}}">Homestay And Hotel List</a></li>
             <li><a href="{{route('roomtype.create')}}">Room type</a></li>
              <li><a href="{{route('price.create')}}">Price</a></li>
 
          </ul>
        </li>
         
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>