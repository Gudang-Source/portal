<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Profil Sekolah </b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>

<div class="panel-body">
	<?php $this->view('admin/messages'); ?>		
    <?=form_open_multipart('admin/operator/sekolah/proses')?>
        <div class="form-group">
            <label> Nama Sekolah *</label>
            <input type="hidden" name="id" value="<?=$row->id_sekolah?>">
            <input type="text" name="s_nama" class="form-control" value="<?=$row->nama_sekolah?>" placeholder="ex. Sekolah Menengah Atas 1 Yogyakarta">
        </div>

        <div class="form-group row">
            <div class="col-lg-4">
                <label> Nomor Pokok Sekolah Nasional *</label>
                <input type="number" name="s_npsn" class="form-control" value="<?=$row->npsn_sekolah?>" placeholder="ex. 1070198010222">
            </div>
            <div class="col-lg-4">
                <label> Nomor SK Pendirian *</label>
                <input type="text" name="s_skpen" class="form-control" value="<?=$row->sk_pendirian?>" placeholder="ex. 0330 / 0 / 1983">
            </div>
            <div class="col-lg-4">
                <label> Nomor SK Operasional *</label>
                <input type="text" name="s_skops" class="form-control" value="<?=$row->sk_operasional?>" placeholder="ex. 0330 / 0 / 1983">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-4">
                <label> Bentuk Pendidikan *</label>
                <input type="text" name="s_bentuk" class="form-control" value="<?=$row->bentuk_pendidikan?>" placeholder="ex. 1070198010222">
            </div>
            <div class="col-lg-4">
                <label> Status Sekolah *</label>
                <input type="text" name="s_status" class="form-control" value="<?=$row->status_sekolah?>" placeholder="ex. Muhammadiyah Yogyakarta">
            </div>
            <div class="col-lg-4">
                <label> Status Kepemilikan *</label>
                <input type="text" name="s_milik" class="form-control" value="<?=$row->status_kepemilikan?>" placeholder="ex. 0330 / 0 / 1983">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-3">
                <label> Akreditasi Sekolah *</label>
                <input type="text" name="s_akreditasi" class="form-control" value="<?=$row->akreditasi_sekolah?>" placeholder="ex. 1070198010222">
            </div>
            <div class="col-lg-4">
                <label> Waktu Penyelenggaraan *</label>
                <input type="text" name="s_operasi" class="form-control" value="<?=$row->waktu_penyelenggaraan?>" placeholder="ex. 0330 / 0 / 1983">
            </div>
            <div class="col-lg-5">
                <label> Tahun Ajaran - Semester *</label> <small> (Silahkan Klik Perbaharui jika data tidak berubah) </small>
                <input type="text" name="s_ta" class="form-control" value="<?=ta()->tahun_ajaran.' - '.ta()->semester_ta?>" placeholder="ex. 0330 / 0 / 1983" readonly>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-6">
                <label> Dinas Kepemerintahan *</label>
                <input type="text" name="s_instansi" class="form-control" value="<?=$row->instansi_pemerintah?>" placeholder="ex. 0330 / 0 / 1983">
            </div>
            <div class="col-lg-6">
                <label> Kepala Sekolah *</label>
                <input type="text" name="s_kepsek" class="form-control" value="<?=$row->kepala_sekolah?>" placeholder="ex. 0330 / 0 / 1983">
            </div>
        </div>

        <div class="form-group">
            <label>Alamat Sekolah *</label>
            <textarea name="s_alamat" class="form-control" placeholder="ex. jalan manggis no 2"><?=$row->alamat_sekolah?></textarea>
        </div>

        <div class="col-lg-12">
            <a href="<?=site_url('admin/operator/sekolah/logo')?>" class="btn btn-warning"> Logo Sekolah <i class="icon-image2"></i></a>
            <button type="submit" name="sekolah" class="btn btn-primary pull-right">
                Perbaharui <i class="icon-arrow-right6 "></i>
            </button>
        </div>
    <?php form_close() ?>
    </div>
</div>