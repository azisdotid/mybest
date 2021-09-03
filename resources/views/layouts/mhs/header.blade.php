<header class="header">
    <div class="toggle-btns">
        <a id="toggle-sidebar" href="#">
            <i class="icon-list"></i>
        </a>
        <a id="pin-sidebar" href="#">
            <i class="icon-list"></i>
        </a>
    </div>
    <div class="header-items">
        <!-- Custom search start -->
        <div class="custom-search">
            <input type="text" class="search-query" placeholder="Search here ...">
            <i class="icon-search1"></i>
        </div>
        <!-- Custom search end -->

        <!-- Header actions start -->
        <ul class="header-actions">
            <li class="dropdown">
                <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                    <i class="icon-box"></i>
                </a>
              
            </li>
            <li class="dropdown">
                <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                    <i class="icon-bell"></i>
                    {{--  <span class="count-label"></span>  --}}
                </a>
             
            </li>
            <li class="dropdown">
                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                    <span class="user-name">{{ Auth::user()->username }}</span>
                    <span class="avatar"><i class="icon-user"></i><span class="status busy"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <div class="header-user-profile">
                         
                        </div>
                        <a href="{{ url('/user/profile') }}"><i class="icon-user1"></i> My Profile</a>

                        <a href="{{ url('logout') }}">
                            <i class="icon-log-out1"></i><span class="menu-text">Logout</span>
                        </a>
                        {{-- <a href="{{route('profile')}}"><i class="icon-settings1"></i> Account Settings</a> --}}
                        {{--  <a href="login.html"><i class="icon-log-out1"></i> Sign Out</a>  --}}
                        {{--  <form method="POST" action="https://elearning.bsi.ac.id/logout
                        ">
                            @csrf
        
                            <x-jet-responsive-nav-link href="https://elearning.bsi.ac.id/logout"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                                        <i class="icon-log-out1"></i> {{ __('Logout') }}
                            </x-jet-responsive-nav-link>
                        </form>  --}}
                    </div>
                </div>
            </li>
        </ul>						
        <!-- Header actions end -->
    </div>
</header>