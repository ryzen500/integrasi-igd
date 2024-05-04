
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Helpdesk Rumah Sakit William Booth Surabaya</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url()?>assets/landing/images/logo.png">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?= base_url()?>assets/landing/css/bootstrap.min.css" type="text/css">

        <!--Material Icon -->
        <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/landing/css/materialdesignicons.min.css" />
    
        <!--pe-7 Icon -->
        <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/landing/css/pe-icon-7-stroke.css" />

        <!-- Custom  sCss -->
        <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/landing/css/style.css" />

    </head>

    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="58" class="scrollspy-example">

        <!--Navbar Start-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark" id="nav-sticky">
            <div class="container-fluid">
                <!-- LOGO -->
                <a class="logo text-uppercase" href="index.html">
                    <img src="<?= base_url()?>assets/landing/images/logo-rswb-surabaya.jpg" alt="" class="logo-light" height="54" />
                    <img src="<?= base_url()?>assets/landing/images/logo.png" alt="" class="logo-dark" height="54" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto" id="mySidenav">
                        <li class="nav-item">
                            <a href="#home" class="nav-link active">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="#features" class="nav-link">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a href="#services" class="nav-link">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a href="#clients" class="nav-link">Penilaian</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('login') ?>" class="nav-link">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- home start -->
        <section class="bg-home bg-gradient" id="home">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6">
                                <div class="home-title">
                                    <h5 class="mb-3 text-white-50">SELAMAT DATANG DI Rumah Sakit William Booth  SURABAYA</h5>
                                    <h2 class="mb-4 text-white">Rumah Sakit William Booth  <?php echo strtolower("SURABAYA") ?></h2>
                                    <p class="text-white-50 home-desc font-16 mb-5"> - </p>
                                    <div class="watch-video mt-5">
                                        <a href="<?= site_url('login') ?>" class="btn btn-custom me-4">Get Started <i class="mdi mdi-chevron-right ms-1"></i></a>
                                        <a href="https://www.youtube.com/watch?v=rngWGebpA58" class="video-play-icon text-white"><i class="mdi mdi-play play-icon-circle me-2"></i> <span>Watch The Video</span></a>
                                    </div>
    
                                </div>
                            </div>
                            <div class="col-lg-5 offset-lg-1 col-sm-6">
                                <div class="home-img mo-mt-20">
                                    <img src="<?= base_url()?>assets/landing/images/rsud_jombang.jpg" alt="" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div>
                    <!-- end container-fluid -->
                </div>
            </div>
        </section>
        <!-- home end -->

        <!-- features start -->
        <section class="features" id="features">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified features-tab mb-5" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="pills-code-tab" data-bs-toggle="pill" href="#pills-code" role="tab" aria-controls="pills-code" aria-selected="true">
                                    <div class="clearfix">
                                        <div class="features-icon float-end">
                                           <h1><i class="pe-7s-notebook tab-icon"></i></h1>
                                        </div>
                                        <div class="d-none d-lg-block me-4">
                                            <h5 class="tab-title">Profil Kami</h5>
                                            <p>Profil Rumah Sakit William Booth Surabaya</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-customize-tab" data-bs-toggle="pill" href="#pills-customize" role="tab" aria-controls="pills-customize" aria-selected="false">
                                    <div class="clearfix">
                                        <div class="features-icon float-end">
                                            <h1><i class="pe-7s-edit tab-icon"></i></h1>
                                        </div>
                                        <div class="d-none d-lg-block me-4">
                                            <h5 class="tab-title">EMERGENCY CALL <?php echo ""; ?></h5>
                                            <p>Tim Emergency  <?php echo ""; ?> Rumah Sakit William Booth Surabaya</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-support-tab" data-bs-toggle="pill" href="#pills-support" role="tab" aria-controls="pills-support" aria-selected="false">
                                    <div class="features-icon float-end">
                                       <h1><i class="pe-7s-headphones tab-icon"></i></h1>
                                    </div>
                                    <div class="d-none d-lg-block me-4">
                                        <h6 class="tab-title">LAYANAN KONSULTASI</h6>
                                        <p>Konsultasikan Secara Online</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-code" role="tabpanel" aria-labelledby="pills-code-tab">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-4 col-sm-6">
                                        <div>
                                            <img src="<?= base_url()?>assets/landing/images/dokter.png" alt="" class="img-fluid mx-auto d-block">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 offset-lg-1">
                                        <div>
                                            <div class="feature-icon mb-4">
                                                <h1><i class="pe-7s-notebook text-primary"></i><h1>
                                            </div>
                                            <h5 class="mb-3">Profil Kami</h5>
                                            <p class="text-muted">Rumah Sakit Umum Daerah Kabupaten Jombang adalah Rumah Sakit Milik Pemerintah Daerah Kabupaten Jombang, dan merupakan Rumah Sakit type B Pendidikan </p>
                                            <p class="text-muted">Motto Kami ialah Kepuasan Pasien Kebahagiaan Kami </p>
                                            <div class="row pt-4">
                                                <div class="col-lg-6">
                                                    <div class="text-muted">
                                                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Meningkatkan Mutu Pelayanan</p>
                                                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Meningkatkan Sarana Prasarana </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="text-muted">
                                                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Menyelenggarakan Tata Kelola </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-custom">Learn More <i class="mdi mdi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <!-- end row -->
                            </div>
                            <div class="tab-pane fades how active" id="pills-customize" role="tabpanel" aria-labelledby="pills-customize-tab">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-4 col-sm-6">
                                        <div>
                                            <img src="<?= base_url()?>assets/landing/images/emergency_call.png" alt="" class="img-fluid mx-auto d-block">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 offset-lg-1">
                                        <div>
                                            <div class="feature-icon mb-4">
                                                <h1><i class="pe-7s-edit text-primary"></i></h1>
                                            </div>
                                            <h5 class="mb-3">Layanan Pra Hospital</h5>
                                            <p class="text-muted">Ruang lingkup Pelayanan Pra dan Inter Hospital adalah penanganan kegawatdaruratan sebelum penanganan lebih lanjut di Rumah Sakit serta transportasi/evakuasi medik ke fasilitas kesehatan yang dibutuhkan</p>
                                            <p class="text-muted">Sarana komunikasi pelayanan pra dan inter hospital meliputi :</p>
                                            <div class="row pt-4">
                                                <div class="col-lg-7">
                                                    <div class="text-muted">
                                                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Akses telepon : 0321-8491119</p>
                                                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Akses telepon fasilitas kesehatan</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="text-muted">
                                                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Radio medik sebagai sarana komunikasi antar petugas </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-custom">Learn More <i class="mdi mdi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <div class="tab-pane fade" id="pills-support" role="tabpanel" aria-labelledby="pills-support-tab">
                                
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-4 col-sm-6">
                                        <div>
                                            <img src="<?= base_url()?>assets/landing/images/konsultasi_online.png" alt="" class="img-fluid mx-auto d-block">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 offset-lg-1">
                                        <div>
                                            <div class="feature-icon mb-4">
                                                <i class="pe-7s-headphones h1 text-primary"></i>
                                            </div>
                                            <h5 class="mb-3">Konsultasikan Pengaduan Anda Secara Online</h5>
                                            <p class="text-muted">Pengaduan pelanggan merupakan keluhan atas ketidakpuasan yang diterima oleh pelanggan atas pelayanan yang diterima. Sarana Pengaduan Pelanggan Pengaduan langsung dilakukan dengan cara pelanggan mengisi formulir pengaduan langsung yang tersedia di humas RSUD Kabupaten Jombang </p>
                                            <p class="text-muted">Pengaduan tidak langsung melalui: </p>
                                            <div class="row pt-4">
                                                <div class="col-lg-7">
                                                    <div class="text-muted">
                                                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Website RSUD Kabupaten Jombang</p>
                                                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> WA 081216039777</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="text-muted">
                                                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> humasrsudjbg@gmail.com </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-custom">Learn More <i class="mdi mdi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                        <!-- end tab-content -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </section>
        <!-- features end -->

        <!-- services start -->
        <section class="section bg-light" id="services">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="title text-center">
                            <h6 class="text-primary small-title">Layanan</h6>
                            <h4>Kami menangani berbagai macam layanan medis</h4>
                            <p class="text-muted">seperti dibawah ini</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-sm-6">
                        <div class="services-box p-4 bg-white mt-4">
                            <div class="services-img float-start me-4">
                                <img src="<?= base_url()?>assets/landing/images/icons/layers.png" alt="">
                            </div>
                            <h5>Instalasi Rawat Jalan</h5>
                            <div class="overflow-hidden">
                                <p class="text-muted">Instalasi Rawat Jalan merupakan salah satu instalasi di rumah sakit yang memberikan pelayanan rawat jalan kepada pasien, sesuai dengan spesialisasi yang dibutuhkannya</p>
                                <a href="#" class="text-custom">Read more...</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="services-box p-4 bg-white mt-4">
                            <div class="services-img float-start me-4">
                                <img src="<?= base_url()?>assets/landing/images/icons/core.png" alt="">
                            </div>
                            <h5>Instalasi Rawat Inap</h5>
                            <div class="overflow-hidden">
                                <p class="text-muted">Instalasi Rawat Inap adalah salah satu bentuk proses pengobatan atau rehabilitasi oleh tenaga pelayanan kesehatan profesional pada pasien yang sakit, dengan cara di inapkan di ruangan yang disesuaikan dengan jenis penyakit yang dialami</p>
                                <a href="#" class="text-custom">Read more...</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="services-box p-4 bg-white mt-4">
                            <div class="services-img float-start me-4">
                                <img src="<?= base_url()?>assets/landing/images/icons/paperdesk.png" alt="">
                            </div>
                            <h5>Instalasi Gawat Darurat</h5>
                            <div class="overflow-hidden">
                                <p class="text-muted">Instalasi Gawat Darurat adalah layanan yang disediakan untuk kebutuhan pasien yang dalam kondisi gawat darurat dan harus segera dibawa ke rumah sakit untuk mendapatkan penanganan darurat yang cepat.</p>
                                <a href="#" class="text-custom">Read more...</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="services-box p-4 bg-white mt-4">
                            <div class="services-img float-start me-4">
                                <img src="<?= base_url()?>assets/landing/images/icons/solarsystem.png" alt="">
                            </div>
                            <h5>Instalasi Laboratorium Klinik</h5>
                            <div class="overflow-hidden">
                                <p class="text-muted">Instalasi laboratorium Klinik adalah salah satu instalasi di rumah sakit yang merupakan pelayanan penunjang yang bertujuan Menentukan resiko terhadap suatu penyakit dengan harapan suatu penyakit dapat terdeteksi secara dini</p>
                                <a href="#" class="text-custom">Read more...</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="services-box p-4 bg-white mt-4">
                            <div class="services-img float-start me-4">
                                <img src="<?= base_url()?>assets/landing/images/icons/datatext.png" alt="">
                            </div>
                            <h5>Instalasi Laboratorium Patologi Anatomi</h5>
                            <div class="overflow-hidden">
                                <p class="text-muted">Patologi Anatomi merupakan laboratorium khusus untuk mendiagnosis penyakit melalui materi biologi yang berasal dari organ jaringan, sel, atau cairan melalui proses sistematik tertentu.</p>
                                <a href="#" class="text-custom">Read more...</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="services-box p-4 bg-white mt-4">
                            <div class="services-img float-start me-4">
                                <img src="<?= base_url()?>assets/landing/images/icons/browserscript.png" alt="">
                            </div>
                            <h5>Instalasi ICU Sentral</h5>
                            <div class="overflow-hidden">
                                <p class="text-muted">Intensive Care Unit ( ICU ) adalah Layanan Rumah sakit yang dilengkapi dengan staf dan peralatan khusus untuk menangani pasien kritis yang memerlukan terapi dan perawatan secara intensif dengan monitoring ketat. </p>
                                <a href="#" class="text-custom">Read more...</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </section>
        <!-- services end -->
        
        <!-- clients start -->
        <section class="section bg-light" id="clients">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="title text-center mb-4">
                            <h6 class="text-primary small-title">Penilaian</h6>
                            <h4>Apa Kata Mereka</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="testi-box p-4 bg-white mt-4 text-center">
                            <p class="text-muted mb-4">" RSUD Jombang membantu masyarakat menciptakan kesehatan yang prima. Sehingga masyarakat Jombang semakin sehat dan siap untuk lebih produktif lagi"</p>
                            <div class="testi-img mb-4">
                                <img src="assets/landing/images/testi/img-1.png" alt="" class="rounded-circle img-thumbnail">
                            </div>
                            <p class="text-muted mb-1"> - Warga Jombang</p>
                            <h5 class="font-18">Agus Budisono</h5>
                            
                            <div class="testi-icon">
                                <i class="mdi mdi-format-quote-open display-2"></i>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testi-box p-4 bg-white mt-4 text-center">
                            <p class="text-muted mb-4">"  Layanan RSUD di Jombang ini semakin baik. Juga didukung oleh peralatan medis terbaru dan canggih sehingga pasien menjadi lebih tenang ketika dirawat di sini "</p>
                            <div class="testi-img mb-4">
                                <img src="<?= base_url()?>assets/landing/images/testi/img-2.png" alt="" class="rounded-circle img-thumbnail">
                            </div>
                            <p class="text-muted mb-1"> - Warga Jombang</p>
                            <h5 class="font-18">Muhammad Arifin</h5>
                            
                            <div class="testi-icon">
                                <i class="mdi mdi-format-quote-open display-2"></i>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testi-box p-4 bg-white mt-4 text-center">
                            <p class="text-muted mb-4">"  Cara pengurusan untuk memesan layanan dan administrasi yang semakin mudah. Masyarakat semakin bangga mempunyai RSUD Jombang  "</p>
                            <div class="testi-img mb-4">
                                <img src="<?= base_url()?>assets/landing/images/testi/img-3.png" alt="" class="rounded-circle img-thumbnail">
                            </div>
                            <p class="text-muted mb-1"> - Warga Jombang</p>
                            <h5 class="font-18">Fauzi Rahmad</h5>
                            
                            <div class="testi-icon">
                                <i class="mdi mdi-format-quote-open display-2"></i>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </section>
        <!-- clients end -->

        <!-- counter start -->
        <section class="section bg-gradient">
            <div class="container-fluid">
                <div class="row" id="counter">
                    <div class="col-lg-3 col-sm-6">
                        <div class="text-center p-3">
                            <div class="counter-icon text-white-50 mb-4">
                                <i class="pe-7s-add-user display-4"></i>
                            </div>
                            <div class="counter-content">
                                <h2 class="counter_value mb-3 text-white" data-target="1200">0</h2>
                                <h5 class="counter-name text-white">Perawat</h5>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-lg-3 col-sm-6">
                        <div class="text-center p-3">
                            <div class="counter-icon text-white-50 mb-4">
                                <i class="pe-7s-cart display-4"></i>
                            </div>
                            <div class="counter-content">
                                <h2 class="mb-3 text-white"><span class="counter_value" data-target="1500">10</span> +</h2>
                                <h5 class="counter-name text-white">Obat</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="text-center p-3">
                            <div class="counter-icon text-white-50 mb-4">
                                <i class="pe-7s-smile display-4"></i>
                            </div>
                            <div class="counter-content">
                                <h2 class="counter_value mb-3 text-white" data-target="6931">608</h2>
                                <h5 class="counter-name text-white">Pasien Sembuh</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="text-center p-3">
                            <div class="counter-icon text-white-50 mb-4">
                                <i class="pe-7s-medal display-4"></i>
                            </div>
                            <div class="counter-content">                       
                                <h2 class="counter_value mb-3 text-white" data-target="800">2</h2>
                                <h5 class="counter-name text-white">Karyawan</h5>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </section>
        <!-- counter end -->

        <!-- contact start -->
        <section class="section" id="contact">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="title text-center mb-5">
                            <h6 class="text-primary small-title">Kontak</h6>
                            <h4>Ada Pertanyaan ?</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="get-in-touch">
                            <h5>RSUD Jombang</h5>
                            <p class="text-muted mb-5">Selamat datang di RSUD Jombang</p>

                            <div class="mb-3">
                                <div class="get-touch-icon float-start me-3">
                                   <h2><i class="pe-7s-mail text-primary"></i></h2>
                                </div>
                                <div class="overflow-hidden">
                                    <h5 class="font-16 mb-0">E-mail</h5>
                                    <p class="text-muted">humasrsudjbg@gmail.com</p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="get-touch-icon float-start me-3">
                                    <h2><i class="pe-7s-phone text-primary"></i></h2>
                                </div>
                                <div class="overflow-hidden">
                                    <h5 class="font-16 mb-0">Phone</h5>
                                    <p class="text-muted">081216039777</p>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="get-touch-icon float-start me-3">
                                   <h2> <i class="pe-7s-map-marker text-primary"></i></h2>
                                </div>
                                <div class="overflow-hidden">
                                    <h5 class="font-16 mb-0">Address</h5>
                                    <p class="text-muted">Jl. KH. Wahid Hasyim No.52, Jombang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="custom-form bg-white">
                            <span id="error-msg"></span>
                                <form method="post" name="myForm" onsubmit="return validateForm()">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Enter your name...">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Enter your email...">
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input name="subject" id="subject" type="text" class="form-control" placeholder="Enter Subject...">
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="comments" class="form-label">Message</label>
                                            <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Enter your message..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-12 text-end">
                                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-custom" value="Send Message" />
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>
                        </div>
                        <!-- end custom-form -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </section>
        <!-- contact end -->

        <!-- footer start -->
        <footer class="footer bg-dark">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="text-center">
                            <ul class="list-inline footer-list text-center mt-5">
                                <li class="list-inline-item"><a href="#">Beranda</a></li>
                                <li class="list-inline-item"><a href="#">Profil</a></li>
                                <li class="list-inline-item"><a href="#">Layanan</a></li>
                                <li class="list-inline-item"><a href="#">Penilaian</a></li>
                                <li class="list-inline-item"><a href="#">Kontak</a></li>
                                <li class="list-inline-item"><a href="<?= site_url('login') ?>">Login</a></li>
                            </ul>
                            <ul class="list-inline social-links mb-4 mt-5">
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="mdi mdi-google-plus"></i></a></li>
                            </ul>
                            <p class="text-white-50 mb-4"><?php echo date("Y"); ?> © RSUD Jombang. Design by <a href="#" target="_blank" class="text-white-50">Gede Ardi Pratama</a> </p>
                            
                        </div>
                    </div>
                
                </div>

            </div>
        </footer>
        <!-- footer end -->

        <!-- Back to top -->    
        <a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up"> </i> </a>
        
        <!-- javascript -->
        <script src="<?= base_url()?>assets/landing/js/bootstrap.bundle.min.js"></script>
        <!-- counter js -->
        <script src="<?= base_url()?>assets/landing/js/counter.int.js"></script>
        <!-- custom js -->
        <script src="<?= base_url()?>assets/landing/js/app.js"></script>
    </body>

</html>