<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title> Selamat Datang di Portal Akademik - Forgot Password  </title>  

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?=base_url()?>assets/landing/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?=base_url()?>assets/landing/dist/css/adminlte.min.css">
        <!-- Sweetalert2 style -->
        <link rel="stylesheet" href="<?=base_url()?>assets/landing/plugins/sweetalert2/dist/sweetalert2.min.css">
        <script src="<?=base_url()?>assets/landing/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <!-- Toastr -->
        <link rel="stylesheet" href="<?=base_url()?>assets/landing/plugins/toastr/toastr.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Acme|Bree+Serif|Fredoka+One|Gochi+Hand|Patrick+Hand|Permanent+Marker&display=swap" rel="stylesheet">
        <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
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
            <div class="content-wrapper">
                <div class="content pt-5 row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card" style="margin-top: 10px">
                            <div class="card-body">
                                <h4 ><b> Reset Password User </b></h4>
                                <hr>
                                <div class="card-header p-0 pt-1 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link <?=$this->uri->segment(3) == 'forgot_email' ? 'active' : 'disabled'?>" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-selected="true">E-Mail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?=$this->uri->segment(3) == 'forgot_repass' ? 'active' : 'disabled'?>" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-selected="false">New Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?=$this->uri->segment(3) == 'forgot_success' ? 'active' : 'disabled'?>" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-selected="false">Finish</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content disabled" id="custom-tabs-two-tabContent">
                                        <div class="tab-pane fade <?=$this->uri->segment(3) == 'forgot_email' ? 'show active' : 'disabled'?>" id="custom-tabs-two-home" role="tabpanel">
                                            <form role="form" action="<?=site_url('admin/auth/forgot_email')?>" method="post">
                                                <div class="row">
                                                   <div class="col-sm-12 mt-3">
                                                        <label>E-Mail Untuk Verifikasi *</label>
                                                        <div class="input-group">
                                                            <input type="email" name="u_mail" class="form-control" placeholder="Silahkan masukkan Alamat E-Mail yang terdaftar pada sistem .... " required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                                            </div>
                                                        </div>
                                                        <span style="font-size: 12px; color: red"><i> <?=$this->session->flashdata('email');?> </i></span>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button type="submit" name="f_email" class="btn btn-info float-right mt-5" style="width: 100%"></i> Submit</button>
                                                    </div>
                                                    <div class="col-lg-12 text-center pt-2 pb-0">
                                                        <p><a href="<?=site_url('admin/auth')?>"> Kembali Ke Login Admin ?</a></p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                      
                                        <div class="tab-pane fade <?=$this->uri->segment(3) == 'forgot_repass' ? 'show active' : 'disabled'?>" id="custom-tabs-two-messages" role="tabpanel">
                                            <form role="form" action="<?=site_url('admin/auth/forgot_repass')?>" method="post">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-lg-12 mt-1">
                                                            <label>Masukkan Password Baru *</label>
                                                            <div class="input-group mb-3">
                                                                <input type="hidden" name="id" value="<?=@$id?>">
                                                                <input type="text" name="u_pass" class="form-control" value="<?=set_value('u_pass'); ?>" placeholder="Silahkan masukkan Password Baru  .... " >
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                                                </div>
                                                            </div>
                                                            <label>Ulangi Masukkan Password Baru *</label>
                                                            <div class="input-group">
                                                                <input type="text" name="u_repass" class="form-control" value="<?=set_value('u_repass'); ?>" placeholder="Silahkan masukkan Perulangan Password Baru  .... " >
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button type="submit" name="f_repass" class="btn btn-info float-right mt-5" style="width: 100%"></i> Submit</button>
                                                    </div>
                                                </div>
                                            </form> 
                                        </div>
                                        <div class="tab-pane fade <?=$this->uri->segment(3) == 'forgot_success' ? 'show active' : 'disabled'?> text-center" id="custom-tabs-two-settings" role="tabpanel">
                                            <img src="<?=base_url()?>assets/uploads/sekolah/<?=profil()->logo_sekolah?>" style="width: 100px">
                                            <h5 class="pt-3"><b><?=profil()->nama_sekolah?></b></h5>
                                            <a href="<?=site_url('admin/auth')?>" class="btn btn-success" style="width: 80%;">
                                                Menu Login <i class="fa fa-arrow-circle-right"></i>
                                            </a><br>
                                            <span style="font-size: 12px; color: red"><i> <?=$this->session->flashdata('values');?> </i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="<?=base_url()?>assets/landing/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?=base_url()?>assets/landing/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url()?>assets/landing/dist/js/adminlte.min.js"></script>
       
    </body>
</html>