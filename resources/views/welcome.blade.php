<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.css')}}">
        {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}"> --}}
        <!--========== CSS ==========-->
        
        <link rel="stylesheet" href="{{ asset('assets/assets_dasboard/css/styles.css')}}">
        <link rel="shortcut icon" href="{{ asset('assets/img/icon1.jfif') }}" />
        {{-- <title>My Best | Universitas Bina Sarana Informatika</title> --}}
        <script language='JavaScript'>
            var txt=" My Best | Universitas Bina Sarana Informatika |";
            var speed=300;
            var refresh=null;
            function action() { document.title=txt;
            txt=txt.substring(1,txt.length)+txt.charAt(0);
            refresh=setTimeout("action()",speed);}action();
        </script>
    </head>
    <body>
        <!--========== SCROLL TOP ==========-->
        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-up-arrow-alt scrolltop__icon'></i>
        </a>
        
        <!--========== HEADER ==========-->
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="." class="nav__logo">
                    <img src="{{ Storage::url('public/mybest_3.png') }}
                    " alt="Logo" style="width:170px;height:60px;" >
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                        <li class="nav__item"><a href="#share" class="nav__link">Fitur</a></li>
                        <li class="nav__item"><a href="#decoration" class="nav__link">Kontak kami</a></li>
                        <li><i class='bx bx-toggle-left change-theme' id="theme-button"></i></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--========== HOME ==========-->
            <section class="home" id="home">
                <div class="home__container bd-container bd-grid">
                    <div class="home__img">
                        <img src="{{ asset('assets/assets_dasboard/img/home2.svg')}}" alt="">
                    </div>
                   
                    <div class="home__data">
                        <h1 class="home__title">MyBest</h1>
                        <p class="home__description">Selamat datang dipembelajaran eLearning Mybest Universitas Bina Sarana Informatika</p>
                        <a href="{{url('login')}}" class="button" 
                            data-wow-delay="0.4s" id="downloadBtn">  Masuk <i class="ml-2 fa fa-angle-right"></i>
                        </a>
                    </div>   
                </div>
            </section>

            <!--========== SHARE ==========-->
            <section class="share section bd-container" id="share">
                <div class="share__container bd-grid">
                    <div class="share__data">
                        <div class="col-md-7 col-lg-6 about-col-right wow fadeInUp">
                            <div class="footer__content">
                                <h3 class="footer__title">Fitur Aplikasi MyBest</h3>
                                <p>
                                    Pembelajaran terintegrasi dengan Mobile Apps
                                </p><br>
                                <ul>
                                    <i class="fa fa-check"></i>Presensi & Rekapitulasi Kehadiran</br><p>
                                    <i class="fa fa-check"></i>Materi, Slide, Modul, Silabus, RPS</br><p>
                                    <i class="fa fa-check"></i>Tugas Pertemuan</br><p>
                                    <i class="fa fa-check"></i>Referensi Materi/Video Tambahan</br><p>
                                    <i class="fa fa-check"></i>Rangkuman Materi</br><p>
                                    <i class="fa fa-check"></i>Kuliah Pengganti</br><p>
                                </ul>
                            </div>
                            <br>
                            <a href="{{ route('login') }}" class="button">Masuk
                                <i class="ml-2 fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="share__img">
                        <img src="{{ asset('assets/img/about-img.png')}}" alt="">
                    </div>
                </div>
            </section>

            <!--========== DECORATION ==========-->
            <section class="decoration section bd-container" id="decoration">
                <h2 class="section-title">Anda Memiliki Kendala Teknis <br> Hubungi Kami</h2>
                {{-- <div class="send__container bd-container bd-grid"> --}}
                <div class="send__container bd-container decoration__container bd-grid">
                    <div class="send__content">
                    <form id="contactForm" action="send_mail.php">
                        <div class="contact-alert">
                            <div class="empty-form" style="display: none;"><span>Silakan isi sesuai ketentuan</span></div>
                            <div class="email-invalid" style="display: none;"><span>Email tidak Valid</span></div>
                            <div class="success-form"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-form-group">
                                    <input type="text" class="form-control" name="contact_name" id="contactName" placeholder="*Nama Anda">
                                </div>
                            </div>
                            <!--// .col //-->
                            <div class="col-lg-12">
                                <div class="contact-form-group">
                                    <input type="text" class="form-control" name="contact_email" id="contactEmail" placeholder="*Email Anda">
                                </div>
                            </div>
                            <!--// .col //-->
                            <div class="col-lg-12">
                                <div class="contact-form-group">
                                    <input type="text" class="form-control" name="contact_subject" id="contactSubject" placeholder="*Subject">
                                </div>
                            </div>
                            <!--// .col //-->
                            <div class="col-lg-12">
                                <div class="contact-form-group">
                                    <textarea name="contact_message" id="contactMessage" class="form-control" placeholder="*Pesan Anda " cols="20" rows="10"></textarea>
                                </div>
                            </div>
                            <!--// .col //-->
                            <div class="col-lg-12">
                                <div class="">
                                    <button type="reset" id="contactBtn" class="button">Kirim Pesan (layanan komplain sedang ditutup)</button>
                                </div>
                            </div>
                            <!--// .col //-->
                        </div>
                        <!--// .row //-->
                    </form>
                    </div>
                    <div class="send__img">
                        <img src="{{ asset('assets/assets_dasboard/img/home1.svg')}}" alt="">
                    </div>
                </div>
            </section>
        </main>

        <!--========== FOOTER ==========-->
        <footer class="footer section">
            <div class="footer__container bd-container bd-grid">
                <div class="footer__content">
                    <h3 class="footer__title">
                        <a href="#" class="footer__logo">Tentang Aplikasi</a>
                    </h3>
                    <p class="footer__description">Sistem Informasi Pembelajaran Online<br> Elearning My Best</p>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Link Terkait</h3>
                    <ul>
                        <li><a href="http://www.bsi.ac.id" class="footer__link">bsi.ac.id </a></li>
                        <li><a href="http://pmb.bsi.ac.id" class="footer__link">pmb.bsi.ac.id</a></li>
                        <li><a href="http://ejournal.bsi.ac.id" class="footer__link">ejournal.bsi.ac.id</a></li>
                        <li><a href="http://repository.bsi.ac.id" class="footer__link">repository.bsi.ac.id</a></li>
                        <li><a href="http://news.bsi.ac.id" class="footer__link">news.bsi.ac.id</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Link Terkait</h3>
                    <ul>
                        <li>
                            <a href="https://kemahasiswaan.bsi.ac.id/" class="footer__link">kemahasiswaan.bsi.ac.id</a>
                        </li>
                        <li>
                            <a href="http://lppm.bsi.ac.id" class="footer__link">lppm.bsi.ac.id</a>
                        </li>
                        <li>
                            <a href="http://alumni.bsi.ac.id/" class="footer__link">alumni.bsi.ac.id</a>
                        </li>
                        <li>
                            <a href="http://career.bsi.ac.id/" class="footer__link">career.bsi.ac.id</a>
                        </li>
                        <li>
                            <a href="http://bec.bsi.ac.id/" class="footer__link">bec.bsi.ac.id</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Kontak Kami</h3>
                    <p>Jl. Kramat Raya No.98, RT.2/RW.9, Kwitang, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10450</p>
                <ul>
                    <li> (021) 21231170</li>
                    <li> info@bsi.ac.id</li>
                    <li> Hotline 1 My Best. 081381507561</li>
                    <li>Hotline 2 My Best. 081381507125</li>
                        
                </ul>
                </div>
            </div>

            <p class="footer__copy">&#169; 2021 Biro Teknologi Informasi. Universitas Bina Sarana Informatika</p>
        </footer>

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        
        <script src="{{ asset('assets/assets_dasboard/js/main.js')}}"></script>

        <script src="{{ asset('assets/js1/jquery.js')}}"></script>
        <!--// Plugins Js //-->
        <script src="{{ asset('assets/js1/plugins.js')}}"></script>
        <!--// Main Js //-->
        <script src="{{ asset('assets/js1/main.js')}}"></script>
    </body>
</html>