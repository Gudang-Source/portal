<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title> Selamat Datang di Portal Akademik - Login Admin  </title> 
        <link rel="shortcut icon" href="<?=base_url().'assets/uploads/sekolah/'.profil()->logo_sekolah?>" type="image/x-icon">
 

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>assets/admin/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>assets/admin/assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>assets/admin/assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>assets/admin/assets/css/colors.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?=base_url()?>assets/admin/assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>assets/admin/assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>assets/admin/assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>assets/admin/assets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?=base_url()?>assets/admin/assets/js/core/app.js"></script>
        <!-- /theme JS files -->
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
    <body class="login-container">
        <div class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?=site_url()?>" style="padding-left: 20px;">
                    <span> PORTAL AKADEMIK <?=strtoupper(profil()->nama_sekolah)?></span>
                </a>
                <ul class="nav navbar-nav pull-right visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                </ul>
            </div>

            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li>
                        <a href="#">
                            <i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-cog3"></i>
                            <span class="visible-xs-inline-block position-right"> Options</span>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
        <!-- Page container -->
	    <div class="page-container">
            <!-- Page content -->
            <div class="page-content">
                <!-- Main content -->
                <div class="content-wrapper">
                    <!-- Content area -->
                    <div class="content">
                        <!-- Simple login form -->
                        <form action="<?=site_url('admin/auth/authentication')?>" method="POST">
                            <div class="panel panel-body login-form">
                                <div class="text-center">
                                    <div class="icon-object border-slate-300 text-slate-300">
                                        <img src="<?=base_url().'assets/uploads/sekolah/'.profil()->logo_sekolah?>" style="width: 100px;">
                                    </div>
                                    <h5 class="content-group">Login to your Admin Account <small class="display-block">Enter your credentials below</small></h5>
                                    <span style="color:red; font-size: 12px"><i><?=$this->session->flashdata('aktivasi');?></i></span>
                                </div>

                                <span style="color:red; font-size: 12px"><i><?=$this->session->flashdata('username');?></i></span>
                                <div class="form-group has-<?=$this->session->flashdata('username') != null ? 'error' : 'success'?> has-feedback-left">
                                    <input type="text" name="username" value="<?=$this->session->flashdata('u-ser');?>" class="form-control" placeholder="Username" required autofocus>
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <span style="color:red; font-size: 12px"><i><?=$this->session->flashdata('password');?></i></span>
                                <div class="form-group has-<?=$this->session->flashdata('password') != null ? 'error' : 'success'?> has-feedback-left">
                                    <input type="password" name="password" value="<?=$this->session->flashdata('u-pas');?>" class="form-control" placeholder="Password" id="pass" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                    <span id="mybutton" onclick="change()"><i class="fa fa-eye-slash"></i>
                                </div>

                                <div class="form-group">
                                    <button type="submit"  name="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
                                </div>

                                <div class="text-center">
                                    <a href="<?=site_url('admin/auth/forgot_email')?>">Forgot password?</a>
                                </div>
                            </div>
                        </form>
                        <!-- /simple login form -->


                        <!-- Footer -->
                        <div class="footer text-muted text-center">
                            <strong>Copyright &copy; <?=date('Y')?> <a href="<?=site_url('id/profil')?>" style="color: black;"><?=profil()->nama_sekolah?></a>.</strong> All rights reserved.
                        </div>
                        <!-- /footer -->

                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->
        </div>
        <!-- /page container -->
    </body>
</html>

<script type="text/javascript">
            function change(){
                var x = document.getElementById('pass').type;

                if (x == 'password'){
                    document.getElementById('pass').type = 'text';
                    document.getElementById('mybutton').innerHTML = '<i class="fa fa-eye"></i>';
                }else{
                    document.getElementById('pass').type = 'password';
                    document.getElementById('mybutton').innerHTML = '<i class="fa fa-eye-slash"></i>';
                }
            }
        </script>
