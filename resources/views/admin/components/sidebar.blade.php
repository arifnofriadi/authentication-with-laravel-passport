<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Back Office</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{asset('style/images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>

            <h2>{{Auth::user()->name}}</h2>

        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a href="{{url('admin')}}"><i class="fa fa-home"></i> Dashboard </a></li>
            <li><a href="{{url('admin/group')}}"><i class="fa fa-clone"></i>Group</a></li>
            <li><a href="{{url('admin/member')}}"><i class="fa fa-edit"></i> Member</a></li>
            <li><a href="{{url('admin/user')}}"><i class="fa fa-user"></i> User</a></li>
            <li><a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </div>

      </div>
      <!-- /sidebar menu -->
    </div>
  </div>
