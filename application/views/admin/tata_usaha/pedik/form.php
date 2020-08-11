<div class="panel-heading">
	<h4 class="panel-title"><b> Laman <?=$this->uri->segment(4) == 'insert' ? 'Tambah' : 'Update'?> Peserta Didik</b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>	
    <form action="<?=site_url('admin/tata_usaha/pedik/proses')?>" method="POST">
        <div class="col-lg-12">
            <?php for ($i=1; $i <= $count; $i++) { 
                if($this->uri->segment(4) == 'insert'){ ?>
                    <span style="font-size: 15px;"><b>Data Peserta Didik - <?=$i?></b></span>
                <?php } ?>
                <div class="row form-group mt-10">
                    <div class="col-lg-6">
                        <label>NISN Peserta Didik *</label>
                        <input type="hidden" name="id" value="<?=@$row->id_siswa?>">
                        <input type="number" name="p_nisn[]" class="form-control" value="<?=@$row->nisn_siswa?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label>Nama Peserta Didik *</label>
                        <input type="text" name="p_nama[]" class="form-control" value="<?=@$row->nama_siswa?>" required>
                    </div>
                    <div class="col-lg-6" style="margin-top: 10px;">
                        <label>Tempat Lahir Peserta Didik *</label>
                        <input type="text" name="p_tempat[]" class="form-control" value="<?=@$row->tempat_lahir_siswa?>" required>
                    </div>
                    <div class="col-lg-6" style="margin-top: 10px;">
                        <label>Tanggal Lahir Peserta Didik *</label>
                        <input type="date" name="p_tgl[]" class="form-control" value="<?=@$row->tanggal_lahir_siswa?>" required>
                    </div>
                    <div class="col-lg-3" style="margin-top: 10px;">
                        <label>Jenis Kelamin Peserta Didik *</label>
                        <select name="p_gender[]" id="" class="form-control" required>
                            <option value=""> - Pilih - </option>
                            <option value="L" <?=@$row->gender_siswa == 'L' ? 'selected' : 'null'?>>Laki - Laki</option>
                            <option value="P" <?=@$row->gender_siswa == 'P' ? 'selected' : 'null'?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-lg-3" style="margin-top: 10px;">
                        <label>Status Peserta Didik *</label>
                        <select name="p_status[]" id="" class="form-control" required>
                            <option value=""> - Pilih - </option>
                            <option value="1" <?=@$row->status_siswa == 1 ? 'selected' : 'null'?>>Reguler</option>
                            <option value="2" <?=@$row->status_siswa == 2 ? 'selected' : 'null'?>>Pindah</option>
                            <option value="3" <?=@$row->status_siswa == 3 ? 'selected' : 'null'?>>Berhenti</option>
                        </select>
                    </div>
                    <div class="col-lg-6" style="margin-top: 10px;">
                        <label>NIK Peserta Didik *</label><small> (Lihat pada Kartu Keluarga)</small>
                        <input type="number" name="p_kk[]" class="form-control" value="<?=@$row->nik_siswa?>" required>
                    </div>
                    <div class="col-lg-6" style="margin-top: 10px;">
                        <label>Nama Ayah Peserta Didik *</label><small> (Wajib Nama Lengkap) </small>
                        <input type="text" name="p_ayah[]" class="form-control" value="<?=@$row->nama_ayah?>" required>
                    </div>
                    <div class="col-lg-6" style="margin-top: 10px;">
                        <label>Nama Ibu Peserta Didik *</label><small> (Wajib Nama Lengkap) </small>
                        <input type="text" name="p_ibu[]" class="form-control" value="<?=@$row->nama_ibu?>" required>
                    </div>
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <label>Alamat Peserta Didik *</label>
                        <textarea name="p_alamat[]" id="" class="form-control"><?=@$row->alamat_siswa?></textarea>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-lg-12">
            <div class="text-right">
                <button type="submit" name="<?=$this->uri->segment(4)?>" class="btn btn-primary"> <?=$this->uri->segment(4) == 'insert' ? 'Tambahkan' : 'Perbaharui'?> <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </form>
</div>