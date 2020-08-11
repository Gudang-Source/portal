<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Perbaikan Website</b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>
<?php $this->view('admin/messages'); ?>	
<div class="panel-body row">
    <div class="col-lg-12">
        <div class="alert alert-danger no-border">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="text-semibold ">Peringatan !</span> Mengaktifkan Mode Perbaikan akan Memutus Akses Tenaga Pendidik dan Peserta didik pada akun masing - masing</a>.
        </div>
    </div>
    <div class="col-lg-12 text-center mt-20">
        <form action="<?=site_url('admin/operator/cogs/maintenance_proses')?>" method="POST">
            <div class="col-lg-3"></div>
            <div class="col-lg-4">
                <input type="password" name="pass" class="form-control" placeholder="Masukkan Password Anda disini...." required>
            </div>
            <div class="col-lg-2">
                <button type="submit" name="verif" class="btn <?=sistem()->maintenance_mode == 0 ? 'btn-danger' : 'btn-success'?>"> <?=sistem()->maintenance_mode == 0 ? 'Aktifkan' : 'Non-Aktifkan'?> </button>
            </div> 
        </form>
    </div>
</div>