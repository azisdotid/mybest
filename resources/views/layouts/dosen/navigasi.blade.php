<div class="sidebar-content">

    <!-- sidebar menu start -->
    <div class="sidebar-menu">
        <ul>
            <li class="header-menu">Menu</li>
            <li class="sidebar">
                <a href="{{ url('/dashboard') }}">
                    <i class="icon-devices_other"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
                <a href="{{ url('/profil') }}">
                    <i class="icon-account_circle"></i>
                    <span class="menu-text">Profil</span>
                </a>
              
            </li>
            
         
            <li class="sidebar-dropdown">
                <a href="#">
                    <i class="icon-calendar1"></i>
                    <span class="menu-text">Mengajar</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                       
                        <li>
                            <a href="{{url('/jadwal')}}">Jadwal Mengajar</a>
                        </li>
                        <li>
                            <a href="{{url('/rekap-absen')}}">Rekap Absen</a>
                        </li>
                        <li>
                            <a href="{{ url('/jadwal-pengganti') }}">Perkuliahan Pengganti</a>
                        </li>
                        <li>
                            <a href="{{ url('/lecturer/rekap') }}">Rekap Pengajaran </a>
                        </li>


                        
                      
                    
                    </ul>
                </div>
            </li>
          
            <li class="sidebar-dropdown">
                @can('users.index') 
                <a href="#">
                    <i class="icon-settings1"></i>
                    <span class="menu-text">User Management</span>
                </a>
               
                <div class="sidebar-submenu">
                    <ul>
                        @can('users.index') 
                        <li>
                            <a href="{{ url('/user') }}"> Akun Staff</a>
                        </li>
                       
                        @endcan 
                         @can('permissions.index') 
                        <li>
                            <a href="{{ url('/permission') }}">Permission</a>
                        </li>
                         @endcan 
                         @can('roles.index') 
                        <li>
                            <a href="{{ url('/role') }}">Account Setting</a>
                        </li>
                        @endcan 
                    </ul>
                </div>
                @endcan 
            </li>

            <li class="sidebar-dropdown">
                @can('baak.index')  
                <a href="#">
                    <i class="icon-folder_open"></i>
                    <span class="menu-text">BAAK Management</span>
                </a>
             
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="{{ url('/cek-kuliah-pengganti-baak') }}">Cek Kuliah Pengganti</a>
                        </li>
                        <li>
                            <a href="{{ url('/std/users/baak') }}">Data Mahasiswa</a>
                        </li>
                        @can('temu_baak.index')  
                        <li>
                            <a href="{{ url('/pertemuan') }}">Upload Pertemuan</a>
                        </li>
                        @endcan 
                        @can('agamak_baak.index') 
                        <li>
                            <a href="{{ url('/agamakristen') }}">Upload Pertemuan Agama</a>
                        </li>
                        @endcan 

                        @can('krsagamak_baak.index') 
                        <li>
                            <a href="{{ url('/krs/agama-kristen') }}">Mhs Agama Kristen </a>
                        </li>
                        @endcan 

                        @can('krsmhs_baak.index') 
                        <li>
                            <a href="{{ url('/krs/mhs') }}">KRS Mahasiswa </a>
                        </li>
                        @endcan 

                    
                    </ul>
                </div>
                @endcan 
            </li>

            <li class="sidebar-dropdown">
                @can('administrasi.index') 
                <a href="#">
                    <i class="icon-check-circle"></i>
                    <span class="menu-text">Administrasi</span>
                </a>
              
                <div class="sidebar-submenu">
                    <ul>
                        @can('inputmanual_adm.index') 
                        
                        <li>
                            <a href="{{ url('/input-manual') }}">Input Manual Mengajar</a>
                        </li>

                        <li>
                            <a href="{{ url('/rekap/day') }}">Rekap Ajar Dosen</a>
                        </li>
                       
                        @endcan
                        @can('kuliahganti_adm.index') 
                        <li>
                            <a href="{{ url('/cek-kuliah-pengganti') }}">Cek Kuliah Pengganti</a>
                        </li>
                        @endcan
                        @can('userdosen_adm.index') 
                        <li>
                            <a href="{{ url('/std/users') }}">Data Mahasiswa</a>
                        </li>
                        @endcan

                        @can('userdosen_adm.index') 
                        <li>
                            <a href="{{ url('/lecturer/users') }}">Data Dosen</a>
                        </li>
                        @endcan
                        @can('jadwaldosen_adm.index') 
                        <li>
                            <a href="{{ url('lecturer/schedule') }}">Jadwal Dosen</a>
                        </li>
                        @endcan
                    </ul>
                </div>
                @endcan 
            </li>

            <li class="sidebar-dropdown">
                @can('btiadmin.index') 
                <a href="#">
                    <i class="icon-devices_other"></i>
                    <span class="menu-text">Admin BTI</span>
                </a>
              
                <div class="sidebar-submenu">
                    <ul>
                       
                        <li>
                            <a href="">Upload Pengumuman</a>
                        </li>
                        <li>
                            <a href="">Input FiQ</a>
                        </li>
                       
                    
                    </ul>
                </div>
                @endcan 
            </li>



            <li class="sidebar">
                <a href="{{url('logout') }}">
                    <i class="icon-log-out1"></i>
                    <span class="menu-text">Logout</span>
                </a>
              
            </li> 
                       
                     
           
        </ul>
        {{-- <li class="sidebar">
            <a href="{{url('logout') }}">
                <i class="icon-log-out1"></i><span class="menu-text">Logout</span>
            </a>
            {{-- <form method="POST" action="{{url('logout') }}">
                @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            this.closest('form').submit();">
                <i class="icon-log-out1"></i><span class="menu-text">Logout</span>
            </a>
        </form> 
        </li>--}}
           
    </div>
    <!-- sidebar menu end -->

</div>