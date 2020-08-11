<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Akademik <?=profil()->nama_sekolah?> - Off Mode</title>
    <link rel="shortcut icon" href="<?=base_url().'assets/uploads/sekolah/'.profil()->logo_sekolah?>" type="image/x-icon">
    
    <link rel="stylesheet" href="<?=base_url()?>assets/landing/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/landing/dist/css/adminlte.min.css">
    <style>
        body{
            background-color: #F9B116;
        }
        h2{
            color: black;
            font-family: Arial, Helvetica, sans-serif;
        }
        p{
            color: black;
            font-size: 25px;
        }
        span{
            color: black;
        }
    </style>
</head>
<body>
    <div class="container text-center ">
        <div class="row">
            <div class="col-lg-12" style="padding-top: 50px;">
                <img src="<?=base_url().'assets/landing/dist/img/catsad.png'?>" style="width: 320px;">
            </div>
            <div class="col-lg-12 pt-3">
                <h2><b>OOPS...</b></h2>
                <p>Website Dimatikan untuk beberapa waktu</p>
                <span class="ket">Silahkan hubungi Administrator Sekolah ya ... </span>
            </div>
            <div class="col-lg-12 pt-3">
                <a href="<?=site_url('id')?>" class="btn btn-danger btn-lg"> Refresh Sekarang </a>
            </div>
        </div>
    </div>
</body>
</html>