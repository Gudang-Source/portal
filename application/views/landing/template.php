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
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Acme|Bree+Serif|Fredoka+One|Gochi+Hand|Patrick+Hand|Permanent+Marker&display=swap" rel="stylesheet">
        <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
        <link rel="shortcut icon" href="<?=base_url()?>assets/uploads/sekolah/<?=profil()->logo_sekolah?>" type="image/x-icon">
        <style>
            #mybutton {
                position: relative;
                z-index: 1;
                left: 90%;
                top: -30px;
                cursor: pointer;
            }
            .myinput {
                width: 100%;
            }

        </style>
    </head>
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand-md navbar-dark navbar-black">
                <div class="col-lg-9">
                    <a href="#" class="collapse navbar-collapse" id="navbarCollapse">
                    <img src="<?=base_url().'assets/uploads/sekolah/'.profil()->logo_sekolah?>" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: 1.0; width:50px; height: 50px" >
                        <span class="navbar-brand" style="padding-left: 10px; font-size: 30px; font-family: 'Bree Serif', serif; " >
                            <span class="hidden-md hidden-xs"> Portal Akademik</span>  
                        </span>
                    </a>
                    
                    <button class="navbar-toggler order-1 float-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-lg-3">
                    <div class="collapse navbar-collapse order-3" id="navbarCollapse" style="font-size: 16px;">
                        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ">
                            <li class="nav-item">
                                <a href="<?=site_url()?>" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=site_url('Id/faq')?>" class="nav-link pull-right">FAQ</a>
                            </li>
                            <li class="nav-item float-right" style="right: 0;  position: absolute;">
                                <a href="<?=site_url('admin/auth')?>" class="nav-link float-right"  data-toggle="tooltip" data-placement="top" title="Login Pengelola"><i class="fa fa-landmark"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content-wrapper">
                <div class="col-lg-12 card">
                    <span class="p-2 pl-3">
                        <h4>Selamat Datang <small style="font-size: 13px;"> di Portal Akademik <?=profil()->nama_sekolah?> </small></h4>
                    </span>
                </div>
                <div class="content">
                    <?=$contents?>
                </div>
            </div>

            <!-- Main Footer -->
            <footer class="main-footer text-center"  style="background-color: #2d3436; color: #FFFFFF">
                <!-- Default to the left -->
                <strong>Copyright &copy; <?=date('Y')?> <a href="<?=site_url('id/profil')?>" style="color: #FFFFFF;"><?=profil()->nama_sekolah?></a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="<?=base_url()?>assets/landing/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?=base_url()?>assets/landing/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url()?>assets/landing/dist/js/adminlte.min.js"></script>
    </body>
</html>
