<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Akademik <?=profil()->nama_sekolah?> - Maintenance Mode</title>
    <link rel="shortcut icon" href="<?=base_url().'assets/uploads/sekolah/'.profil()->logo_sekolah?>" type="image/x-icon">
    
    <link rel="stylesheet" href="<?=base_url()?>assets/landing/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/landing/dist/css/adminlte.min.css">

    <!-- Google Font API -->
    <link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch:wght@900&family=Permanent+Marker&family=Rowdies:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Caveat:wght@700&family=Do+Hyeon&family=Righteous&display=swap" rel="stylesheet">
    <style>
        body{
            background-color: #ecf0f1;
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%;
        }
        h2{
            color: black;
            font-family: Arial, Helvetica, sans-serif;
        }
        p{
            color: black;
            font-size: 25px;
        }
        table{
            margin: 10px;
            width: 100%;
        }
        span{
            color: black;
        }
        .imlog{
            max-width: 50px;
        }
    </style>
</head>
<body>

    <div class="container text-center ">
        <div class="row mt-5">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 row">
                <div class="col-lg-3">
                    <img src="<?=base_url().'assets/uploads/sekolah/'.profil()->logo_sekolah?>" class="imlog float-right">
                </div>
                <div class="col-lg-9">
                    <h4 class="float-left" style="font-family: 'Rowdies', cursive;">PORTAL AKADEMIK</h4><br>
                    <h6 class="float-left" ><?=strtoupper(profil()->nama_sekolah)?></h6>
                </div>
                <div class="col-lg-12">
                    <hr color="black">
                </div>
            </div>
            <div class="col-lg-12 mt-3">
                <img src="<?=base_url().'assets/landing/dist/img/maintenance.png'?>" style="width: 320px;">
            </div>
            <div class="col-lg-12 pt-3">
                <h1 style="font-family: 'Audiowide', cursive;"><b>OOPS...</b></h1>
                <h3 style="font-family: 'Do Hyeon', sans-serif;">Sedang ada Pemeliharaan sistem nih ... </h3>
                <h5 style="font-family: 'Caveat', cursive;">Silahkan Coba lagi nanti ya .... </h5>
            </div>
            <div class="col-lg-12 pt-3">
                <a href="<?=site_url('auth/logout')?>" class="btn btn-danger btn-lg"> <span style="font-family: 'Righteous', cursive; color:white"> Logout Portal </span></a>
            </div>
        </div>
    </div>
</body>
</html>