@extends('layouts.dosen.main')

@section('content')
<div class="main-container">


    <!-- Page header start -->
   
    <!-- Page header end -->


    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    
                {{-- <img src="http://api.bsi.ac.id/v2/index.php/manage/foto-dosen/{{ Auth::user()->username }}"> --}}
                @if (Auth::user()->profile_photo_path!=null)
                <img src="{{ Storage::url('public/'.Auth::user()->profile_photo_path.'') }}" class="circle" alt="{{ Auth::user()->name }}"/>
                {{-- <img src="{{ Storage::url('public/icon/profile.png') }}" class="circle"  alt="4215"/> --}}
                @else
                <img src="{{ Storage::url('public/icon/profile.png') }}" class="circle"  style="width:130px;height:130px;" alt="4215"/>
                @endif
                
                

                
                               
                                </div>
                                <h5 class="user-name"></h5>
                                <h6 class="user-email"></h6>
                                <h6 class="user-email"></h6>
                            </div>
                            <div class="setting-links">
                               
                                {{--  <a href="tasks.html">
                                    <i class="icon-inbox"></i>
                                    Informasi
                                </a>  --}}
                                <a href="{{ Storage::url('public/Panduan MyBest Dosen.pdf') }}" target="_blank">
                                    <i class="icon-file-text"></i>
                                    Panduan Penggunaan 
                                </a>
                                <a href="https://www.youtube.com/watch?v=P7Dz5qzzMBo&feature=youtu.be" target="_blank">
                                    <i class="icon-youtube"></i>
                                    Tutorial Penggunaan 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="nav-tabs-container">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                            <i class="icon-new_releases" > Pengumuman</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <i class="icon-user" > Profile</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                {{-- <i class="icon-activity"> Aktifitas</i></a> --}}
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <p>
                                <div class="table-responsive">
                                    <table id="copy-print-csv" class="table custom-table">
                                      <thead>
                                        <tr>
                                          <th>Judul</th>
                                          
                                        
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                            <td>
                                                <h4> 
                                                </h4>
                                              </td>
                                            
                                          </tr>

                                          
                                          
                                      </tbody>
                                    </table>
                                </div>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <p>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                    <div class="form-group">
                                        <label for="fullName">NIP</label>
                                        <input type="text" class="form-control" id="fullName"
                                         placeholder="{{ Auth::user()->username }}" name="nim"
                                        value="{{ Auth::user()->username }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="eMail">Nama</label>
                                        <input type="email" class="form-control"
                                         id="eMail" placeholder="{{ Auth::user()->name }}" readonly 
                                         name="name" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Email</label>
                                        <input type="text" class="form-control"
                                         id="phone" placeholder="{{ Auth::user()->email }}"readonly 
                                         name="email" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Kode Dosen</label>
                                        <input type="url" class="form-control" 
                                        id="website" placeholder="{{ Auth::user()->kode }}" readonly
                                        name="kd_dosen" value="{{ Auth::user()->kode }}">
                                    </div>
                                </div>
                               
                            </p>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <p>
                               <h5> Aktifitas Hari Ini</h5>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </div>
    <!-- Content wrapper end -->


</div>
@endsection