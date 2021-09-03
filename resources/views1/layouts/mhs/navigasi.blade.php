<div class="sidebar-content">

    <!-- sidebar menu start -->
    <div class="sidebar-menu">
        <ul>
            <li class="header-menu">Menu</li>
            <li class="sidebar">
                <a href="{{ url('user/dashboard') }}">
                    <i class="icon-devices_other"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
                <a href="{{ url('/user/profile') }}">
                    <i class="icon-account_circle"></i>
                    <span class="menu-text">Profil</span>
                </a>
              
            </li>
         
            <li class="sidebar-dropdown">
                <a href="#">
                    <i class="icon-calendar1"></i>
                    <span class="menu-text">Jadwal </span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                       
                        <li>
                            <a href="{{url('/sch')}}">Jadwal Kuliah</a>
                        </li>
                        <li>
                            <a href="{{url('/kuliah-pengganti')}}">Kuliah Pengganti</a>
                        </li>
                       
                      
                       
                    
                    </ul>
                </div>
            </li>
       
            <li class="sidebar">
                <a href="{{ url('logout') }}">
                    <i class="icon-log-out1"></i><span class="menu-text">Logout</span>
                </a>
            </li>
           
        </ul>
    </div>
    <!-- sidebar menu end -->

</div>