<div class="panel-heading">
	<h4 class="panel-title"><b> Laman <?=$this->uri->segment(4) == 'insert' ? 'Tambah' : 'Update'?> Tahun Ajaran</b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>	
    <form action="<?=site_url('admin/operator/tahun_ajaran/proses')?>" method="POST">
        <div class="col-lg-12">
            <div class="row form-group mt-10">
                <div class="col-lg-6">
                    <label>Tahun Ajaran *</label>
                    <input type="hidden" name="id" value="<?=@$row->id_ta?>">
                    <input type="text" name="ta_tahun" class="form-control" value="<?=@$row->tahun_ajaran?>" required>
                </div>
                <div class="col-lg-6">
                    <label>Semester *</label>
                    <select name="ta_semester" id="" class="form-control" required>
                        <option value=""> - Pilih - </option>
                        <option value="Genap" <?=@$row->semester_ta == 'Genap' ? 'selected' : 'null'?>>Genap</option>
                        <option value="Ganjil" <?=@$row->semester_ta == 'Ganjil' ? 'selected' : 'null'?>>Ganjil</option>
                    </select>
                </div>
                <div class="col-lg-6" style="margin-top: 10px;">
                    <label>Tanggal Mulai *</label>
                    <input type="date" name="ta_mulai" class="form-control" value="<?=@$row->mulai_ta?>" required>
                </div>
                <div class="col-lg-6" style="margin-top: 10px;">
                    <label>Tanggal Selesai *</label>
                    <input type="date" name="ta_selesai" class="form-control" value="<?=@$row->selesai_ta?>" required>
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