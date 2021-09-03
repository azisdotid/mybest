@extends('layouts.mhs.main')

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
                 {{-- <img src="{{ Storage::url('public/'.Auth::user()->profile_photo_path) }}">  --}}
                {{-- <img src="http://api.bsi.ac.id/v2/index.php/mahasiswa/foto/{{ Auth::user()->username }}" --}}
                {{-- <img src="{{ Storage::url('public/foto_mhs/default.png') }}" class="circle" alt="Wafi Admin"/> --}}
                <img src="{{ Storage::url('public/'.Auth::user()->profile_photo_path.'') }}" class="circle" alt="{{ Auth::user()->name }}"/>

                               
                                </div>
                                <h5 class="user-name"></h5>
                                <h6 class="user-email"></h6>
                                <h6 class="user-email"></h6>
                            </div>
                            <div class="setting-links">
                               
                                {{-- <a href="tasks.html">
                                    <i class="icon-inbox"></i>
                                    Informasi
                                </a> --}}
                                <a href="{{ Storage::url('public/Panduan MyBest Mahasiswa.pdf') }}" target="_blank">
                                    <i class="icon-file-text"></i>
                                    Panduan Penggunaan 
                                </a>
                                <a href="https://www.youtube.com/watch?v=BbLEm3TUZnE&t=187s" target="_blank">
                                    <i class="icon-youtube"></i>
                                    Tutorial Penggunaan 
                                </a>
                                {{-- <a href="faq.html">
                                    <i class="icon-info"></i>
                                    FAQ's
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title">Profile Mahasiswa</div>
                    </div>
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                <div class="form-group">
                                    <label for="fullName">NIM</label>
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
                                    <label for="addRess">Kelas</label>
                                    <input type="text" class="form-control" id="addRess" 
                                    placeholder="{{ Auth::user()->kode }}"value="{{ Auth::user()->kode }}"
                                    readonly>
                                </div>
                              
                            </div>
                            {{--  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">  --}}
                               
                                {{--  <div class="form-group">
                                    <label for="ciTy">Jurusan</label>
                                    <input type="name" class="form-control" id="ciTy" placeholder=""readonly>
                                </div>  --}}
                                {{--  <div class="form-group">
                                    <label for="sTate">Kampus</label>
                                    <input type="text" class="form-control" id="sTate" placeholder=""readonly>
                                </div>  --}}
                              
                            {{--  </div>  --}}
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    
                                    {{--  <button type="button" id="submit" name="submit" class="btn btn-dark">Edit</button>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </div>
    <!-- Content wrapper end -->

   
</div>


@endsection