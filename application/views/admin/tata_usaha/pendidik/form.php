<div class="panel-heading">
	<h4 class="panel-title"><b> Laman <?=$this->uri->segment(4) == 'insert' ? 'Tambah' : 'Update'?> Tenaga Pendidik</b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>	
    <form action="<?=site_url('admin/tata_usaha/pendidik/proses')?>" method="POST">
        <div class="col-lg-12">
                <div class="row form-group mt-10">
                    <div class="col-lg-6">
                        <label>NIP Tenaga Pendidik *</label>
                        <input type="hidden" name="id" value="<?=@$row->id_pendidik?>">
                        <input type="number" name="g_nip" class="form-control" value="<?=@$row->nip_pendidik?>" required>
                    </div>
                    <div class="col-lg-6">
                        <label>Nama Tenaga Pendidik *</label>
                        <input type="text" name="g_nama" class="form-control" value="<?=@$row->nama_pendidik?>" required>
                    </div>
                    <div class="col-lg-6" style="margin-top: 10px;">
                        <label>Tempat Lahir Pendidik *</label>
                        <input type="text" name="g_tempat" class="form-control" value="<?=@$row->tempat_lahir_pendidik?>" required>
                    </div>
                    <div class="col-lg-6" style="margin-top: 10px;">
                        <label>Tanggal Lahir Pendidik *</label>
                        <input type="date" name="g_tgl" class="form-control" value="<?=@$row->tanggal_lahir_pendidik?>" required>
                    </div>
                    <div class="col-lg-6" style="margin-top: 10px;">
                        <label>Jenis Kelamin Pendidik *</label>
                        <select name="g_gender" id="" class="form-control" required>
                            <option value=""> - Pilih - </option>
                            <option value="L" <?=@$row->gender_pendidik == 'L' ? 'selected' : 'null'?>>Laki - Laki</option>
                            <option value="P" <?=@$row->gender_pendidik == 'P' ? 'selected' : 'null'?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-lg-6" style="margin-top: 10px;">
                        <label>Status Pendidik *</label>
                        <select name="g_status" id="" class="form-control" required>
                            <option value=""> - Pilih - </option>
                            <option value="1" <?=@$row->status_pendidik == 1 ? 'selected' : 'null'?>>Pegawai Tetap</option>
                            <option value="2" <?=@$row->status_pendidik == 2 ? 'selected' : 'null'?>>Pegawai Honorer</option>
                        </select>
                    </div>
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <label>Riwayat Pendidikan Pendidik *</label>
                        <textarea name="g_riwayat" id="" class="form-control"><?=@$row->pendidikan_terakhir?></textarea>
                    </div>
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <label>Alamat Peserta Didik *</label>
                        <textarea name="g_alamat" id="" class="form-control"><?=@$row->alamat_pendidik?></textarea>
                    </div>
                </div>
        </div>
        <div class="col-lg-12">
            <div class="text-right">
                <button type="submit" name="<?=$this->uri->segment(4)?>" class="btn btn-primary"> <?=$this->uri->segment(4) == 'insert' ? 'Tambahkan' : 'Perbaharui'?> <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </form>
</div>