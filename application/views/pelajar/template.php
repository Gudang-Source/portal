<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title> Selamat Datang di Portal Akademik <?=profil()->nama_sekolah?> </title>  

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?=base_url()?>assets/landing/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?=base_url()?>assets/landing/dist/css/adminlte.min.css">

        <!-- Sweetalert2 style -->
        <link rel="stylesheet" href="<?=base_url()?>assets/landing/plugins/sweetalert2/dist/sweetalert2.min.css">
        <script src="<?=base_url()?>assets/landing/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
        
        <link rel="shortcut icon" href="<?=base_url()?>assets/uploads/sekolah/<?=profil()->logo_sekolah?>" type="image/x-icon">
        <script src="<?=base_url()?>assets/landing/plugins/chart.js/Chart.js"></script>
        <script src="<?=base_url()?>assets/landing/plugins/chart.js/utils.js"></script>
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Acme|Bree+Serif|Fredoka+One|Gochi+Hand|Patrick+Hand|Permanent+Marker&display=swap" rel="stylesheet">
        <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
        <style>
            canvas{
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            }
            .caption{
                color: #00b894;
                text-transform: uppercase;
                font-weight: bold; 
            }
        </style>
    </head>
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand-md navbar-dark navbar-black">
                <div class="col-lg-9">
                    <a href="#" class="collapse navbar-collapse" id="navbarCollapse">
                    <img src="<?=base_url().'assets/uploads/sekolah/'.profil()->logo_sekolah?>" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: 1.0; width:50px; height: 50px" >
                        <span class="navbar-brand" style="padding-left: 10px; font-size: 30px; font-family: 'Bree Serif', serif; " >
                            <span class="hidden-md hidden-xs"> Portal Akademik </span> 
                        </span>
                    </a>
                    
                    <button class="navbar-toggler order-1 float-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-lg-3">
                    <div class="collapse navbar-collapse  pull-right" id="navbarCollapse" style="font-size: 16px" >
                        <ul class="order-1 navbar-nav navbar-no-expand ">
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="fa fa-comments"></i></a>
                            </li>
                            <li class="nav-item dropdown" >
                                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown"  class="nav-link dropdown-toggle" style="padding-top:0">
                                        <img src="<?=base_url().'assets/uploads/pedik/'.(profil_user_student()->image_siswa == null ? 'default.png' : profil_user_student()->image_siswa)?>" class="img-circle" style="width: 40px; height:40px">
                                    <?=substr(strtoupper(profil_user_student()->nama_siswa),0,15)?>
                                </a>
                                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                    <li><a href="<?=site_url('pelajar/user')?>" class="dropdown-item">My Profile </a></li>
                                    <li><a href="#" class="dropdown-item">My Inbox</a></li>
                                    <li><a href="<?=site_url('pelajar/user/log_user')?>" class="dropdown-item">My Log</a></li>

                                    <li class="dropdown-divider"></li>
                                    <li><a href="<?=site_url('auth/logout')?>" class="dropdown-item"><i class="fa fa-sign-out"></i> Log out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-md navbar-light navbar-white">
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="dropdown">
                                <a href="<?=site_url('pelajar/dashboard')?>" class="nav-link">Beranda</a>
                            </li>
                            <div class="dropdown">
                                <a class="dropdown-toggle pt-2" type="button" id="dropdownMenu2" data-toggle="dropdown">
                                    Akademik
                                </a>
                                <div class="dropdown-menu" >
                                    <button class="dropdown-item" type="button">Info SPP</button>
                                    <button class="dropdown-item" type="button">KRS Pelajar</button>
                                    <button class="dropdown-item" type="button">Jadwal Pelajaran</button>
                                    <button class="dropdown-item" type="button">Presensi</button>
                                    <button class="dropdown-item" type="button">Ujian Pelajar</button>
                                    <button class="dropdown-item" type="button">Nilai Semester</button>
                                    <button class="dropdown-item" type="button">Raport</button>
                                </div>
                            </div>
                            <div class="dropdown pl-3">
                                <a class="dropdown-toggle pt-2" type="button" id="dropdownMenu2" data-toggle="dropdown">
                                    Kesiswaan
                                </a>
                                <div class="dropdown-menu" >
                                    <button class="dropdown-item" type="button">Prestasi</button>
                                    <button class="dropdown-item" type="button">Bimbingan Konseling</button>
                                    <button class="dropdown-item" type="button">Agenda</button>
                                    <button class="dropdown-item" type="button">Perpustakaan</button>
                                </div>
                            </div>
                            <div class="dropdown pl-3">
                                <a class="dropdown-toggle pt-2" type="button" id="dropdownMenu2" data-toggle="dropdown">
                                    Ekstrakulikuler
                                </a>
                                <div class="dropdown-menu" >
                                    <button class="dropdown-item" type="button">Pendaftaran</button>
                                    <button class="dropdown-item" type="button">Nilai</button>
                                </div>
                            </div>
                            <li class="nav-item">
                                <a href="#" class="nav-link">WIFI Pelajar</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=site_url('pelajar/dashboard/faq')?>" class="nav-link">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
          
            <div class="content-wrapper">
                <div class="content">
                    <div class="p-3">
                        <?php $this->load->view('admin/messages')?>
                        <?=$contents?>
                    </div>
                </div>
            </div>
            

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right">
                    <i class="fa fa-envelope"></i><strong> Version 1.1 </strong>
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; <?=date('Y')?> <a href="#" >Portal Akademik</a>.</strong> All rights reserved.
            </footer>
        </div>
       
        <!-- jQuery -->
        <script src="<?=base_url()?>assets/landing/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?=base_url()?>assets/landing/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url()?>assets/landing/dist/js/adminlte.min.js"></script>
        
    </body>
</html>
