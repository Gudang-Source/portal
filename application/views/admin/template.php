<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Selamat Datang di Portal Akademik Sekolah <?=profil()->nama_sekolah?></title>
        <link rel="shortcut icon" href="<?=base_url().'assets/uploads/sekolah/'.profil()->logo_sekolah?>" type="image/x-icon">

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
        <link href="<?=base_url('assets/admin')?>/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url('assets/admin')?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url('assets/admin')?>/assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url('assets/admin')?>/assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url('assets/admin')?>/assets/css/colors.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?=base_url('assets/admin')?>/assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?=base_url('assets/admin')?>/assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?=base_url('assets/admin')?>/assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?=base_url('assets/admin')?>/assets/js/plugins/loaders/blockui.min.js"></script>
        <script type="text/javascript" src="<?=base_url('assets/admin')?>/assets/js/plugins/tables/datatables/datatables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?=base_url('assets/admin')?>/assets/js/plugins/uploaders/plupload/plupload.full.min.js"></script>
	    <script type="text/javascript" src="<?=base_url('assets/admin')?>/assets/js/plugins/uploaders/plupload/plupload.queue.min.js"></script>
        <script type="text/javascript" src="<?=base_url('assets/admin')?>/assets/js/core/app.js"></script>
        <script type="text/javascript" src="<?=base_url('assets/admin')?>/assets/js/plugins/forms/selects/select2.min.js"></script>
        <script type="text/javascript" src="<?=base_url('assets/admin')?>/assets/js/pages/uploader_plupload.js"></script>
        
        <!-- /theme JS files -->
        
        <!-- Sweetalert 2 Popup Modals and Notification -->
        <script src="<?=base_url()?>assets/landing/plugins/sweetalert2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="<?=base_url()?>assets/landing/plugins/sweetalert2/dist/sweetalert2.min.css">
        <!-- End Sweetalert2 -->

        <!-- CK Editor -->
        <script src="<?=base_url()?>assets/admin/ckeditor/ckeditor.js"></script>

        <script>
            function uploadFile() {
                // membaca data file yg akan diupload, dari komponen 'fileku'
                var file = document.getElementById("fileku").files[0];
                var formdata = new FormData();
                formdata.append("datafile", file);
                
                // proses upload via AJAX disubmit ke 'upload.php'
                // selama proses upload, akan menjalankan progressHandler()
                var ajax = new XMLHttpRequest();
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.open("POST", "upload.php", true);
                ajax.send(formdata);
            }
                
            function progressHandler(event){
                // hitung prosentase
                var percent = (event.loaded / event.total) * 100;
                // menampilkan prosentase ke komponen id 'progressBar'
                document.getElementById("progressBar").value = Math.round(percent);
                // menampilkan prosentase ke komponen id 'status'
                document.getElementById("status").innerHTML = Math.round(percent)+"% telah terupload";
                // menampilkan file size yg tlh terupload dan totalnya ke komponen id 'total'
                document.getElementById("total").innerHTML = "Telah terupload "+event.loaded+" bytes dari "+event.total;
            }
        </script>

    </head>

    <body>
        <!-- Main navbar -->
        <div class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?=site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/dashboard')?>">
                    <span style="font-size: 18px; font-family:audiowide,serif">
                        <img src="<?=base_url().'/assets/uploads/sekolah/'.profil()->logo_sekolah?>" class="img-circle" style="width: 25px; height: 25px">
                        PORTAL AKADEMIK
                    </span>
                </a>

                <ul class="nav navbar-nav visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
            </div>

            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-bubbles4"></i>
                            <span class="visible-xs-inline-block position-right">Messages</span>
                            <!-- <span class="badge bg-warning-400">2</span> -->
                        </a>
                        
                        <div class="dropdown-menu dropdown-content width-350">
                            <div class="dropdown-content-heading">
                                Messages
                                <ul class="icons-list">
                                    <li><a href="#"><i class="icon-compose"></i></a></li>
                                </ul>
                            </div>

                            <ul class="media-list dropdown-content-body">
                                <li class="media">
                                    <div class="media-left">
                                        <img src="<?=base_url()?>assets/admin/assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                        <span class="badge bg-danger-400 media-badge">5</span>
                                    </div>

                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">James Alexander</span>
                                            <span class="media-annotation pull-right">04:58</span>
                                        </a>

                                        <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left">
                                        <img src="<?=base_url()?>assets/admin/assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                        <span class="badge bg-danger-400 media-badge">4</span>
                                    </div>

                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Margo Baker</span>
                                            <span class="media-annotation pull-right">12:16</span>
                                        </a>

                                        <span class="text-muted">That was something he was unable to do because...</span>
                                    </div>
                                </li>

                               
                            </ul>

                            <div class="dropdown-content-footer">
                                <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <img src="assets/images/placeholder.jpg" alt="">
                            <span><?=user_profil($this->session->userdata('userid'))->nama_depan_user_admin?></span>
                            <i class="caret"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="<?=site_url('admin/user/profil')?>"><i class="icon-user-plus"></i> My profile</a></li>
                            <li><a href="<?=site_url('admin/user/log_user/'.$this->session->userdata('userid'))?>"><i class="icon-history"></i> Log Activity</a></li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?=site_url('admin/auth/logout')?>">
                                    <i class="icon-switch2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navbar -->

        <!-- Page container -->
        <div class="page-container">
            <!-- Page content -->
            <div class="page-content">
                <!-- Main sidebar -->
                <div class="sidebar sidebar-main">
                    <div class="sidebar-content">
                        <!-- User menu -->
                        <div class="sidebar-user">
                            <div class="category-content">
                                <div class="media">
                                    <a href="#" class="media-left"><img src="<?=base_url('assets/uploads/admin/'.user_profil($this->session->userdata('userid'))->image_user_admin )?>" class="img-circle img-sm" alt=""></a>
                                    <div class="media-body">
                                        <span class="media-heading text-semibold"><?=user_profil($this->session->userdata('userid'))->nama_depan_user_admin.' '.user_profil($this->session->userdata('userid'))->nama_belakang_user_admin?></span>
                                        <div class="text-size-mini text-muted">
                                            <i class="icon-pin text-size-small" style="color: green"></i> 
                                            &nbsp;Bidang <?=admin_role($this->session->userdata('level'))?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- /user menu -->


                        <!-- Main navigation -->
                        <div class="sidebar-category sidebar-category-visible">
                            <div class="category-content no-padding">
                                <ul class="navigation navigation-main navigation-accordion">
                                    <!-- Main -->
                                    <li class="navigation-header"><span> <?=strtoupper($this->uri->segment(2))?></span> <i class="icon-menu" title="Main pages"></i></li>
                                    
                                    <?php $this->load->view('admin/menus_admin'); ?>
                                    <!-- /main -->
                                </ul>
                            </div>
                        </div>
                        <!-- /main navigation -->

                    </div>
                </div>
                <!-- /main sidebar -->

                <!-- Main content -->
                <div class="content-wrapper">
                    <!-- Page header -->
                    <div class="page-header page-header-default">
                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="#"><i class="icon-home2 position-left"></i>
                                    <?=ucfirst($this->uri->segment(3)).''.ucfirst($this->uri->segment(4) == null ? '' : ' / '.$this->uri->segment(4)).''.ucfirst($this->uri->segment(5) == null ? '' : ' / '.$this->uri->segment(5))?>
                                </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /page header -->

                    <!-- Content area -->
                    <div class="content">
                        <!-- Dashboard content -->
                            <!-- Latest posts -->
                            <div class="panel panel-flat">
                                   
                                <?=@$contents?>
                               
                            </div>
                            <!-- /latest posts -->
                            <script>
                                $(document).ready( function () {
                                    $('#example').DataTable({
                                        searchPanes:{
                                            hideCount: true,
                                        },
                                        dom: 'Pfrtip'
                                        
                                    });
                                } );
                            </script>

                        <!-- Footer -->
                            <div class="footer" style="padding-left: 10px; position:absolute;">
                                &copy; <?=date("Y")?>. <a href="#">PORTAL AKADEMIK </a><a href="#"><?=profil()->nama_sekolah?></a>
                            </div>
                        <!-- /footer -->
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->

    </body>
</html>
